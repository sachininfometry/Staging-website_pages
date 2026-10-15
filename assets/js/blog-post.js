(function () {
	'use strict';

	function initToc() {
		var toc = document.querySelector('.ifb-toc');
		if (!toc) {
			return;
		}

		var box = toc.querySelector('.ifb-toc-box');
		var links = Array.prototype.slice.call(toc.querySelectorAll('a[href^="#"]'));
		var headings = links
			.map(function (link) { return document.getElementById(decodeURIComponent(link.getAttribute('href').slice(1))); })
			.filter(Boolean);
		var compact = window.matchMedia('(max-width: 1100px)');

		// Collapsed by default on tablet/mobile, open on desktop.
		function syncOpenState() {
			if (box) {
				box.open = !compact.matches;
			}
		}
		syncOpenState();
		if (compact.addEventListener) {
			compact.addEventListener('change', syncOpenState);
		}

		// Keep the desktop panel always open (summary is a label there, not a toggle).
		if (box) {
			box.querySelector('summary').addEventListener('click', function (event) {
				if (!compact.matches) {
					event.preventDefault();
				}
			});
		}

		function setActive(id) {
			links.forEach(function (link) {
				var active = link.getAttribute('href') === '#' + id;
				link.classList.toggle('is-active', active);
				if (active) {
					link.setAttribute('aria-current', 'true');
				} else {
					link.removeAttribute('aria-current');
				}
			});
		}

		links.forEach(function (link) {
			link.addEventListener('click', function () {
				setActive(decodeURIComponent(link.getAttribute('href').slice(1)));
				if (compact.matches && box) {
					box.open = false;
				}
			});
		});

		if (!headings.length || !('IntersectionObserver' in window)) {
			return;
		}

		// The active section is the last heading that has scrolled past the top band.
		function update() {
			var current = headings[0];
			var line = 140;
			headings.forEach(function (heading) {
				if (heading.getBoundingClientRect().top - line <= 0) {
					current = heading;
				}
			});
			setActive(current.id);
		}

		var ticking = false;
		window.addEventListener('scroll', function () {
			if (!ticking) {
				ticking = true;
				window.requestAnimationFrame(function () {
					update();
					ticking = false;
				});
			}
		}, { passive: true });
		update();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initToc);
	} else {
		initToc();
	}
}());
