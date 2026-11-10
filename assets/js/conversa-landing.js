/*
 * INFOFISCUS Conversa ads landing page: demo buttons scroll to the form, the
 * lead form submits in place (includes/conversa-landing-form.php), and the team
 * tabs. The hero product tour comes from infofiscus-conversa.js.
 */
(function () {
  'use strict';

  var page = document.querySelector('.icl-page');
  if (!page) {
    return;
  }

  var form = page.querySelector('[data-icl-form]');
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Every "demo" button brings the visitor to the form and puts the cursor in the first field.
  Array.prototype.forEach.call(page.querySelectorAll('[data-icl-demo]'), function (link) {
    link.addEventListener('click', function (event) {
      if (!form) {
        return;
      }
      event.preventDefault();
      form.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'center' });
      var first = form.querySelector('#icl-name');
      if (first) {
        window.setTimeout(function () { first.focus({ preventScroll: true }); }, reduce ? 0 : 450);
      }
    });
  });

  // "Try the interactive demo" scrolls to the product tour section.
  var tourSection = page.querySelector('#icl-tour');
  Array.prototype.forEach.call(page.querySelectorAll('[data-icl-tour]'), function (link) {
    link.addEventListener('click', function (event) {
      if (!tourSection) {
        return;
      }
      event.preventDefault();
      tourSection.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
    });
  });

  if (form) {
    var time = form.querySelector('[data-icl-time]');
    var url = form.querySelector('[data-icl-url]');
    var msg = form.querySelector('[data-icl-msg]');
    var button = form.querySelector('.icl-submit');
    var label = button ? button.innerHTML : '';

    if (time) {
      time.value = String(Math.floor(Date.now() / 1000));
    }
    if (url) {
      url.value = window.location.href; // keeps utm_* and gclid for the lead email
    }

    var say = function (text, state) {
      msg.textContent = text;
      msg.className = 'icl-form-msg' + (state ? ' is-' + state : '');
    };

    var check = function () {
      var bad = null;
      ['icl-name', 'icl-email', 'icl-company'].forEach(function (id) {
        var input = form.querySelector('#' + id);
        var ok = input.value.trim() !== '' && (input.type !== 'email' || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value.trim()));
        input.setAttribute('aria-invalid', ok ? 'false' : 'true');
        if (!ok && !bad) {
          bad = input;
        }
      });
      return bad;
    };

    form.addEventListener('submit', function (event) {
      var bad = check();
      if (bad) {
        event.preventDefault();
        say('Please enter your full name, a valid company email and your company.', 'error');
        bad.focus();
        return;
      }
      if (!window.fetch || !window.FormData) {
        return; // normal post + redirect back
      }
      event.preventDefault();
      var data = new FormData(form);
      data.append('icl_ajax', '1');
      button.disabled = true;
      button.textContent = 'Sending...';
      say('', '');
      // getAttribute: the hidden input named "action" shadows form.action.
      fetch(form.getAttribute('action'), { method: 'POST', body: data, credentials: 'same-origin' })
        .then(function (response) { return response.json(); })
        .then(function (result) {
          if (result && result.ok) {
            form.reset();
            if (time) { time.value = String(Math.floor(Date.now() / 1000)); }
            if (url) { url.value = window.location.href; }
            say(result.message, 'ok');
            if (window.dataLayer) {
              window.dataLayer.push({ event: 'conversa_landing_lead' });
            }
          } else {
            say((result && result.message) || 'Something went wrong. Please try again.', 'error');
          }
        })
        .catch(function () {
          say('Something went wrong. Please try again or email info@infometry.net.', 'error');
        })
        .then(function () {
          button.disabled = false;
          button.innerHTML = label;
        });
    });

    form.addEventListener('input', function (event) {
      if (event.target.getAttribute('aria-invalid') === 'true') {
        event.target.setAttribute('aria-invalid', 'false');
      }
    });
  }

  // Team tabs.
  var tabs = Array.prototype.slice.call(page.querySelectorAll('[data-icl-tab]'));
  var panels = Array.prototype.slice.call(page.querySelectorAll('[data-icl-panel]'));

  function show(index, focus) {
    var current = (index + tabs.length) % tabs.length;
    tabs.forEach(function (tab, i) {
      var on = i === current;
      tab.setAttribute('aria-selected', on ? 'true' : 'false');
      tab.tabIndex = on ? 0 : -1;
      if (on && focus) {
        tab.focus();
      }
    });
    panels.forEach(function (panel, i) {
      panel.hidden = i !== current;
    });
  }

  tabs.forEach(function (tab, i) {
    tab.addEventListener('click', function () {
      show(i);
    });
    tab.addEventListener('keydown', function (event) {
      var step = { ArrowRight: 1, ArrowLeft: -1 }[event.key];
      if (event.key === 'Home') {
        event.preventDefault();
        show(0, true);
      } else if (event.key === 'End') {
        event.preventDefault();
        show(tabs.length - 1, true);
      } else if (step) {
        event.preventDefault();
        show(i + step, true);
      }
    });
  });
}());
