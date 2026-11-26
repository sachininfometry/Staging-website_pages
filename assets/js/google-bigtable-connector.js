/* Google BigTable page: the hero table is scanned row by row in row-key order. */
(function () {
  'use strict';
  var box = document.querySelector('[data-bt-explorer]');
  if (!box || (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) {
    return;
  }
  var rows = Array.prototype.slice.call(box.querySelectorAll('[data-bt-row]'));
  var status = box.querySelector('[data-bt-status]');
  var k = 0;
  var timer = null;
  function step() {
    if (k === rows.length) {
      status.textContent = rows.length + ' rows → IDMC';
      k = -1;
      return;
    }
    if (k < 0) {
      rows.forEach(function (r) { r.classList.remove('is-done', 'is-scan'); });
      k = 0;
      status.textContent = 'reading…';
    }
    rows.forEach(function (r, i) {
      r.classList.toggle('is-scan', i === k);
      if (i < k) { r.classList.add('is-done'); }
    });
    k += 1;
  }
  function run(on) {
    if (on && !timer) { timer = window.setInterval(step, 900); }
    if (!on && timer) { window.clearInterval(timer); timer = null; }
  }
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (e) { run(e[0].isIntersecting && !document.hidden); }, { threshold: 0.2 }).observe(box);
  } else {
    run(true);
  }
}());
