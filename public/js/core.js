$(function() {

    $('#createdon').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    //alert('hello');
    $('#created-on').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#duedate').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#sale-date').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    // to display the name of the file select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    //For state autocomplete
    var state = [
        "Albama",
        "Alaska",
        " American Samoa",
        "Arizona",
        "Arkansas",
    ];

    $('#state').autocomplete({
        source: state
    });

    //For county's panels
    $("#btnDoc").click(function() {
        $("#documents").toggle();
    });




    //alert('validation');
    // Disable form submissions if there are invalid fields
    'use strict';
    window.addEventListener('load', function() {

        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);



});