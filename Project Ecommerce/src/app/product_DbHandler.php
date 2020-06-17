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

    // GET One Product
    public function getOneProduct($id)
    {
        global $dbconnect;
        try {
            $query = "
        SELECT * FROM products
        WHERE id = :id;
        
    ";
            $onepost = $dbconnect->prepare($query);
            $onepost->bindValue(':id', $id);
            $res = $onepost->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $onepost;
    }

    // GET One Product
    public function getOneProduct2($id)
    {
        global $dbconnect;
        try {
            $query = "
    SELECT * FROM products
    WHERE id = :id;
    
";
            $onepost = $dbconnect->prepare($query);
            $onepost->bindValue(':id', $id);
            $onepost->execute();
            $oneProduct = $onepost->fetch();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $oneProduct;
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

        if (!filter_var($productPrice, FILTER_VALIDATE_INT)) {
            $errorMessage .= '<li> Enter Price in Numbers.</li>';
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
    //--------------update function
    public function updateProduct($productPOST)
    {
        $_POST = $productPOST;

        global $dbconnect;

        $productId = "";
        $productTitle   = '';
        $productDescription = '';
        $productPrice  = '';
        $productImgUrl = "";

        $errorMessage = '';
        $errorUl = '';

        $productId = $_POST['productId'];
        $productTitle   = $_POST['productTitle'];
        $productDescription = $_POST['productDescription'];
        $productPrice  = $_POST['productPrice'];
        $productImgUrl = $_POST['imgUrl'];


        if (empty($productTitle)) {
            $errorMessage .= '<li> Title Can not be Empty.</li>';
        }

        if (empty($productDescription)) {
            $errorMessage .= '<li> Add Some Description.</li>';
        }
        if (empty($productPrice)) {
            $errorMessage .= '<li> Price Field Can not be Empty.</li>';
        }

        if (!filter_var($productPrice, FILTER_VALIDATE_INT)) {
            $errorMessage .= '<li> Enter Price in Numbers.</li>';
        }

        if (empty($productImgUrl)) {
            $errorMessage .= '<li> Image Field Can not be Empty.</li>';
        }

        if (!empty($errorMessage)) {
            $errorUl = "<ul id ='listOfErrors' >{$errorMessage}</ul>";
        }

        if (empty($errorUl)) {
            try {
                $query = "UPDATE products SET title = :etitle, description = :edesc, price = :eprice, img_url = :eimgurl
        WHERE id = :eid;
           ";
                $st = $dbconnect->prepare($query);
                $st->bindValue(':etitle', $productTitle);
                $st->bindValue(':edesc', $productDescription);
                $st->bindValue(':eprice', $productPrice);
                $st->bindValue('eimgurl', $productImgUrl);
                $st->bindValue(':eid', $productId);
                $result = $st->execute();
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
            }
        } else {
            return array(
                "myul" => $errorUl, "pTitle" => $productTitle,
                "pDescription" => $productDescription,
                "pPrice" => $productPrice, "pId" => $productId, "pImg" => $productImgUrl
            );
            //return $errorUl . $title . $content . $author;
        }
    }
}
// Add paramerters and return Values in functions according to need