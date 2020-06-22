$(document).ready(function () {
    $("#createProductBtnId").on("click", addProductEvent);

    function addProductEvent(e) {
        e.preventDefault();

        let inTitle = $('input[name="productTitle"]');
        let inDescription = $('input[name="productDescription"]');
        let inPrice = $('input[name="productPrice"]');
        let inImgUrl = $('input[name="imgUrl"]');

        $.ajax({
            method: "POST",
            url: "create-Product.php",
            data: {
                // Skickas till add.php i form av POST parametrar
                crProductBtn: true,
                crProductTitle: inTitle.val(),
                crProductDescription: inDescription.val(),
                crProductPrice: inPrice.val(),
                crProductImgUrl: inImgUrl.val(),

            },
            dataType: "json",
            success: function (data) {
                let msg = '<div class="p-3 mb-2 bg-warning text-dark">' +
                    data['generalMsg'] + '</div>';
                $('#feedBackProduct').html(msg);
                setName(data);
            },
        });
        $('input[name="productTitle"]').val("");
        $('input[name="productDescription"]').val("");
        $('input[name="productPrice"]').val("");
        $('input[name="imgUrl"]').val("").val("");

    }

    // ---------Delete Portion-----
    $(".delProduct").on("click", deletProduct);

    function deletProduct(e) {
        e.preventDefault();

        let productId = $(this).parent().find('input[name="productHiddenID"]');
        // console.log(punId.val());
        $.ajax({
            method: "POST",
            url: "delete-Product.php",
            data: {
                // Skickas till add.php i form av POST parametrar
                deleteProBtn: true,
                pId: productId.val(),
            },
            dataType: "json",
            success: function (data) {
                let msg = data['generalMsg'];
                $('#feedBackProduct').html(msg);
                setName(data);
            },
        });

    }

    function setName(data) {
        let tr = "";
        for (a of data["products"]) {
            tr += '<tr>' +
                '<td>' + a["title"] + '</td>' +
                '<td>' + a["description"] + '</td>' +
                '<td>' + a["price"] + '</td>' +
                '<td>' +
                '<div clas= "row" id = "form-div-btn">' +
                '<div>' +
                '<form method="POST" action="#" mr-3">' +
                '<input type="hidden" name="productHiddenID" value="' + a["id"] + '">' +
                '<input type="submit"' +
                'class="delProduct btn btn-danger delete" name="deleteProductBtn" value="Delete">' +
                '</form>' +
                '</div>' +
                '<div>' +
                '<form action="edit_product_page.php" method="POST">' +
                '<input type="hidden" name="editProductHiddenID" value="' + a["id"] + '">' +
                '<input type="submit" name="editProductBtn" value="Edit" class="btn btn-info update">' +
                '</form>' +
                '</div>' +
                '</div>' +
                '</td>' +
                '</tr>';
        }
        $("#productTable").html(tr);
        $(".delProduct").on("click", deletProduct);

    }
});
//