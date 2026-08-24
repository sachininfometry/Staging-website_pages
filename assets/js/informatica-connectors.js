(function () {
  'use strict';
  var root = document.querySelector('.infometry-informatica-product');
  if (!root) return;

  var form = root.querySelector('#wpforms-form-379751, .iin-demo-form');
  if (form) {
    form.classList.add('iin-demo-form');
    var nameRow = form.querySelector('.wpforms-field-name .wpforms-field-row');
    if (nameRow) {
      nameRow.classList.add('iin-name-row');
      Array.prototype.forEach.call(nameRow.querySelectorAll('.wpforms-field-row-block'), function (block) {
        block.classList.add('iin-name-block');
        block.style.removeProperty('width');
        block.style.removeProperty('margin-left');
        block.style.removeProperty('float');
      });
    }
  }
  var dateInput = root.querySelector('[data-icp-demo-date]');
  var dateDisplay = root.querySelector('[data-icp-demo-date-display]');
  var timeInput = root.querySelector('[data-icp-demo-time]');
  var timezone = root.querySelector('[data-icp-demo-timezone]');
  var label = root.querySelector('[data-iin-calendar-label]');
  var days = root.querySelector('[data-iin-calendar-days]');
  var selectedText = root.querySelector('[data-iin-selected-date]');
  var previous = root.querySelector('[data-iin-calendar-prev]');
  var next = root.querySelector('[data-iin-calendar-next]');
  var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
  var shortMonths = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
  var today = new Date(); today.setHours(0, 0, 0, 0);
  var shown = new Date(today.getFullYear(), today.getMonth(), 1);
  var selected = new Date(today.getTime());

  function pad(value) { return String(value).padStart(2, '0'); }
  function value(date) { return date.getFullYear() + '-' + pad(date.getMonth() + 1) + '-' + pad(date.getDate()); }
  function display(date) { return shortMonths[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear(); }
  function sync(date) {
    selected = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    if (dateInput) dateInput.value = value(selected) + (timeInput && timeInput.value ? 'T' + timeInput.value : '');
    if (dateDisplay) dateDisplay.value = display(selected);
    if (selectedText) selectedText.innerHTML = '<span>✓ &nbsp; Selected demo date</span><strong>' + display(selected) + '</strong>';
  }
  function render() {
    if (!label || !days) return;
    var year = shown.getFullYear(), month = shown.getMonth();
    label.textContent = months[month] + ' ' + year; days.innerHTML = '';
    for (var blank = 0; blank < new Date(year, month, 1).getDay(); blank += 1) days.appendChild(document.createElement('span'));
    for (var day = 1; day <= new Date(year, month + 1, 0).getDate(); day += 1) {
      (function (date) {
        var button = document.createElement('button'); button.type = 'button'; button.textContent = date.getDate();
        if (date < today) { button.disabled = true; button.className = 'is-past'; }
        if (value(date) === value(selected)) button.classList.add('is-selected');
        button.addEventListener('click', function () { sync(date); render(); }); days.appendChild(button);
      }(new Date(year, month, day)));
    }
    if (previous) previous.disabled = year === today.getFullYear() && month === today.getMonth();
  }
  if (timeInput) { timeInput.value = timeInput.value || '10:00'; timeInput.addEventListener('change', function () { sync(selected); }); }
  if (timezone) {
    try {
      var zone = Intl.DateTimeFormat().resolvedOptions().timeZone;
      var offsetMinutes = -new Date().getTimezoneOffset();
      var sign = offsetMinutes >= 0 ? '+' : '-';
      var offset = sign + String(Math.floor(Math.abs(offsetMinutes) / 60)).padStart(2, '0') + ':' + String(Math.abs(offsetMinutes) % 60).padStart(2, '0');
      var option = new Option(zone + ' (UTC' + offset + ')', zone, true, true);
      timezone.insertBefore(option, timezone.firstChild); timezone.value = zone;
    } catch (error) {}
  }
  if (previous) previous.addEventListener('click', function () { shown = new Date(shown.getFullYear(), shown.getMonth() - 1, 1); render(); });
  if (next) next.addEventListener('click', function () { shown = new Date(shown.getFullYear(), shown.getMonth() + 1, 1); render(); });
  sync(selected); render();
}());
