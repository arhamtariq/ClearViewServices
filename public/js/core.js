$(function() {

    $('#createdon').datepicker({
        autoclose: true,
        todayHighlight: true
    });
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

    /*-------------------register form styling-----------------*/
    $("#overall-form").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        stepsOrientation: "vertical",
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate: '<div class="title">#title#</div>',
        labels: {
            previous: 'Back Step',
            next: '<i class = "fa fa-arrow-right" style="color:white;"></i>',
            finish: '<i class = "fa fa-arrow-right" style="color:white;"> </i>',
            current: ''
        },
        onFinished: function(event, currentIndex) {

            $("#rform").submit();

        }
    })

    // Disable form submissions if there are invalid fields

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

    //"use strict";
    $('.form-text').each(function() {
            alert('hhh');
            $(this).on('blur', function() {
                if ($(this).val().trim() != "") {
                    $(this).addClass('has-val');
                } else {
                    $(this).removeClass('has-val');
                }
            })
        })
        /*-------------------login form validations----------------*/
    var input = $('.validate-input .form-text');

    $('.validate-form').on('submit', function() {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });


    $('.validate-form .form-text').each(function() {

        $(this).focus(function() {
            hideValidate(this);
        });
    });

    function validate(input) {

        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }


});