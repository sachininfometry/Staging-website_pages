/*
 * Google Drive Connector page: the hero transfer queue and the file inspector.
 * Scroll reveals and the video player come from google-sheets-connector.js.
 */
(function () {
  'use strict';

  var page = document.querySelector('.gdc-page');
  if (!page) {
    return;
  }

  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var canObserve = 'IntersectionObserver' in window;

  function all(selector, root) {
    return Array.prototype.slice.call((root || page).querySelectorAll(selector));
  }

  // Run fn(on) whenever el enters or leaves the screen (or the tab hides).
  function whileVisible(el, fn) {
    var onScreen = false;
    var sync = function () {
      fn(onScreen && !document.hidden);
    };
    if (!canObserve) {
      onScreen = true;
      sync();
      return;
    }
    new IntersectionObserver(function (entries) {
      onScreen = entries.some(function (entry) { return entry.isIntersecting; });
      sync();
    }, { threshold: 0.25 }).observe(el);
    document.addEventListener('visibilitychange', sync);
  }

  // Hero: each job picks its file in the Drive window, fills its progress bar and ticks off; then the queue restarts.
  var stage = page.querySelector('[data-gdc-stage]');
  if (stage && !reduce) {
    var jobs = all('[data-gdc-job]', stage);
    var files = all('[data-gdc-file]', stage);
    var count = stage.querySelector('[data-gdc-count]');
    var timers = [];
    var running = false;
    var later = function (ms, fn) {
      timers.push(window.setTimeout(fn, ms));
    };
    var setCount = function (n) {
      count.textContent = n + ' of ' + jobs.length + ' done';
    };
    var reset = function () {
      jobs.forEach(function (job) { job.classList.remove('is-run', 'is-done'); });
      files.forEach(function (file) { file.classList.remove('is-pick'); });
      setCount(0);
    };
    var play = function (k) {
      if (k === jobs.length) {
        files.forEach(function (file) { file.classList.remove('is-pick'); });
        later(2600, function () {
          reset();
          later(500, function () { play(0); });
        });
        return;
      }
      var job = jobs[k];
      var file = files[parseInt(job.getAttribute('data-gdc-job'), 10)];
      files.forEach(function (f) { f.classList.toggle('is-pick', f === file); });
      job.classList.add('is-run');
      later(1750, function () {
        job.classList.remove('is-run');
        job.classList.add('is-done');
        setCount(k + 1);
        later(350, function () { play(k + 1); });
      });
    };
    stage.classList.add('is-anim');
    reset();
    whileVisible(stage, function (on) {
      if (on && !running) {
        running = true;
        reset();
        play(0);
      } else if (!on && running) {
        running = false;
        timers.forEach(window.clearTimeout);
        timers = [];
      }
    });
  }

  // File inspector: tabs (click or arrow keys); they rotate on their own until the visitor uses them.
  var inspector = page.querySelector('[data-gdc-inspector]');
  if (inspector) {
    var tabs = all('[data-gdc-tab]', inspector);
    var panes = all('[data-gdc-pane]', inspector);
    var current = 0;
    var timer = null;
    var userTook = false;
    var show = function (n, focus) {
      current = (n + tabs.length) % tabs.length;
      tabs.forEach(function (tab, i) {
        var on = i === current;
        tab.setAttribute('aria-selected', on ? 'true' : 'false');
        tab.tabIndex = on ? 0 : -1;
        if (on && focus) {
          tab.focus();
        }
      });
      panes.forEach(function (pane, i) { pane.hidden = i !== current; });
    };
    var stop = function () {
      window.clearInterval(timer);
      timer = null;
    };
    var take = function () {
      userTook = true;
      stop();
    };
    tabs.forEach(function (tab, i) {
      tab.addEventListener('click', function () {
        take();
        show(i);
      });
      tab.addEventListener('keydown', function (event) {
        var step = { ArrowRight: 1, ArrowDown: 1, ArrowLeft: -1, ArrowUp: -1 }[event.key];
        if (step) {
          event.preventDefault();
          take();
          show(current + step, true);
        }
      });
    });
    inspector.addEventListener('mouseenter', stop);
    inspector.addEventListener('mouseleave', function () {
      if (!userTook && !reduce && !timer) {
        timer = window.setInterval(function () { show(current + 1); }, 3800);
      }
    });
    if (!reduce) {
      inspector.classList.add('is-anim');
      whileVisible(inspector, function (on) {
        if (on && !userTook && !timer) {
          timer = window.setInterval(function () { show(current + 1); }, 3800);
        } else if (!on) {
          stop();
        }
      });
    }
  }
}());
