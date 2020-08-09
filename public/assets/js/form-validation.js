$(function() {
  'use strict';

  $(function() {
    // validate signup form on keyup and submit
    $("#signupForm").validate({
      rules: {
        name: {
          required: true,
          minlength: 3
        },
        password: {
          required: true,
          minlength: 8
        },
        password_confirmation: {
          required: true,
          minlength: 8,
          equalTo: "#password"
        },
        email: {
          required: true,
          email: true
        }
      },
      messages: {
        name: {
          required: "Harap masukkan nama.",
          minlength: "Nama harus terdiri dari minimal 3 karakter."
        },
        password: {
          required: "Harap masukkan kata sandi.",
          minlength: "Kata sandi harus terdiri dari minimal 8 karakter."
        },
        password_confirmation: {
          required: "Harap masukkan konfirmasi kata sandi.",
          equalTo: "Harap masukkan kata sandi yang sama seperti di atas"
        },
        email: "Harap masukkan email yang benar.",
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

  });
});