/*
 * Mega menu: attaches the dropdowns printed by includes/mega-menu.php to the theme header on desktop
 * (1240px and up). Opens on hover or keyboard focus of a top-level item, switches tabs on hover or
 * focus, closes on mouse leave, Escape or a click outside. Below 1240px nothing changes, so the
 * theme's mobile menu keeps working; without this script the theme menu works as before.
 */
(function () {
  'use strict';

  var root = document.getElementById('imm-root');
  var bar = document.getElementById('Top_bar');
  var menu = document.querySelector('#Top_bar #menu > ul');
  if (!root || !bar || !menu) {
    return;
  }

  var DESKTOP = window.matchMedia('(min-width: 1240px)');
  var shell = document.createElement('div');
  shell.className = 'imm-shell';
  var veil = document.createElement('div');
  veil.className = 'imm-veil';
  var panels = {};
  var current = null;
  var openTimer = null;
  var closeTimer = null;
  var ready = false;

  Array.prototype.slice.call(root.querySelectorAll('[data-imm-panel]')).forEach(function (panel) {
    panels[panel.getAttribute('data-imm-panel')] = panel;
  });
  var sprite = root.querySelector('.imm-sprite');
  if (sprite) {
    document.body.appendChild(sprite);
  }

  function topItems() {
    return Array.prototype.slice.call(menu.children).filter(function (li) {
      return /^menu-item-\d+$/.test(li.id || '');
    });
  }

  function panelFor(li) {
    return panels[li.id.replace('menu-item-', '')] || null;
  }

  function open(li) {
    var panel = panelFor(li);
    window.clearTimeout(closeTimer);
    if (current && current.li === li) {
      return;
    }
    close(true);
    if (!panel) {
      return;
    }
    panel.hidden = false;
    li.classList.add('imm-open');
    var link = li.querySelector(':scope > a');
    if (link) {
      link.setAttribute('aria-expanded', 'true');
    }
    document.body.classList.add('imm-active');
    window.requestAnimationFrame(function () { panel.classList.add('is-in'); });
    current = { li: li, panel: panel };
  }

  function close(now) {
    if (!current) {
      return;
    }
    var c = current;
    current = null;
    c.li.classList.remove('imm-open');
    var link = c.li.querySelector(':scope > a');
    if (link) {
      link.setAttribute('aria-expanded', 'false');
    }
    c.panel.classList.remove('is-in');
    document.body.classList.remove('imm-active');
    if (now) {
      c.panel.hidden = true;
    } else {
      window.setTimeout(function () { if (!c.panel.classList.contains('is-in')) { c.panel.hidden = true; } }, 220);
    }
  }

  function scheduleClose() {
    window.clearTimeout(openTimer);
    window.clearTimeout(closeTimer);
    closeTimer = window.setTimeout(function () { close(false); }, 180);
  }

  function setTab(panel, tab) {
    var id = tab.getAttribute('data-imm-tab');
    Array.prototype.slice.call(panel.querySelectorAll('[data-imm-tab]')).forEach(function (t) {
      t.classList.toggle('is-on', t === tab);
      t.setAttribute('aria-selected', t === tab ? 'true' : 'false');
    });
    Array.prototype.slice.call(panel.querySelectorAll('[data-imm-pane]')).forEach(function (p) {
      p.classList.toggle('is-on', p.getAttribute('data-imm-pane') === id);
    });
  }

  function setup() {
    if (ready) {
      return;
    }
    ready = true;
    bar.appendChild(shell);
    document.body.appendChild(veil);
    Object.keys(panels).forEach(function (id) { shell.appendChild(panels[id]); });
    document.body.classList.add('imm-on');

    topItems().forEach(function (li) {
      var panel = panelFor(li);
      var link = li.querySelector(':scope > a');
      if (panel && link) {
        link.setAttribute('aria-haspopup', 'true');
        link.setAttribute('aria-expanded', 'false');
        li.classList.add('imm-has');
      }
      li.addEventListener('mouseenter', function () {
        window.clearTimeout(closeTimer);
        window.clearTimeout(openTimer);
        openTimer = window.setTimeout(function () { open(li); }, current ? 0 : 90);
      });
      li.addEventListener('mouseleave', scheduleClose);
      if (link) {
        link.addEventListener('focus', function () { open(li); });
      }
    });

    Object.keys(panels).forEach(function (id) {
      var panel = panels[id];
      panel.addEventListener('mouseenter', function () { window.clearTimeout(closeTimer); });
      panel.addEventListener('mouseleave', scheduleClose);
      Array.prototype.slice.call(panel.querySelectorAll('[data-imm-tab]')).forEach(function (tab) {
        var t = null;
        tab.setAttribute('role', 'tab');
        tab.addEventListener('mouseenter', function () { t = window.setTimeout(function () { setTab(panel, tab); }, 70); });
        tab.addEventListener('mouseleave', function () { window.clearTimeout(t); });
        tab.addEventListener('focus', function () { setTab(panel, tab); });
      });
      panel.addEventListener('focusout', function (e) {
        if (current && current.panel === panel && !panel.contains(e.relatedTarget) && !current.li.contains(e.relatedTarget)) {
          scheduleClose();
        }
      });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && current) {
        var link = current.li.querySelector(':scope > a');
        close(true);
        if (link) { link.focus(); }
      }
    });
    document.addEventListener('click', function (e) {
      if (current && !current.panel.contains(e.target) && !current.li.contains(e.target)) {
        close(true);
      }
    });
    veil.addEventListener('mouseenter', scheduleClose);
  }

  function teardown() {
    if (!ready) {
      return;
    }
    close(true);
    document.body.classList.remove('imm-on');
  }

  function sync() {
    if (DESKTOP.matches) {
      setup();
      document.body.classList.add('imm-on');
    } else {
      teardown();
    }
  }

  sync();
  if (DESKTOP.addEventListener) {
    DESKTOP.addEventListener('change', sync);
  } else if (DESKTOP.addListener) {
    DESKTOP.addListener(sync);
  }
}());
