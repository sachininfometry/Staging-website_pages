/* Google Pub/Sub page: the hero topic counts published messages and each subscription counts its acks. */
(function () {
  'use strict';
  var bus = document.querySelector('[data-ps-bus]');
  if (!bus || (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) {
    return;
  }
  var pub = bus.querySelector('[data-ps-pub]');
  var acks = Array.prototype.slice.call(bus.querySelectorAll('[data-ps-ack]'));
  var total = 12480;
  var timer = null;
  function fmt(n) { return n.toLocaleString('en-US'); }
  function tick() {
    total += 3;
    pub.textContent = fmt(total);
    acks.forEach(function (el) { el.textContent = fmt(Math.floor(total / 3)); });
  }
  function run(on) {
    if (on && !timer) { timer = window.setInterval(tick, 700); }
    if (!on && timer) { window.clearInterval(timer); timer = null; }
  }
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (e) { run(e[0].isIntersecting && !document.hidden); }, { threshold: 0.2 }).observe(bus);
  } else {
    run(true);
  }
}());
