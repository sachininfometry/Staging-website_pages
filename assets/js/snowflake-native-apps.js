(function () {
  'use strict';

  var page = document.querySelector('.isn-page');
  if (!page) return;

  var revealItems = page.querySelectorAll('[data-isn-reveal]');
  if (!('IntersectionObserver' in window)) {
    revealItems.forEach(function (item) { item.classList.add('is-visible'); });
    return;
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -36px' });

  revealItems.forEach(function (item) { observer.observe(item); });
}());
