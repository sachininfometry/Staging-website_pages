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

  // Hero: a sheet row lights up, flows into the connector and out to the next target; after a full pass the toast confirms the run.
  var live = page.querySelector('[data-igs-live]');
  if (live) {
    var rows = all('[data-igs-row]', live);
    var targets = all('[data-igs-target]', live);
    var sheet = live.querySelector('[data-igs-sheet]');
    var core = live.querySelector('[data-igs-core]');
    var toast = live.querySelector('[data-igs-toast]');
    var wires = live.querySelector('.igs-flow-wires');
    var playButton = live.querySelector('[data-igs-play]');
    var timers = [];
    var tick = 0;
    var running = false;
    var userPaused = false;
    var onScreen = false;
    var active = -1;

    // Dotted wires: sheet bottom into the connector top, connector right edge out to each target.
    var drawWires = function () {
      if (!live.offsetWidth || window.getComputedStyle(wires).display === 'none') {
        return;
      }
      var box = live.getBoundingClientRect();
      var s = sheet.getBoundingClientRect();
      var c = core.getBoundingClientRect();
      var f = function (n) { return n.toFixed(1); };
      var sx = c.left + c.width / 2 - box.left;
      var sy = s.bottom - box.top;
      var cy = c.top - box.top;
      var paths = '<path class="is-in' + (active >= 0 ? ' is-on' : '') + '" d="M' + f(sx) + ',' + f(sy) + ' V' + f(cy) + '"/>';
      var ox = c.right - box.left;
      var oy = c.top + c.height / 2 - box.top;
      targets.forEach(function (target, i) {
        var t = target.getBoundingClientRect();
        var tx = t.left - box.left;
        var ty = t.top + t.height / 2 - box.top;
        var mx = (ox + tx) / 2;
        paths += '<path class="' + (i === active ? 'is-on' : '') + '" d="M' + f(ox) + ',' + f(oy) + ' C' + f(mx) + ',' + f(oy) + ' ' + f(mx) + ',' + f(ty) + ' ' + f(tx) + ',' + f(ty) + '"/>';
      });
      wires.setAttribute('viewBox', '0 0 ' + f(box.width) + ' ' + f(box.height));
      wires.innerHTML = paths;
    };

    var later = function (ms, fn) {
      timers.push(window.setTimeout(fn, ms));
    };

    var step = function () {
      var r = tick % rows.length;
      var row = rows[r];
      var targetIndex = tick % targets.length;
      var target = targets[targetIndex];
      if (r === 0) {
        toast.classList.remove('is-on');
      }
      rows.forEach(function (el) { el.classList.toggle('is-active', el === row); });
      active = -1;
      drawWires();
      later(450, function () {
        core.classList.add('is-busy');
        active = targetIndex;
        drawWires();
      });
      later(1150, function () {
        core.classList.remove('is-busy');
        target.classList.add('is-hit');
      });
      later(1900, function () {
        target.classList.remove('is-hit');
        row.classList.remove('is-active');
        if (r === rows.length - 1) {
          toast.classList.add('is-on');
        }
      });
      later(r === rows.length - 1 ? 4200 : 2100, function () {
        tick += 1;
        step();
      });
    };

    var stop = function () {
      timers.forEach(window.clearTimeout);
      timers = [];
      running = false;
      active = -1;
      all('.is-active, .is-hit, .is-busy', live).forEach(function (el) { el.classList.remove('is-active', 'is-hit', 'is-busy'); });
      toast.classList.add('is-on');
      drawWires();
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

    if (window.ResizeObserver) {
      new window.ResizeObserver(drawWires).observe(live);
    } else {
      window.addEventListener('resize', drawWires);
    }
    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(drawWires);
    }
    drawWires();

    if (reduce) {
      userPaused = true;
      sync();
    } else if (canObserve) {
      live.classList.add('is-anim');
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
