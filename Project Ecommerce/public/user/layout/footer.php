    <!-- Footer Section Begin -->
    <div class="footer spad"  >
        <div class="container">
            <div class="row">
         
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div  >
                            <a href="../index.php"><img src="../img/logo-footer.png" alt=""></a>
                        </div>
    
                    </div>
                </div>
         
                <div class="col-lg-6 col-md-12">
                    <div class="footer__widget">
                   
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p> 
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="http://green-basket.online" target="_blank">Green-basket.online</a>
  </p></div>
                        
                    </div>
                </div>
            </div>
        </div>
</div>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
	<script src="js/klorofil-common.js"></script>

    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var first_name = button.data('first_name') // Extract info from data-* attributes
          var last_name = button.data('last_name') // Extract info from data-* attributes
          var street = button.data('street') // Extract info from data-* attributes
          var city = button.data('city') // Extract info from data-* attributes
          var postal_code = button.data('postal_code') // Extract info from data-* attributes
          var country = button.data('country') // Extract info from data-* attributes
          var phone = button.data('phone') // Extract info from data-* attributes
          var email = button.data('email') // Extract info from data-* attributes
          var id = button.data('id'); // Extract info from data-* attributes

          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find(".modal-body input[name='first_name']").val(first_name);
          modal.find(".modal-body input[name='last_name']").val(last_name);
          modal.find(".modal-body input[name='street']").val(street);
          modal.find(".modal-body input[name='city']").val(city);
          modal.find(".modal-body input[name='postal_code']").val(postal_code);
          modal.find(".modal-body input[name='country']").val(country);
          modal.find(".modal-body input[name='phone']").val(phone);
          modal.find(".modal-body input[name='email']").val(email);


          modal.find(".modal-body input[name='id']").val(id);
        //   modal.find(".modal-body textarea[name='content']").html(content);          
        })
    </script>
<script>
function myConfirm() {
  var result = confirm("Want to delete?");
  if (result==true) {
   return true;
  } else {
   return false;
  }
} </script>
</body>

</html>