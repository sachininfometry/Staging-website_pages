/*
 * INFOFISCUS Conversa ads landing page: team tabs, and the landing URL (with any
 * utm_* / gclid parameters) copied into the demo form so each lead shows where
 * it came from. The hero tour and the demo-button scrolling come from
 * infofiscus-conversa.js.
 */
(function () {
  'use strict';

  var page = document.querySelector('.icl-page');
  if (!page) {
    return;
  }

  Array.prototype.forEach.call(page.querySelectorAll('[data-icl-landing-url]'), function (field) {
    field.value = window.location.href;
  });

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
