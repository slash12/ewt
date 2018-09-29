<?php 
    class ContactsGateway
    {
        public function selectAll($order)
        {
            if(!isset($order))
            {
                $order = "name";
            }
            // $con=mysqli_connect("localhost","root","","ewt");
            // $dbOrder = mysqli_real_escape_string($con, $order);
            // $dbres = mysqli_query($con, "SELECT * FROM contacts ORDER BY $dbOrder ASC");

            // $contacts = array();
            // while(($obj = mysqli_fetch_object($dbres)) != NULL)
            // {
            //     $contacts[] = $obj;
            // }
            try 
            {
                $conn = new PDO("mysql:host=localhost;dbname=ewt", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM contacts ORDER BY $order ASC");
                $stmt->execute();
                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $cont = $stmt->fetchAll();
                foreach($cont as $contact) 
                {
                    $contacts[] = $contact;
                }
            }
            catch(PDOException $e) 
            {
                echo "Error: " . $e->getMessage();
            }
            return $contacts;            
        }

        public function selectById($id)
        {
            // $con=mysqli_connect("localhost","root","","ewt");
            // $dbId = mysqli_real_escape_string($con, $id);
            // $dbres = mysqli_query($con, "SELECT * FROM contacts WHERE id=$dbId");
            // return mysqli_fetch_object($dbres);
            try 
            {
                $conn = new PDO("mysql:host=localhost;dbname=ewt", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM contacts WHERE id=$id");
                $stmt->execute();
                // set the resulting array to associative
                // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                // $cont =  $stmt->fetchAll();
                $cont = $stmt->fetchAll(PDO::FETCH_OBJ);
                // foreach($cont as $contact) 
                // {
                //     $contacts[] = $contact;
                // }
                return $cont;
                // var_dump($cont);
            }
            catch(PDOException $e) 
            {
                echo "Error: " . $e->getMessage();
            }
        }

        public function selectProById($id)
        {
            // $con=mysqli_connect("localhost","root","","ewt");
            // $dbId = mysqli_real_escape_string($con, $id);
            // $dbres = mysqli_query($con, "SELECT * FROM contacts WHERE id=$dbId");
            // return mysqli_fetch_object($dbres);
            try 
            {
                $conn = new PDO("mysql:host=localhost;dbname=ewt", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM product WHERE id=$id");
                $stmt->execute();
                // set the resulting array to associative
                // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                // $cont =  $stmt->fetchAll();
                $cont = $stmt->fetchAll(PDO::FETCH_OBJ);
                // foreach($cont as $contact) 
                // {
                //     $contacts[] = $contact;
                // }
                return $cont;
                // var_dump($cont);
            }
            catch(PDOException $e) 
            {
                echo "Error: " . $e->getMessage();
            }
        }

        public function insert($name, $phone, $email, $address)
        {
            echo "test";
            // $con=mysqli_connect("localhost","root","","ewt");
            $dbName = ($name != NULL)?"'".$name."'":'NULL';
            $dbPhone = ($phone != NULL)?"'".$phone."'":'NULL';
            $dbEmail = ($email != NULL)?"'".$email."'":'NULL';
            $dbAddress = ($address != NULL)?"'".$address."'":'NULL';

            // $db_in  = mysqli_query($con, "INSERT INTO contacts (name, phone, email, address) VALUES ($dbName, $dbPhone, $dbEmail, $dbAddress)");
            // return mysqli_insert_id($con);
            try 
            {
                $conn = new PDO("mysql:host=localhost;dbname=ewt", 'root', '');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO contacts (name, phone, email, address) VALUES ($dbName, $dbPhone, $dbEmail, $dbAddress)";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "<script>alert('New record created successfully')</script>";
                // return $conn->lastInsertId();
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                // echo "<script>alert('test');</script>";
            }
        }

        public function insertProduct($name, $quantity, $price)
        {
            // $con=mysqli_connect("localhost","root","","ewt");
            $dbName = ($name != NULL)?"'".$name."'":'NULL';
            $dbQuantity = ($quantity != NULL)?"'".$quantity."'":'NULL';
            $dbPrice = ($price != NULL)?"'".$price."'":'NULL';            

            try 
            {
                $conn = new PDO("mysql:host=localhost;dbname=ewt", 'root', '');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO product (name, quantity, price) VALUES ($dbName, $dbQuantity, $dbPrice)";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "<script>alert('New record created successfully')</script>";
                // return $conn->lastInsertId();
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                // echo "<script>alert('test');</script>";
            }
        }

        public function delete($id)
        {
            // $con=mysqli_connect("localhost","root","","ewt");
            // $dbId = mysqli_real_escape_string($con, $id);
            // mysqli_query($con, "DELETE FROM contacts WHERE id=$dbId");
            try 
            {
                $conn = new PDO("mysql:host=localhost;dbname=ewt", 'root', '');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM contacts WHERE id=$id";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "<script>alert('Record deleted successfully')</script>";
                // return $conn->lastInsertId();
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                // echo "<script>alert('test');</script>";
            }
        }

        public function deleteProduct($id)
        {
            // $con=mysqli_connect("localhost","root","","ewt");
            // $dbId = mysqli_real_escape_string($con, $id);
            // mysqli_query($con, "DELETE FROM contacts WHERE id=$dbId");
            try 
            {
                $conn = new PDO("mysql:host=localhost;dbname=ewt", 'root', '');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM product WHERE id=$id";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "<script>alert('Record deleted successfully')</script>";
                // return $conn->lastInsertId();
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                // echo "<script>alert('test');</script>";
            }
        }

        public function selectAllProduct($order)
        {
            if(!isset($order))
            {
                $order = "name";
            }
            // $con=mysqli_connect("localhost","root","","ewt");
            // $dbOrder = mysqli_real_escape_string($con, $order);
            // $dbres = mysqli_query($con, "SELECT * FROM contacts ORDER BY $dbOrder ASC");

            // $contacts = array();
            // while(($obj = mysqli_fetch_object($dbres)) != NULL)
            // {
            //     $contacts[] = $obj;
            // }
            try 
            {
                $conn = new PDO("mysql:host=localhost;dbname=ewt", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM product ORDER BY $order ASC");
                $stmt->execute();
                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $prod = $stmt->fetchAll();
                foreach($prod as $product) 
                {
                    $products[] = $product;
                }
            }
            catch(PDOException $e) 
            {
                echo "Error: " . $e->getMessage();
            }
            return $products;     
            // var_dump($products);
        }
    }
?>