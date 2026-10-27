/*
 * Press release hero: the Conversa answer in the Slack window switches between
 * Chart / Table / SQL views and redraws its chart as bar, line, area or pie.
 * The bar chart is rendered by the template, so the page looks complete before
 * (or without) this script.
 */
(function () {
	'use strict';

	var DATA = [
		{ label: 'Cloud Platform', value: 57.7 },
		{ label: 'Data Products', value: 33.7 },
		{ label: 'Professional Services', value: 30.0 }
	];
	var PIE_COLORS = ['#ff8a26', '#2fb4ff', '#8b5cf6'];
	var W = 460, LEFT = 44, RIGHT = 10, TOP = 16, PLOT = 92, MAX = 60;
	var BASE = TOP + PLOT;
	var BAND = (W - LEFT - RIGHT) / DATA.length;
	var TOTAL = DATA.reduce(function (sum, d) { return sum + d.value; }, 0);

	function y(value) { return TOP + PLOT * (1 - value / MAX); }
	function cx(index) { return LEFT + BAND * index + BAND / 2; }
	function money(value) { return '$' + value.toFixed(1) + 'M'; }
	function esc(text) { return String(text).replace(/&/g, '&amp;').replace(/</g, '&lt;'); }

	function axes() {
		var out = '<defs><linearGradient id="spr-bar-grad" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffb15c"/><stop offset="1" stop-color="#f2600f"/></linearGradient></defs>';
		[0, 20, 40, 60].forEach(function (tick) {
			var ty = y(tick).toFixed(1);
			out += '<line class="spr-grid" x1="' + LEFT + '" x2="' + (W - RIGHT) + '" y1="' + ty + '" y2="' + ty + '"/>' +
				'<text class="spr-tick" x="36" y="' + (y(tick) + 4).toFixed(1) + '">' + (tick ? '$' + tick + 'M' : '0') + '</text>';
		});
		DATA.forEach(function (d, i) {
			out += '<text class="spr-lab" x="' + cx(i).toFixed(1) + '" y="126">' + esc(d.label) + '</text>';
		});
		return out;
	}

	function values() {
		return DATA.map(function (d, i) {
			return '<text class="spr-val" x="' + cx(i).toFixed(1) + '" y="' + (y(d.value) - 8).toFixed(1) + '">' + money(d.value) + '</text>';
		}).join('');
	}

	function points() {
		return DATA.map(function (d, i) { return cx(i).toFixed(1) + ',' + y(d.value).toFixed(1); });
	}

	var DRAW = {
		bar: function () {
			return axes() + DATA.map(function (d, i) {
				var w = BAND * 0.36;
				return '<rect class="spr-bar spr-anim" x="' + (cx(i) - w / 2).toFixed(1) + '" y="' + y(d.value).toFixed(1) + '" width="' + w.toFixed(1) +
					'" height="' + (BASE - y(d.value)).toFixed(1) + '" rx="6"><title>' + esc(d.label) + ': ' + money(d.value) + '</title></rect>';
			}).join('') + values();
		},
		line: function () {
			return axes() + '<polyline class="spr-line spr-fade" points="' + points().join(' ') + '"/>' + dots() + values();
		},
		area: function () {
			var pts = points();
			var area = 'M' + cx(0).toFixed(1) + ',' + BASE + ' L' + pts.join(' L') + ' L' + cx(DATA.length - 1).toFixed(1) + ',' + BASE + ' Z';
			return axes() + '<path class="spr-area spr-fade" d="' + area + '"/><polyline class="spr-line spr-fade" points="' + pts.join(' ') + '"/>' + dots() + values();
		},
		pie: function () {
			var r = 48, ox = 120, oy = 62, angle = -Math.PI / 2, out = '';
			DATA.forEach(function (d, i) {
				var sweep = d.value / TOTAL * Math.PI * 2;
				var x1 = ox + r * Math.cos(angle), y1 = oy + r * Math.sin(angle);
				angle += sweep;
				var x2 = ox + r * Math.cos(angle), y2 = oy + r * Math.sin(angle);
				out += '<path class="spr-slice spr-fade" fill="' + PIE_COLORS[i] + '" d="M' + ox + ',' + oy + ' L' + x1.toFixed(2) + ',' + y1.toFixed(2) +
					' A' + r + ',' + r + ' 0 ' + (sweep > Math.PI ? 1 : 0) + ' 1 ' + x2.toFixed(2) + ',' + y2.toFixed(2) + ' Z"><title>' +
					esc(d.label) + ': ' + money(d.value) + ' (' + (d.value / TOTAL * 100).toFixed(1) + '%)</title></path>';
				var ly = 30 + i * 30;
				out += '<rect x="236" y="' + (ly - 9) + '" width="10" height="10" rx="2" fill="' + PIE_COLORS[i] + '"/>' +
					'<text class="spr-legend" x="252" y="' + ly + '">' + esc(d.label) + '</text>' +
					'<text class="spr-legend-val" x="252" y="' + (ly + 14) + '">' + money(d.value) + ' &#183; ' + (d.value / TOTAL * 100).toFixed(1) + '%</text>';
			});
			return out;
		}
	};

	function dots() {
		return DATA.map(function (d, i) {
			return '<circle class="spr-dot spr-fade" cx="' + cx(i).toFixed(1) + '" cy="' + y(d.value).toFixed(1) + '" r="4.5"><title>' + esc(d.label) + ': ' + money(d.value) + '</title></circle>';
		}).join('');
	}

	var LABELS = { bar: 'Bar', line: 'Line', area: 'Area', pie: 'Pie' };

	function init(dash) {
		var svg = dash.querySelector('[data-chart]');
		var types = dash.querySelector('[data-types]');
		var tabs = dash.querySelectorAll('[role="tab"]');
		var panels = dash.querySelectorAll('[data-panel]');
		if (!svg || !types) {
			return;
		}

		types.addEventListener('click', function (event) {
			var button = event.target.closest('[data-type]');
			if (!button || !DRAW[button.getAttribute('data-type')]) {
				return;
			}
			var type = button.getAttribute('data-type');
			types.querySelectorAll('[data-type]').forEach(function (other) {
				var on = other === button;
				other.classList.toggle('is-active', on);
				other.setAttribute('aria-pressed', on ? 'true' : 'false');
			});
			svg.innerHTML = DRAW[type]();
			svg.setAttribute('aria-label', LABELS[type] + ' chart: ' + DATA.map(function (d) { return d.label + ' ' + money(d.value); }).join(', '));
		});

		tabs.forEach(function (tab) {
			tab.addEventListener('click', function () {
				var name = tab.getAttribute('data-tab');
				tabs.forEach(function (other) { other.setAttribute('aria-selected', other === tab ? 'true' : 'false'); });
				panels.forEach(function (panel) { panel.hidden = panel.getAttribute('data-panel') !== name; });
				types.classList.toggle('is-off', name !== 'chart');
			});
		});
	}

	function start() {
		document.querySelectorAll('[data-spr-dash]').forEach(init);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', start);
	} else {
		start();
	}
}());
