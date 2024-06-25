// delete the selected row
$('.show_confirm').click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal.fire({
            title: 'Are you sure you want to delete it?',
            text: "You won't be able to revert the data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
});

// end of delete the selected row

var toggler = document.querySelectorAll('.form-password-toggle i');
if (typeof toggler !== 'undefined' && toggler !== null) { 
    toggler.forEach(function (el) { 
        el.addEventListener('click', function (e) {
            e.preventDefault();
            var formPasswordToggle = el.closest('.form-password-toggle');
            var formPasswordToggleIcon = formPasswordToggle.querySelector('i');
            var formPasswordToggleInput = formPasswordToggle.querySelector('input');
            if (formPasswordToggleInput.getAttribute('type') === 'text') {
                formPasswordToggleInput.setAttribute('type', 'password');
                formPasswordToggleIcon.classList.replace('bx-show', 'bx-hide');
            } 
            else if (formPasswordToggleInput.getAttribute('type') === 'password') {
                formPasswordToggleInput.setAttribute('type', 'text');
                formPasswordToggleIcon.classList.replace('bx-hide', 'bx-show');
            }
        });
    });
}

$(function() {
    'use strict'
  
    if ($(".js-example-basic-single").length) {
      $(".js-example-basic-single").select2();
    }
    if ($(".js-example-basic-multiple").length) {
      $(".js-example-basic-multiple").select2();
    }
  });

  $(function() {
    'use strict';
  
    if($('#datePickerExample').length) {
      var date = new Date();
      $('#datePickerExample').datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: false,
        autoclose: true
      });
    }
  });

  $(function() {
    'use strict';
  
    if($('#datePickerExample1').length) {
      var date = new Date();
      // Create a new date object for the first day of the next month
      var nextMonthDate = new Date(date.getFullYear(), date.getMonth() + 1, 1);
      $('#datePickerExample1').datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: false,
        autoclose: true
      });
    }
  });
  $(function() {
    'use strict';
  
    $('#datetimepickerExample').datetimepicker({
        format: "yyyy-mm-dd",
    });
  });


