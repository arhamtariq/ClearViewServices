$(function() {

    //for smooth scrolling
    $('#nav li a').click(function(e) {

        var targetHref = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(targetHref).offset().top - 100
        }, 1000);
    });
    //for pagination
    function page($page_id) {
        var page = $page_id;
        //page=page-1;
        var url = window.location.origin + window.location.pathname;
        window.location.href = url + "?page=" + page + "";
    }

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

    $('#saledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });

    $('#checksenton').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    })

    $('#checkreceivedon').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    })

    //For state autocomplete
    var state = [
        "Albama",
        "Alaska",
        "American Samoa",
        "Arizona",
        "Arkansas",
    ];
    //$('#state').autocomplete({
    //    source:state
    //});
    $('#state').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: 'autocomplete',
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data) {
                    var resp = $.map(data, function(obj) {
                        //console.log(obj.state_name);
                        return obj.state_name;
                    });
                    response(resp);
                }
            });
        },
        minLength: 1
    });

    // to display the name of the file select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });



    //For county's panels
    $("#btnDoc").click(function() {
        $("#documents").toggle();
    });

    'use strict';
    /*-------------------form validations----------------*/
    $('.form-control').each(function() {
        //alert('ads');
        $(this).on('blur', function() {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })

    $('#frm-owner-track').on('submit', function() {
        var check = true;
        //alert('validations');
        var input = $('#frm-owner-track .validate-input .form-control');

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });

    $('#frm-owner').on('submit', function() {
        var check = true;
        //alert('validations');
        var input = $('#frm-owner .validate-input .form-control');

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });

    $('#frm-owner-cont').on('submit', function() {
        var check = true;
        //alert('validations');
        var input = $('#frm-owner-cont .validate-input .form-control');
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });

    $('#frm-owner-doc').on('submit', function() {
        var check = true;
        //alert('validations');
        var input = $('#frm-owner-doc .validate-input .form-control');

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });

    $('#frm-owner-notes').on(submit, function() {
        var check = true;
        //alert('validations');
        var input = $('#frm-owner-notes .validate-input .form-control');

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    })
    $('.validate-form .form-control').each(function() {

        $(this).focus(function() {
            hideValidate(this);
        });
    });

    function validate(input) {
        //alert($(input).val().trim());
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