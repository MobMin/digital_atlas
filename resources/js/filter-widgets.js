$(() => {
  /**
   * An array holding all the widgets available and there state.
   *
   * @type {Array}
   */
  const widgets = [];
  $('div[data-widget-name]').each((index, ele) => {
    widgets.push({
      showing:  true,
      id:       $(ele).attr('id'),
      name:     $(ele).data('widget-name'),
    });
  });
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
  });
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
      $(`#${id}`).parent().show();
      ele.html(`<i class="far fa-check-square"></i> ${ele.text()}`);
    } else {
      $(`#${id}`).parent().hide();
      ele.html(`<i class="far fa-square"></i> ${ele.text()}`);
    }
    event.stopPropagation();
    return false;
  });
});
