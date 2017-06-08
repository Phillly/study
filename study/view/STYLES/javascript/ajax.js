$(document).ready(function() {
    //* INSERT USER FUNCTION*/
    $("#register_form").submit(function(event) {
        event.preventDefault();
        var form = $("#register_form");
        var formdata = $('#register_form').serialize();
        var register_form_error = document.querySelectorAll('.register_form_error');
        $.ajax({
            type: "POST",
            url: "http://localhost/study/backend/functions/check_register.php",
            data: formdata,
            dataType: "JSON",
            success: function(response) {
                $("#succ_error").html("");
                $("#f_name").css("display", "none");

                if (response['empty'] == 'true') {
                    $(register_form_error[0]).show();
                }else{
                    $(register_form_error[0]).hide();
                }

                if (response['user_name_exist'] == 'true') {
                  $(register_form_error[1]).show();
                } else {
                    $(register_form_error[1]).hide();
                }

                if (response['email_false'] == 'true') {
                    $(register_form_error[2]).show();
                } else {
                    $(register_form_error[2]).hide();
                }

                if (response['email_exist'] == 'true') {
                    $(register_form_error[3]).show();
                } else {
                    $(register_form_error[3]).hide();
                }

                if (response['fail_pass'] == 'true') {
                    $(register_form_error[4]).show();
                } else {
                    $(register_form_error[4]).hide();
                }
                if (response['']) {
                    $("#succ_error").removeClass().addClass('success');
                    $("#succ_error").html("Form was succesfully submitted");
                    $(form).hide();
                    $("#form_modal").hide();
                    window.location.replace('http://localhost/study/sign_up.php?page=login');
                } else {}
            },
            error: function() {
            }
        })
    })
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    $("#login_form").submit(function(event) {
        var login_formdata = $('#login_form').serialize();
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "http://localhost/study/backend/functions/check_login.php",
            data: login_formdata,
            dataType: "JSON",
            success: function(response) {
                 if (response["wrong_false"]) {
                     $(".error_div").show();
                 }else{$(".error_div").hide();}
                 if(response["user_logged"]){
                   window.location.replace('http://localhost/study/backend/functions/change_user_session.php');
                 }
                
            },
            error: function() {}
        });
    });
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    var log_form = $(".login_form_div");
    var modal = $("#form_modal");
    var show_mobile_form = $(".span_log");
    var x_button = $(".button_div");
    $(show_mobile_form).click(function() {
      $(log_form).toggle();
      $(modal).show();
      $(x_button).toggle();
    });
    $(modal).click(function(){
      $(this).hide();
      $(log_form).hide();
      $(x_button).hide()
    });
    $(x_button).click(function(){
      $(this).hide();
      $(log_form).hide();
      $(modal).hide();
    });

    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    var li_item = $(".li_item");
    $("#menu").click(function() {
        $("#main_ul").toggle();
    });
    $(window).resize(function() {
      if (window.innerWidth > 768) {
          $("#main_ul").removeAttr("style");
      }
    });
    /////////////////////////////////////////////////////////

});
