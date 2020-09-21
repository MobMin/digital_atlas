require('./bootstrap');

$(function() {
  /**
   * Handle the search bar
   */
  $('#search-countries').on('focus', function() {
    $(this).select();
  });
  $('#search-countries').on('keyup', function() {
    var val = $(this).val();
    var $dropdown = $('#search-form .dropdown-menu');
    var $autoList = $dropdown.find('.list-autocomplete');
    if (val == '') {
      $dropdown.removeClass('show');
      return;
    }
    $.ajax({
      url: '/countries/fetch',
      method: 'GET',
      data: {query: val},
      success: function(data) {
        if (data.length == 0) {
          $dropdown.find('.no-results').removeClass('d-none').addClass('d-show');
          $autoList.addClass('d-none');
          return;
        }
        $dropdown.find('.no-results').addClass('d-none').removeClass('d-show');
        $autoList.removeClass('d-none');
        $autoList.empty();
        for (var i = 0; i < data.length; i++) {
          var $button = $('<button/>').addClass('dropdown-item').text(data[i].name);
          $button.attr('data-url', '/countries/' + data[i].slug);
          $button.click(function(event) {
            event.stopPropagation();
            window.location.href = $(this).attr('data-url');
            return false;
          });
          $autoList.append($button);
        }
        $dropdown.addClass('show');
      }
    });
  });
});
