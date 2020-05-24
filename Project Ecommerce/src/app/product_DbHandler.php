<?php
include('../../src/dbconnect.php');
?>
<?php
class productDbHandlerClass
{
    public function getAllProducts()
    {

        global $dbconnect;
        try {
            $query = "
        SELECT * FROM products;
    ";
            $stmt  = $dbconnect->query($query);
            $productsListArray = $stmt->fetchAll();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $productsListArray;
    }
    public function getOneProduct($id)
    {
    }


    //
    public function deleteOneProduct($id)
    {
        global $dbconnect;

        try {
            $query = "
            DELETE FROM products
            WHERE id = :id;
                    ";
            $oneProduct = $dbconnect->prepare($query);
            $oneProduct->bindValue(':id', $id);
            $oneProduct->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    // On click of submit button from FORM, This function catches
    // $_POST variable and $_POST['title']...
    // if Product is created it returns string "Product Created"
    // if Product is not created it return a string with error UL>li> errors
    public function createProduct($productInfo)
    {

        global  $dbconnect;

        $productTitle   = '';
        $productDescription = '';
        $productPrice  = '';
        $productImgUrl = "";

        $errorMessage = '';
        $errorUl = '';

        $productTitle   = $productInfo['productTitle'];
        $productDescription = $productInfo['productDescription'];
        $productPrice = $productInfo['productPrice'];
        $productImgUrl = $productInfo['imgUrl'];

        if (empty($productTitle)) {
            $errorMessage .= '<li> Product Title Can not be Empty.</li>';
        }
        if (empty($productDescription)) {
            $errorMessage .= '<li> Product Description can not be empty</li>';
        }
        if (empty($productPrice)) {
            $errorMessage .= '<li> Product Price Field Can not be Empty.</li>';
        }
        if (empty($productImgUrl)) {
            $errorMessage .= '<li> Img url Field Can not be Empty.</li>';
        }

        if (!empty($errorMessage)) {
            $errorUl = "<ul id ='listOfErrors' >{$errorMessage}</ul>";
        }

        if (empty($errorUl)) {

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";

            try {
                $query = "INSERT INTO products (title, description, price, img_url)
            VALUES (:title, :description, :price, :imgurl);
        ";
                $st = $dbconnect->prepare($query);
                $st->bindValue(':title', $productTitle);
                $st->bindValue(':description', $productDescription);
                $st->bindValue(':price', $productPrice);
                $st->bindValue(':imgurl', $productImgUrl);
                $blogCreated = $st->execute();
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
            }
            if ($blogCreated) {
                return "Product Created";
            }
        } else {
            return $errorUl;
        }
    }
}
// Add paramerters and return Values in functions according to need