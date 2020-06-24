$(document).ready(function () {
  /*-----------------------------
        register Ajax 
    -------------------------------*/

  $('#registerBtn').on('click', function (e) {
    e.preventDefault();

    let first_name = $('#first_name').val();
    let last_name = $('#last_name').val();
    let street = $('#street').val();
    let country = $('#country').val();
    let city = $('#city').val();
    let postal_code = $('#postal_code').val();
    let phone = $('#phone').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let confirmPassword = $('#confirmPassword').val();

    $.ajax({
      method: 'POST',
      url: 'add_user.php',
      data: {
        registerBtn: true,
        first_name: first_name,
        last_name: last_name,
        street: street,
        country: country,
        city: city,
        postal_code: postal_code,
        phone: phone,
        email: email,
        password: password,
        confirmPassword: confirmPassword,
      },
      dataType: 'json',
      success: function (data) {
        if (
          data['message'] ==
          '<div class="alert alert-success">Your registration is success</div>'
        ) {
          window.location.href = 'login_user.php';
        } else {
          e.preventDefault();
          $('#form-message').html(data['message']);
        }
      },
    });
  });
});
