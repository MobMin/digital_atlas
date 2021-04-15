import * as Cookies from 'js-cookie';
$(() => {
  /**
   * An array holding all the widgets available and there state.
   *
   * @type {Array}
   */
  let widgets = [];
  const filterCookie = Cookies.get('filter-options');
  if (typeof filterCookie === 'undefined') {
    $('div[data-widget-name]').each((index, ele) => {
      widgets.push({
        showing:  true,
        id:       $(ele).attr('id'),
        name:     $(ele).data('widget-name'),
      });
    });
  } else {
    widgets = JSON.parse(filterCookie);
  }
  /**
   * populate the dropdown
   *
   */
  const dropdown = $('#filter-options-dropdown .dropdown-menu');
  widgets.sort((a, b) =>  (a.name > b.name) ? 1 : -1);
  $.each(widgets, (index, widget) => {
    let icon = '<i class="far fa-square"></i>';
    if (widget.showing) {
      icon = '<i class="far fa-check-square"></i>';
    }
    dropdown.append(
      $('<a/>')
            .addClass('filter-option')
            .addClass('dropdown-item')
            .data('widget-target', widget.id)
            .data('widget-showing', widget.showing)
            .html(`${icon} ${widget.name}`)
    );
    /**
     * Hide widgets previously set to hidden
     *
     */
    if (!widget.showing) {
      $(`#${widget.id}`).hide();
    }
  });
  /**
   * Set up on click
   *
   */
  $(document).on('click', '#filter-options-dropdown .dropdown-menu .filter-option', (event) => {
    if (!event.currentTarget) {
      return false;
    }
    const ele = $(event.currentTarget);
    const showing = ele.data('widget-showing');
    const id = ele.data('widget-target');
    const selected = widgets.find((widget) => widget.id === id);
    selected.showing = !selected.showing;
    ele.data('widget-showing', selected.showing);
    if (selected.showing) {
      $(`#${id}`).show();
      ele.html(`<i class="far fa-check-square"></i> ${ele.text()}`);
    } else {
      $(`#${id}`).hide();
      ele.html(`<i class="far fa-square"></i> ${ele.text()}`);
    }
    Cookies.set('filter-options', JSON.stringify(widgets));
    event.stopPropagation();
    return false;
  });
});
