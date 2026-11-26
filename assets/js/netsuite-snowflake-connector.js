/* NetSuite to Snowflake page: the hero console counts replicated records, works through the objects
   and switches between the API and ODBC connectors on each run. */
(function () {
  'use strict';
  var box = document.querySelector('[data-ns-console]');
  if (!box || (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) {
    return;
  }
  var count = box.querySelector('[data-ns-count]');
  var time = box.querySelector('[data-ns-time]');
  var bar = box.querySelector('[data-ns-bar]');
  var objs = Array.prototype.slice.call(box.querySelectorAll('[data-ns-obj]'));
  var modes = Array.prototype.slice.call(box.querySelectorAll('[data-ns-mode]'));
  var target = 3000000;
  var n = 0;
  var secs = 0;
  var run = 0;
  var timer = null;
  function pad(v) { return (v < 10 ? '0' : '') + v; }
  function paint() {
    count.textContent = n.toLocaleString('en-US');
    time.textContent = '00:' + pad(Math.floor(secs / 60)) + ':' + pad(secs % 60);
    bar.style.width = Math.min(100, (n / target) * 100) + '%';
    var done = Math.floor((n / target) * objs.length);
    objs.forEach(function (o, i) {
      o.classList.toggle('is-done', i < done);
      o.classList.toggle('is-run', i === done && n < target);
    });
  }
  function tick() {
    if (n >= target) {
      run += 1;
      n = 0;
      secs = 0;
      modes.forEach(function (m, i) { m.classList.toggle('is-on', i === run % 2); });
    } else {
      n = Math.min(target, n + 61000 + Math.floor(Math.random() * 9000));
      secs = Math.min(3540, Math.round((n / target) * 3420));
    }
    paint();
  }
  function go(on) {
    if (on && !timer) { timer = window.setInterval(tick, 90); }
    if (!on && timer) { window.clearInterval(timer); timer = null; }
  }
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (e) { go(e[0].isIntersecting && !document.hidden); }, { threshold: 0.2 }).observe(box);
  } else {
    go(true);
  }
}());
