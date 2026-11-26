/* Finance Analytics page: the cockpit's CCC dial moves and the Agentic AI card types its recommendations. */
(function () {
  'use strict';
  var box = document.querySelector('[data-fa-cockpit]');
  if (!box || (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) {
    return;
  }
  var needle = box.querySelector('[data-fa-needle]');
  var ccc = box.querySelector('[data-fa-ccc]');
  var type = box.querySelector('[data-fa-type]');
  var tips = [
    [41, 'Collect 61–90 day receivables from 3 key accounts to cut CCC by 4 days.'],
    [37, 'Shift 2 vendor payments to net-45 to keep cash flow above plan.'],
    [34, 'Opex is 3.1% under budget — reallocate to Q4 CapEx priorities.']
  ];
  var t = 0;
  var typer = null;
  var cycle = null;
  function show(i) {
    var tip = tips[i];
    ccc.textContent = tip[0];
    needle.style.transform = 'rotate(' + (-80 + (60 - tip[0]) * 3.2) + 'deg)';
    var text = tip[1];
    var n = 0;
    window.clearInterval(typer);
    typer = window.setInterval(function () {
      n += 1;
      type.textContent = text.slice(0, n);
      if (n >= text.length) { window.clearInterval(typer); }
    }, 28);
  }
  function run(on) {
    if (on && !cycle) { show(t); cycle = window.setInterval(function () { t = (t + 1) % tips.length; show(t); }, 5200); }
    if (!on && cycle) { window.clearInterval(cycle); window.clearInterval(typer); cycle = null; }
  }
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (e) { run(e[0].isIntersecting && !document.hidden); }, { threshold: 0.25 }).observe(box);
  } else {
    run(true);
  }
}());
