/*
 * Google Sheets page hero: plays the Informatica IDMC mapping workflow from the reference recording.
 * 1 Mapping  — empty Source and Target on the canvas (mapping is Invalid)
 * 2 Source   — click Source → New Connection → search "Google Sheets" → pick it → Continue Setup
 * 3 Target   — click Target → New Connection → pick Snowflake → Continue Setup
 * 4 Run      — mapping turns Valid, Run → rows flow → "Mapping task completed"; then it loops.
 * Without the script (or with reduced motion) the finished mapping is shown.
 */
(function () {
  'use strict';
  var box = document.querySelector('[data-isw]');
  if (!box || (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) {
    return;
  }
  function q(s) { return box.querySelector(s); }
  function qa(s) { return Array.prototype.slice.call(box.querySelectorAll(s)); }

  var cursor = q('[data-isw-cursor]');
  var src = q('[data-isw-node="src"]');
  var tgt = q('[data-isw-node="tgt"]');
  var modal = q('[data-isw-modal]');
  var cards = qa('[data-isw-card]');
  var find = q('[data-isw-find]');
  var cont = q('[data-isw-cont]');
  var newBtn = q('[data-isw-new]');
  var run = q('[data-isw-run]');
  var valid = q('[data-isw-valid]');
  var status = q('[data-isw-status]');
  var conn = q('[data-isw-conn]');
  var connName = q('[data-isw-conn-name]');
  var obj = q('[data-isw-obj]');
  var tabName = q('[data-isw-tabname]');
  var rows = q('[data-isw-rows]');
  var toastRows = q('[data-isw-toast-rows]');
  var steps = qa('[data-isw-step]');
  var connImg = conn.querySelector('img');
  var imgs = {};
  cards.forEach(function (c) { imgs[c.getAttribute('data-isw-card')] = c.querySelector('img').getAttribute('src'); });

  var timers = [];
  var running = false;
  function at(ms, fn) { timers.push(window.setTimeout(fn, ms)); }
  function clearAll() { timers.forEach(window.clearTimeout); timers = []; }

  function moveTo(el, dx, dy) {
    var b = box.getBoundingClientRect();
    var r = el.getBoundingClientRect();
    var x = r.left - b.left + r.width * (dx === undefined ? 0.5 : dx);
    var y = r.top - b.top + r.height * (dy === undefined ? 0.55 : dy);
    cursor.style.transform = 'translate(' + x + 'px,' + y + 'px)';
  }
  function click(el) {
    cursor.classList.remove('is-click');
    void cursor.offsetWidth;
    cursor.classList.add('is-click');
    if (el && el.classList.contains('isw-btn')) {
      el.classList.add('is-press');
      window.setTimeout(function () { el.classList.remove('is-press'); }, 160);
    }
  }
  function step(n) {
    steps.forEach(function (s) {
      var k = +s.getAttribute('data-isw-step');
      s.classList.toggle('is-done', k < n);
      s.classList.toggle('is-on', k === n);
    });
  }
  function setConn(key, label, object) {
    if (!key) {
      conn.classList.add('is-empty');
      connName.textContent = 'Select a connection…';
      obj.textContent = '—';
      return;
    }
    conn.classList.remove('is-empty');
    connImg.setAttribute('src', imgs[key]);
    connName.textContent = label;
    obj.textContent = object;
    conn.classList.add('is-flash');
    window.setTimeout(function () { conn.classList.remove('is-flash'); }, 700);
  }
  function type(text, done) {
    var n = 0;
    find.textContent = '';
    (function next() {
      if (n > text.length) { if (done) { done(); } return; }
      find.textContent = text.slice(0, n);
      n += 1;
      at(70, next);
    }());
  }
  function filter(word) {
    cards.forEach(function (c) {
      var name = c.querySelector('b').textContent.toLowerCase();
      c.classList.toggle('is-dim', !!word && name.indexOf(word.toLowerCase()) === -1);
    });
  }
  function count(to, ms) {
    var t0 = null;
    function f(t) {
      if (!running) { return; }
      if (!t0) { t0 = t; }
      var p = Math.min(1, (t - t0) / ms);
      var v = Math.round(to * p).toLocaleString('en-US');
      rows.textContent = v;
      toastRows.textContent = v;
      if (p < 1) { window.requestAnimationFrame(f); }
    }
    window.requestAnimationFrame(f);
  }

  function reset() {
    box.classList.remove('is-flow', 'is-done', 'is-rest');
    src.classList.remove('is-set', 'is-sel');
    tgt.classList.remove('is-set', 'is-sel');
    modal.classList.remove('is-open');
    cards.forEach(function (c) { c.classList.remove('is-pick', 'is-hover', 'is-dim'); });
    cont.classList.remove('is-ready');
    run.classList.remove('is-ready');
    valid.className = 'isw-valid is-invalid';
    status.textContent = 'Invalid';
    tabName.textContent = 'Properties';
    setConn(null);
    find.textContent = '';
    rows.textContent = '0';
    step(1);
  }

  function pickFlow(t0, node, key, label, object, search, stepNo) {
    at(t0, function () { moveTo(node); });
    at(t0 + 800, function () {
      click();
      src.classList.toggle('is-sel', node === src);
      tgt.classList.toggle('is-sel', node === tgt);
      tabName.textContent = node === src ? 'Source' : 'Target';
      setConn(null);
      step(stepNo);
    });
    at(t0 + 1500, function () { moveTo(newBtn); });
    at(t0 + 2300, function () { click(newBtn); modal.classList.add('is-open'); });
    at(t0 + 2800, function () { moveTo(find.parentNode, 0.6); });
    at(t0 + 3500, function () { click(); type(search, function () { filter(search); }); });
    var card = q('[data-isw-card="' + key + '"]');
    at(t0 + 4700, function () { moveTo(card, 0.5, 0.45); card.classList.add('is-hover'); });
    at(t0 + 5500, function () { click(); card.classList.remove('is-hover'); card.classList.add('is-pick'); cont.classList.add('is-ready'); });
    at(t0 + 6100, function () { moveTo(cont); });
    at(t0 + 6900, function () {
      click(cont);
      modal.classList.remove('is-open');
      node.classList.add('is-set');
      setConn(key, label, object);
      at(400, function () {
        cards.forEach(function (c) { c.classList.remove('is-pick', 'is-dim'); });
        cont.classList.remove('is-ready');
        find.textContent = '';
      });
    });
  }

  function play() {
    reset();
    at(900, function () { box.classList.add('is-anim'); });
    pickFlow(1200, src, 'sheets', 'Google Sheets · Infometry', 'FY27_Sales_Forecast', 'Google Sh', 2);
    pickFlow(9200, tgt, 'snowflake', 'Snowflake · Data Cloud', 'SALES_FORECAST', 'Snow', 3);
    at(17000, function () {
      src.classList.remove('is-sel');
      tgt.classList.remove('is-sel');
      valid.className = 'isw-valid';
      status.textContent = 'Valid';
      run.classList.add('is-ready');
      step(4);
      moveTo(run);
    });
    at(17900, function () {
      click(run);
      run.classList.remove('is-ready');
      valid.className = 'isw-valid is-running';
      status.textContent = 'Running';
      box.classList.add('is-flow');
      count(1284, 2600);
    });
    at(20800, function () {
      box.classList.remove('is-flow');
      box.classList.add('is-done');
      valid.className = 'isw-valid';
      status.textContent = 'Valid';
      box.classList.add('is-rest');
      step(5);
    });
    at(25500, function () { if (running) { play(); } });
  }

  function go(on) {
    if (on && !running) {
      running = true;
      play();
    } else if (!on && running) {
      running = false;
      clearAll();
    }
  }
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (e) { go(e[0].isIntersecting && !document.hidden); }, { threshold: 0.3 }).observe(box);
    document.addEventListener('visibilitychange', function () { if (document.hidden) { go(false); } });
  } else {
    go(true);
  }
  var lastW = window.innerWidth;
  window.addEventListener('resize', function () {
    if (running && Math.abs(window.innerWidth - lastW) > 40) { lastW = window.innerWidth; clearAll(); running = false; go(true); }
  });
}());
