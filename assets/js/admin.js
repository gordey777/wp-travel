// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function() {};
  var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());
if (typeof jQuery === 'undefined') {
  console.warn('jQuery hasn\'t loaded');
} else {
  console.log('jQuery has loaded');
}
// Place any jQuery/helper plugins in here.

jQuery(document).ready(function($) {
  var $categoryDivs = $('.categorydiv');

  $categoryDivs.prepend('<input type="search" class="fc-search-field" placeholder="фильтр..." style="width:100%" />');

  $categoryDivs.on('keyup search', '.fc-search-field', function(event) {

    var searchTerm = event.target.value,
      $listItems = $(this).parent().find('.categorychecklist li');

    if ($.trim(searchTerm)) {
      $listItems.hide().filter(function() {
        return $(this).text().toLowerCase().indexOf(searchTerm.toLowerCase()) !== -1;
      }).show();
    } else {
      $listItems.show();
    }
  });
});
