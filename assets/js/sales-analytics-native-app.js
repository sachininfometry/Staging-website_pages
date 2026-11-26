/* Sales Analytics page: the hero dashboard walks through pipeline stages and updates its readout. */
(function () {
  'use strict';
  var dash = document.querySelector('[data-sa-dash]');
  if (!dash || (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) {
    return;
  }
  var stages = Array.prototype.slice.call(dash.querySelectorAll('[data-sa-stage]'));
  var name = dash.querySelector('[data-sa-name]');
  var amt = dash.querySelector('[data-sa-amt]');
  var deals = dash.querySelector('[data-sa-deals]');
  var k = -1;
  var timer = null;
  function step() {
    k = (k + 1) % stages.length;
    stages.forEach(function (s, i) { s.classList.toggle('is-on', i === k); });
    name.textContent = stages[k].querySelector('span').textContent;
    amt.textContent = stages[k].getAttribute('data-amt');
    deals.textContent = stages[k].getAttribute('data-deals');
  }
  function run(on) {
    if (on && !timer) { step(); timer = window.setInterval(step, 1600); }
    if (!on && timer) { window.clearInterval(timer); timer = null; }
  }
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (e) { run(e[0].isIntersecting && !document.hidden); }, { threshold: 0.25 }).observe(dash);
  } else {
    run(true);
  }
}());
