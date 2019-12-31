$(function() {
    'use strict';

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
        /*onStepChanging: function(e, currentIndex, newIndex) {
             var input = $('.validate-input .form-control');
             
             var check = true;

             for (var i = 0; i < input.length; i++) {
                 if (validate(input[i]) == false) {
                     showValidate(input[i]);
                     check = false;
                 }
             }

             return check;

        },*/
        onFinished: function(event, currentIndex) {

            $("#rform").submit();

        }
    })

    $('.validate-input .form-control').each(function() {

            $(this).on('blur', function() {
                if (validate(this) == false) {
                    showValidate(this);
                } else {
                    $(this).parent().addClass('true-validate');
                }
            })
        })
        /*-------------------register form validations----------------*/
    var input = $('.validate-input .form-control');

    $('#rform').on('submit', function() {

        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }
        $("#overall-form").get(0).click();
        if (!check) {
            $("#overall-form").get(0).click();
        }
        return check;
    });


    $('.validate-form .form-control').each(function() {

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

        var thisAlert = $(input).parent().parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent().parent();

        $(thisAlert).removeClass('alert-validate');
    }
});