/* Marketo to Snowflake page: funnel levels sync one by one into landing tables; the wizard steps advance. */
(function () {
  'use strict';
  if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    return;
  }
  function whenVisible(el, fn) {
    var timer = null;
    var run = function (on) {
      if (on && !timer) { timer = window.setInterval(fn, 1300); fn(); }
      if (!on && timer) { window.clearInterval(timer); timer = null; }
    };
    if ('IntersectionObserver' in window) {
      new IntersectionObserver(function (e) { run(e[0].isIntersecting && !document.hidden); }, { threshold: 0.25 }).observe(el);
    } else {
      run(true);
    }
  }
  var funnel = document.querySelector('[data-mk-funnel]');
  if (funnel) {
    var levels = Array.prototype.slice.call(funnel.querySelectorAll('[data-mk-level]'));
    var tables = Array.prototype.slice.call(funnel.querySelectorAll('[data-mk-table]'));
    var k = -1;
    whenVisible(funnel, function () {
      k = (k + 1) % (levels.length + 1);
      levels.forEach(function (l, i) { l.classList.toggle('is-on', i === k); });
      tables.forEach(function (t, i) { t.classList.toggle('is-on', i < k || (i === k)); });
      if (k === levels.length) { tables.forEach(function (t) { t.classList.add('is-on'); }); }
    });
  }
  var wizard = document.querySelector('[data-mk-wizard]');
  if (wizard) {
    var steps = Array.prototype.slice.call(wizard.querySelectorAll('[data-mk-step]'));
    var bar = wizard.querySelector('[data-mk-progress]');
    var s = -1;
    whenVisible(wizard, function () {
      s = (s + 1) % steps.length;
      steps.forEach(function (st, i) {
        st.classList.toggle('is-on', i === s);
        st.classList.toggle('is-done', i < s);
      });
      bar.style.width = (s / (steps.length - 1)) * 100 + '%';
    });
  }
}());
