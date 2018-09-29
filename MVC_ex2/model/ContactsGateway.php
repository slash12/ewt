<?php 
    class ContactsGateway
    {
        public function selectAll($order)
        {
            if(!isset($order))
            {
                $order = "name";
            }
            $con=mysqli_connect("localhost","root","","ewt");
            $dbOrder = mysqli_real_escape_string($con, $order);
            $dbres = mysqli_query($con, "SELECT * FROM contacts ORDER BY $dbOrder ASC");

            $contacts = array();
            while(($obj = mysqli_fetch_object($dbres)) != NULL)
            {
                $contacts[] = $obj;
            }
            return $contacts;
        }

        public function selectById($id)
        {
            $con=mysqli_connect("localhost","root","","ewt");
            $dbId = mysqli_real_escape_string($con, $id);
            $dbres = mysqli_query($con, "SELECT * FROM contacts WHERE id=$dbId");
            return mysqli_fetch_object($dbres);
        }

        public function insert($name, $phone, $email, $address)
        {
            $con=mysqli_connect("localhost","root","","ewt");
            $dbName = ($name != NULL)?"'".mysqli_real_escape_string($con, $name)."'":'NULL';
            $dbPhone = ($phone != NULL)?"'".mysqli_real_escape_string($con, $phone)."'":'NULL';
            $dbEmail = ($email != NULL)?"'".mysqli_real_escape_string($con, $email)."'":'NULL';
            $dbAddress = ($address != NULL)?"'".mysqli_real_escape_string($con, $address)."'":'NULL';

            $db_in  = mysqli_query($con, "INSERT INTO contacts (name, phone, email, address) VALUES ($dbName, $dbPhone, $dbEmail, $dbAddress)");
            return mysqli_insert_id($con);
        }

        public function delete($id)
        {
            $con=mysqli_connect("localhost","root","","ewt");
            $dbId = mysqli_real_escape_string($con, $id);
            mysqli_query($con, "DELETE FROM contacts WHERE id=$dbId");
        }
    }
?>