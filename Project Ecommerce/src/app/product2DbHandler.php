<?php

class product2DbHandlerClass
  {

   public function deleteProductById ($id){
        global $dbconnect;
        try {
        $query = "
            DELETE FROM products
            WHERE id = :id;
        ";
            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
            } 
    }

 

    public function fetchProductById($id){
        global $dbconnect;
        try {
            $query = 
            "SELECT * FROM products 
        WHERE id = :id;
            ";
        //  $stmt = $dbconnect->query($query);
            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':id', $id );
            $stmt->execute();
            $product = $stmt->fetch();

            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $product;
        }

    public function fetchAllProducts(){
        global $dbconnect;
        try {
            $query = 
            "SELECT * FROM products 
            ";
        //  $stmt = $dbconnect->query($query);
            $stmt = $dbconnect->prepare($query);
            $stmt->execute();
            $products = $stmt->fetchAll();

            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $products;
        }

    public function updateProduct($productData) {
            global $dbconnect;
            try {
                $query = "
                UPDATE products 
                SET
                title= :product_name,
                description = :product_detail,
                price = :product_price,
                img_url= :product_image 

                WHERE id = :id
            ";        

            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':product_name', $productData['product_name']);
            $stmt->bindValue(':product_detail', $productData['product_detail']);
            $stmt->bindValue(':product_price', $productData['product_price']);
            $stmt->bindValue(':product_image', $productData['product_image']);

                $stmt->bindValue(':id', $productData['id']);
                 $result = $stmt->execute(); // returns true/false

                } catch (\PDOException $e) {
                    throw new \PDOException($e->getMessage(), (int) $e->getCode());
                };
            return $result;
        }

    public function addProduct($productData){
            global $dbconnect;

          try {
            $query = "
            INSERT INTO products (title,description,price,img_url)
            VALUES (:product_name,:product_detail,:product_price,:product_image);
        ";


        $stmt = $dbconnect->prepare($query);
        $stmt->bindValue(':product_name', $productData['product_name']);
        $stmt->bindValue(':product_detail', $productData['product_detail']);
        $stmt->bindValue(':product_price', $productData['product_price']);
        $stmt->bindValue(':product_image', $productData['product_image']);
 
       // $stmt->bindValue(':id', $userData['id']);
        $result = $stmt->execute(); // returns true/false

        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }   
        return $result;
        }




}


?>