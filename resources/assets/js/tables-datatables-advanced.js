/**
 * DataTables Advanced (jquery)
 */

'use strict';

$(function () {
  var dt_ajax_table = $('.datatables-ajax'),
    dt_filter_table = $('.dt-column-search'),
    dt_filter_table1 = $('.dt-column-search-1'),
    dt_filter_table2 = $('.dt-column-search-2'),
    dt_adv_filter_table = $('.dt-advanced-search'),
    dt_responsive_table = $('.dt-responsive'),
    startDateEle = $('.start_date'),
    endDateEle = $('.end_date');

  // Advanced Search Functions Starts
  // --------------------------------------------------------------------

  // Datepicker for advanced filter
  var rangePickr = $('.flatpickr-range'),
    dateFormat = 'MM/DD/YYYY';

  if (rangePickr.length) {
    rangePickr.flatpickr({
      mode: 'range',
      dateFormat: 'm/d/Y',
      orientation: isRtl ? 'auto right' : 'auto left',
      locale: {
        format: dateFormat
      },
      onClose: function (selectedDates, dateStr, instance) {
        var startDate = '',
          endDate = new Date();
        if (selectedDates[0] != undefined) {
          startDate = moment(selectedDates[0]).format('MM/DD/YYYY');
          startDateEle.val(startDate);
        }
        if (selectedDates[1] != undefined) {
          endDate = moment(selectedDates[1]).format('MM/DD/YYYY');
          endDateEle.val(endDate);
        }
        $(rangePickr).trigger('change').trigger('keyup');
      }
    });
  }

  // Filter column wise function
  function filterColumn(i, val) {
    if (i == 5) {
      var startDate = startDateEle.val(),
        endDate = endDateEle.val();
      if (startDate !== '' && endDate !== '') {
        $.fn.dataTableExt.afnFiltering.length = 0; // Reset datatable filter
        dt_adv_filter_table.dataTable().fnDraw(); // Draw table after filter
        filterByDate(i, startDate, endDate); // We call our filter function
      }
      dt_adv_filter_table.dataTable().fnDraw();
    } else {
      dt_adv_filter_table.DataTable().column(i).search(val, false, true).draw();
    }
  }

  // Advance filter function
  // We pass the column location, the start date, and the end date
  $.fn.dataTableExt.afnFiltering.length = 0;
  var filterByDate = function (column, startDate, endDate) {
    // Custom filter syntax requires pushing the new filter to the global filter array
    $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
      var rowDate = normalizeDate(aData[column]),
        start = normalizeDate(startDate),
        end = normalizeDate(endDate);

      // If our date from the row is between the start and end
      if (start <= rowDate && rowDate <= end) {
        return true;
      } else if (rowDate >= start && end === '' && start !== '') {
        return true;
      } else if (rowDate <= end && start === '' && end !== '') {
        return true;
      } else {
        return false;
      }
    });
  };

  // converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
  var normalizeDate = function (dateString) {
    var date = new Date(dateString);
    var normalized =
      date.getFullYear() + '' + ('0' + (date.getMonth() + 1)).slice(-2) + '' + ('0' + date.getDate()).slice(-2);
    return normalized;
  };
  // Advanced Search Functions Ends

  // Ajax Sourced Server-side
  // --------------------------------------------------------------------

  if (dt_ajax_table.length) {
    var dt_ajax = dt_ajax_table.dataTable({
      processing: true,
      ajax: assetsPath + 'json/ajax.php',
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    });
  }

  // Column Search
  // --------------------------------------------------------------------

  if (dt_filter_table.length) {
    // Setup - add a text input to each footer cell
    $('.dt-column-search thead tr').clone(true).appendTo('.dt-column-search thead');
    $('.dt-column-search thead tr:eq(1) th').each(function (i) {
      var title = $(this).text();
      var $input = $('<input type="text" class="form-control" placeholder="Search ' + title + '" />');

      // Add left and right border styles to the parent element
      $(this).css('border-left', 'none');
      if (i === $('.dt-column-search thead tr:eq(1) th').length - 1) {
        $(this).css('border-right', 'none');
      }

      $(this).html($input);

      $('input', this).on('keyup change', function () {
        if (dt_filter.column(i).search() !== this.value) {
          dt_filter.column(i).search(this.value).draw();
        }
      });
    });

    var dt_filter = dt_filter_table.DataTable({
      ajax: assetsPath + 'json/table-datatable.json',
      columns: [
        { data: 'id' },
        {
          data: null, // No data source needed for "0"
          render: function (data, type, row) {
            return data.start_date + ', ' + data.start_time;
          }
        },
        {
          data: null, // No data source needed for "0"
          render: function (data, type, row) {
            // Create Date objects for the start and end times
            const start = new Date();
            const end = new Date(data.start_date.trim() + 'T' + data.start_time) 

            // Calculate the difference in milliseconds
            const difference = end - start;

            // Convert the difference to a readable format (hours, minutes, seconds)
            const hours = Math.floor(difference / 1000 / 60 / 60);
            const days = Math.floor(hours/24);
            if(days > 0) {
              return `${days} days`
            } else {
              if(hours >= 1) {
                return `${hours} hours`
              } else if(hours > 0 && hours < 1) {
                return `Now`
              } else if(hours <= 0) {
                return 'Past'
              }
            }

          }
        },
        {
          data: null, // No data source needed for "0"
          render: function (data, type, row) {
            return data.first_name + ' ' + data.last_name;
          }
        },
        { data: 'status' },
        { data: 'payment_status' },
        {
          data: null, // No data source needed for "0"
          render: function (data, type, row) {
            return formatDate(data.created_at);
          }
        },

      ],
      orderCellsTop: true,
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    });
  }

  //date format
  function formatDate(dateString) {
    // Create a new Date object from the input string
    const date = new Date(dateString);

    // Array of month names
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    // Extract components
    const month = monthNames[date.getMonth()];
    const day = date.getDate();
    const year = date.getFullYear();

    // Get hours and minutes
    let hours = date.getHours();
    const minutes = date.getMinutes();
    
    // Determine AM or PM
    const ampm = hours >= 12 ? 'PM' : 'AM';

    // Convert hours from 24-hour time to 12-hour time
    hours = hours % 12;
    hours = hours ? hours : 12; // If hours is 0, set it to 12

    // Format minutes to ensure two digits
    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;

    // Format the final date string
    const formattedDate = `${month} ${day}, ${year} ${hours}:${formattedMinutes} ${ampm}`;
    
    return formattedDate;
}

  // Payment table
  if (dt_filter_table1.length) {
    // Setup - add a text input to each footer cell
    $('.dt-column-search-1 thead tr').clone(true).appendTo('.dt-column-search-1 thead');
    $('.dt-column-search-1 thead tr:eq(1) th').each(function (i) {
      var title = $(this).text();
      var $input = $('<input type="text" class="form-control" placeholder="Search ' + title + '" />');

      // Add left and right border styles to the parent element
      $(this).css('border-left', 'none');
      if (i === $('.dt-column-search-1 thead tr:eq(1) th').length - 1) {
        $(this).css('border-right', 'none');
      }

      $(this).html($input);

      $('input', this).on('keyup change', function () {
        if (dt_filter.column(i).search() !== this.value) {
          dt_filter.column(i).search(this.value).draw();
        }
      });
    });

    var dt_filter = dt_filter_table1.DataTable({
      ajax: assetsPath + 'json/table-datatable1.json',
      columns: [
        { data: 'id' },
        { data: 'token' },
        { data: 'booking_id' },
        { data: 'customer_id' },
        { data: 'processor' },
        { data: 'payment_method' },
        { data: 'amount' },
        { data: 'status' },
        { data: 'funds_status' },
        {
          data: 'created_at',
          render: function (data, type, row) {
            // Replace 'YYYY-MM-DD' with your desired format (e.g., 'MM-DD-YYYY' for '05-16-2024')
            var formattedDate = new Date(data).toLocaleDateString('en-US'); // 'YYYY-MM-DD' format
            return formattedDate;
          }
        }
      ],
      orderCellsTop: true,
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    });
  }

  // Customers table
  if (dt_filter_table2.length) {
    // Setup - add a text input to each footer cell
    $('.dt-column-search-2 thead tr').clone(true).appendTo('.dt-column-search-2 thead');
    $('.dt-column-search-2 thead tr:eq(1) th').each(function (i) {
      var title = $(this).text();
      var $input = $('<input type="text" class="form-control" placeholder="Search ' + title + '" />');

      // Add left and right border styles to the parent element
      $(this).css('border-left', 'none');
      if (i === $('.dt-column-search-2 thead tr:eq(1) th').length - 1) {
        $(this).css('border-right', 'none');
      }

      $(this).html($input);

      $('input', this).on('keyup change', function () {
        if (dt_filter.column(i).search() !== this.value) {
          dt_filter.column(i).search(this.value).draw();
        }
      });
    });

    var dt_filter = dt_filter_table2.DataTable({
      ajax: assetsPath + 'json/table-datatable2.json',
      columns: [
        { data: 'id' },
        {
          data: null, // No data source needed
          render: function (data, type, row) {
            return row.first_name + ' ' + row.last_name;
          }
        },
        {
          data: null, // No data source needed
          render: function (data, type, row) {
            if (row.phone) {
              return  row.phone;
            } else {
              return null;
            }
          }
        },
        { data: 'email' },
        {
          data: null, // No data source needed for "0"
          render: function (data, type, row) {
            return '0'; // Replace "0" with your desired text ("n/a" or "Past")
          }
        }, //'total_apps'
        {
          data: null, // No data source needed for "0"
          render: function (data, type, row) {
            return 'n/a';
          }
        }, //'next_app'
        {
          data: null, // No data source needed for "0"
          render: function (data, type, row) {
            return 'Past'; // Replace "0" with your desired text ("n/a" or "Past")
          }
        }, //'time_to_next'
        { data: 'user_id' }, //'laravel_user_id'
        {
          data: 'created_at',
          render: function (data, type, row) {
            // Replace 'YYYY-MM-DD' with your desired format (e.g., 'MM-DD-YYYY' for '05-16-2024')
            var formattedDate = new Date(data).toLocaleDateString('en-US'); // 'YYYY-MM-DD' format
            return formattedDate;
          }
        }, //'registered_on'
        {
          data: null, // No data source needed for the action link
          render: function (data, type, row) {
            // Replace 'edit' with the actual property name or value for the action link
            var editLink = '/edit_customer/' + row.id; // Assuming 'id' is used for the link
            return '<a href="' + editLink + '">Edit</a>';
          }
        } //'actions'
      ],
      orderCellsTop: true,
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    });
  }

  // Advanced Search
  // --------------------------------------------------------------------

  // Advanced Filter table
  if (dt_adv_filter_table.length) {
    var dt_adv_filter = dt_adv_filter_table.DataTable({
      dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 dataTables_pager'p>>",
      ajax: assetsPath + 'json/table-datatable.json',
      columns: [
        { data: '' },
        { data: 'full_name' },
        { data: 'email' },
        { data: 'post' },
        { data: 'city' },
        { data: 'start_date' },
        { data: 'salary' }
      ],

      columnDefs: [
        {
          className: 'control',
          orderable: false,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        }
      ],
      orderCellsTop: true,
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
  }

  // on key up from input field
  $('input.dt-input').on('keyup', function () {
    filterColumn($(this).attr('data-column'), $(this).val());
  });

  // Responsive Table
  // --------------------------------------------------------------------

  if (dt_responsive_table.length) {
    var dt_responsive = dt_responsive_table.DataTable({
      ajax: assetsPath + 'json/table-datatable.json',
      columns: [
        { data: '' },
        { data: 'full_name' },
        { data: 'email' },
        { data: 'post' },
        { data: 'city' },
        { data: 'start_date' },
        { data: 'salary' },
        { data: 'age' },
        { data: 'experience' },
        { data: 'status' }
      ],
      columnDefs: [
        {
          className: 'control',
          orderable: false,
          targets: 0,
          searchable: false,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // Label
          targets: -1,
          render: function (data, type, full, meta) {
            var $status_number = full['status'];
            var $status = {
              1: { title: 'Current', class: 'bg-label-primary' },
              2: { title: 'Professional', class: ' bg-label-success' },
              3: { title: 'Rejected', class: ' bg-label-danger' },
              4: { title: 'Resigned', class: ' bg-label-warning' },
              5: { title: 'Applied', class: ' bg-label-info' }
            };
            if (typeof $status[$status_number] === 'undefined') {
              return data;
            }
            return (
              '<span class="badge rounded-pill ' +
              $status[$status_number].class +
              '">' +
              $status[$status_number].title +
              '</span>'
            );
          }
        }
      ],
      // scrollX: true,
      destroy: true,
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
  }

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 200);
});
