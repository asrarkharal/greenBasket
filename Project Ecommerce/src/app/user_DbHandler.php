<?php

class userDbHandlerClass
{

    public function deleteUserById($id)
    {
        global $dbconnect;
        try {
            $query = "
            DELETE FROM users
            WHERE id = :id;
        ";
            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }



    public function fetchUserByEmail($email)
    {
        global $dbconnect;

        try {
            $query = "
	            SELECT * FROM users
	            WHERE email = :email;
	        ";

            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->execute(); // returns true/false
            // fetch() fetches 1 record, fetchAll() fetches alla records 
            $user = $stmt->fetch(); // returns the user record if exists, else returns false
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $user;
    }


    public function fetchUserById($id)
    {
        global $dbconnect;
        try {
            $query =
                "SELECT * FROM users 
        WHERE id = :id;
            ";
            //  $stmt = $dbconnect->query($query);
            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $user = $stmt->fetch();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $user;
    }

    public function fetchAllUser()
    {
        global $dbconnect;
        try {
            $query =
                "SELECT * FROM users 
            ";
            //  $stmt = $dbconnect->query($query);
            $stmt = $dbconnect->prepare($query);
            $stmt->execute();
            $user = $stmt->fetchAll();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $user;
    }

    public function updateUser($userData)
    {
        global $dbconnect;
        try {
            $query = "
                UPDATE users 
                SET 
                first_name= :first_name, 
                last_name=:last_name, 
                street=:street, 
                postal_code=:postal_code, 
                city=:city,
                country=:country,
                phone=:phone,
                email=:email,
                password=:password 

                WHERE id = :id
            ";
            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':first_name', $userData['first_name']);
            $stmt->bindValue(':last_name', $userData['last_name']);
            $stmt->bindValue(':street', $userData['street']);
            $stmt->bindValue(':postal_code', $userData['postal_code']);
            $stmt->bindValue(':city', $userData['city']);
            $stmt->bindValue(':country', $userData['country']);
            $stmt->bindValue(':phone', $userData['phone']);
            $stmt->bindValue(':email', $userData['email']);
            $stmt->bindValue(':password', password_hash($userData['password'], PASSWORD_BCRYPT));
            $stmt->bindValue(':id', $userData['id']);
            //$user = $stmt->fetch();
            $result = $stmt->execute(); // returns true/false

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        };
        return $result;
    }

    public function addUser($userData)
    {
        global $dbconnect;

        try {
            $query = "
            INSERT INTO users (first_name,last_name,street,city,postal_code,country,email,phone,password)
            VALUES (:first_name,:last_name,:street,:city,:postal_code,:country,:email,:phone,:password);
        ";


            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':first_name', $userData['first_name']);
            $stmt->bindValue(':last_name', $userData['last_name']);
            $stmt->bindValue(':street', $userData['street']);
            $stmt->bindValue(':postal_code', $userData['postal_code']);
            $stmt->bindValue(':city', $userData['city']);
            $stmt->bindValue(':country', $userData['country']);
            $stmt->bindValue(':phone', $userData['phone']);
            $stmt->bindValue(':email', $userData['email']);
            $stmt->bindValue(':password', password_hash($userData['password'], PASSWORD_BCRYPT));
            // $stmt->bindValue(':id', $userData['id']);
            $result = $stmt->execute(); // returns true/false

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $result;
    }

    //Asrar Version To Get back Last created user ID
    public function addUser2($userData)
    {
        global $dbconnect;

        try {
            $query = "
            INSERT INTO users (first_name,last_name,street,city,postal_code,country,email,phone,password)
            VALUES (:first_name,:last_name,:street,:city,:postal_code,:country,:email,:phone,:password);
        ";


            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':first_name', $userData['first_name']);
            $stmt->bindValue(':last_name', $userData['last_name']);
            $stmt->bindValue(':street', $userData['street']);
            $stmt->bindValue(':postal_code', $userData['postal_code']);
            $stmt->bindValue(':city', $userData['city']);
            $stmt->bindValue(':country', $userData['country']);
            $stmt->bindValue(':phone', $userData['phone']);
            $stmt->bindValue(':email', $userData['email']);
            $stmt->bindValue(':password', password_hash($userData['password'], PASSWORD_BCRYPT));
            // $stmt->bindValue(':id', $userData['id']);
            $result = $stmt->execute(); // returns true/false
            $userId = $dbconnect->lastInsertId();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return array('result' => $result, 'userId' => $userId);
    }
}