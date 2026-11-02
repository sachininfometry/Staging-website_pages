/*
 * Google Sheets Connector page: the hero sync loop, scroll reveals, the
 * "how it works" progress line and the tutorial video player.
 */
(function () {
  'use strict';

  var page = document.querySelector('.igs-page');
  if (!page) {
    return;
  }

  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var canObserve = 'IntersectionObserver' in window;

  function all(selector, root) {
    return Array.prototype.slice.call((root || page).querySelectorAll(selector));
  }

  // Scroll reveals and the steps line: shown once they come into view.
  if (canObserve && !reduce) {
    document.documentElement.classList.add('igs-js');
    var revealer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-in');
          revealer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    all('[data-igs-reveal], [data-igs-steps]').forEach(function (el, i) {
      if (el.hasAttribute('data-igs-reveal')) {
        el.style.transitionDelay = (i % 4) * 0.08 + 's';
      }
      revealer.observe(el);
    });
  } else {
    all('[data-igs-steps]').forEach(function (el) { el.classList.add('is-in'); });
  }

  // Hero: each sheet row lights up, travels through IDMC and lands in a target, under a cycling operation.
  var live = page.querySelector('[data-igs-live]');
  if (live) {
    var rows = all('[data-igs-row]', live);
    var packets = all('[data-igs-packet]', live);
    var targets = all('[data-igs-target]', live);
    var hub = live.querySelector('.igs-hub');
    var opLabel = live.querySelector('[data-igs-op]');
    var counter = live.querySelector('[data-igs-count]');
    var playButton = live.querySelector('[data-igs-play]');
    var ops = ['Read', 'Write', 'Update', 'Delete', 'Range', 'Search'];
    var count = parseInt(counter.textContent.replace(/\D/g, ''), 10);
    var timers = [];
    var tick = 0;
    var running = false;
    var userPaused = false;
    var onScreen = false;

    var later = function (ms, fn) {
      timers.push(window.setTimeout(fn, ms));
    };

    var fire = function (packet) {
      packet.classList.remove('is-go');
      void packet.offsetWidth;
      packet.classList.add('is-go');
    };

    var step = function () {
      var row = rows[tick % rows.length];
      var target = targets[tick % targets.length];
      if (tick % rows.length === 0) {
        rows.forEach(function (r) { r.classList.remove('is-done'); });
        opLabel.textContent = ops[Math.floor(tick / rows.length) % ops.length];
      }
      rows.forEach(function (r) { r.classList.toggle('is-active', r === row); });
      fire(packets[0]);
      later(650, function () { hub.classList.add('is-busy'); });
      later(900, function () {
        hub.classList.remove('is-busy');
        fire(packets[1]);
      });
      later(1550, function () {
        target.classList.add('is-hit');
        row.classList.remove('is-active');
        row.classList.add('is-done');
        count += 1200 + Math.floor(Math.random() * 3400);
        counter.textContent = count.toLocaleString('en-US');
      });
      later(2000, function () { target.classList.remove('is-hit'); });
      later(2100, function () {
        tick += 1;
        step();
      });
    };

    var stop = function () {
      timers.forEach(window.clearTimeout);
      timers = [];
      running = false;
      all('.is-active, .is-hit, .is-go', live).forEach(function (el) { el.classList.remove('is-active', 'is-hit', 'is-go'); });
      hub.classList.remove('is-busy');
    };

    var sync = function () {
      var go = onScreen && !document.hidden && !userPaused;
      if (go && !running) {
        running = true;
        step();
      } else if (!go && running) {
        stop();
      }
      live.classList.toggle('is-paused', userPaused);
      playButton.setAttribute('aria-label', userPaused ? 'Play the animation' : 'Pause the animation');
    };

    playButton.addEventListener('click', function () {
      userPaused = !userPaused;
      sync();
    });

    if (reduce) {
      userPaused = true;
      sync();
    } else if (canObserve) {
      new IntersectionObserver(function (entries) {
        onScreen = entries.some(function (entry) { return entry.isIntersecting; });
        sync();
      }, { threshold: 0.25 }).observe(live);
      document.addEventListener('visibilitychange', sync);
    } else {
      onScreen = true;
      sync();
    }
  }

  // Tutorials open in a player over the page; without the script the cards link to YouTube.
  var modal = page.querySelector('[data-igs-modal]');
  if (modal) {
    var frame = modal.querySelector('[data-igs-frame]');
    var closeButton = modal.querySelector('[data-igs-close]');
    var opener = null;

    var onKey = function (event) {
      if (event.key === 'Escape') {
        close();
      }
    };

    var close = function () {
      modal.hidden = true;
      frame.innerHTML = '';
      document.removeEventListener('keydown', onKey);
      if (opener) {
        opener.focus();
      }
    };

    all('[data-igs-video]').forEach(function (card) {
      card.addEventListener('click', function (event) {
        event.preventDefault();
        opener = card;
        var iframe = document.createElement('iframe');
        iframe.src = 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(card.getAttribute('data-igs-video')) + '?autoplay=1&rel=0';
        iframe.title = card.textContent.trim();
        iframe.allow = 'autoplay; encrypted-media; picture-in-picture; fullscreen';
        iframe.allowFullscreen = true;
        frame.innerHTML = '';
        frame.appendChild(iframe);
        modal.hidden = false;
        closeButton.focus();
        document.addEventListener('keydown', onKey);
      });
    });

    closeButton.addEventListener('click', close);
    modal.addEventListener('click', function (event) {
      if (event.target === modal) {
        close();
      }
    });
  }
}());
