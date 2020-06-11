/*-----------------------------
        Producmy_profile modal  
    -------------------------------*/
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var first_name = button.data('first_name'); // Extract info from data-* attributes
  var last_name = button.data('last_name'); // Extract info from data-* attributes
  var street = button.data('street'); // Extract info from data-* attributes
  var city = button.data('city'); // Extract info from data-* attributes
  var postal_code = button.data('postal_code'); // Extract info from data-* attributes
  var country = button.data('country'); // Extract info from data-* attributes
  var phone = button.data('phone'); // Extract info from data-* attributes
  var email = button.data('email'); // Extract info from data-* attributes
  var password = button.data('password'); // Extract info from data-* attributes
  var confirmPassword = button.data('confirmPassword'); // Extract info from data-* attributes

  var id = button.data('id'); // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find(".modal-body input[name='first_name']").val(first_name);
  modal.find(".modal-body input[name='last_name']").val(last_name);
  modal.find(".modal-body input[name='street']").val(street);
  modal.find(".modal-body input[name='city']").val(city);
  modal.find(".modal-body input[name='postal_code']").val(postal_code);
  modal.find(".modal-body input[name='country']").val(country);
  modal.find(".modal-body input[name='phone']").val(phone);
  modal.find(".modal-body input[name='email']").val(email);
  modal.find(".modal-body input[name='password']").val(password);
  modal.find(".modal-body input[name='confirmPassword']").val(confirmPassword);

  modal.find(".modal-body input[name='id']").val(id);
  //   modal.find(".modal-body textarea[name='content']").html(content);
});

/*-----------------------------
        Confirm delete user_profile 
    -------------------------------*/
function myConfirm() {
  var result = confirm('Do you really want to delete your account?');
  if (result == true) {
    return true;
  } else {
    return false;
  }
}
