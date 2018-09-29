<?php
require_once 'model/ContactsGateway.php';
require_once 'model/ValidationException.php';

class ContactsService 
{
    private $contactsGateway = NULL;
    private function openDb() 
    {
        $con=mysqli_connect("localhost","root","","ewt");
        if (!mysqli_connect("localhost", "root", "", "ewt")) 
        {
            throw new Exception("Connection to the database server failed!");
        }
        if (!mysqli_select_db($con,"ewt")) 
        {
            throw new Exception("No mvc-crud database found on database server.");
        }
    }

    private function closeDb() 
    {
        $con=mysqli_connect("localhost","root","","ewt");
        mysqli_close($con);
    }

    public function __construct() 
    {
        $this->contactsGateway = new ContactsGateway();
    }

    public function getAllContacts($order) 
    {
        try 
        {
            $this->openDb();
            $res = $this->contactsGateway->selectAll($order);
            $this->closeDb();
            return $res;
        } 
        catch (Exception $e) 
        {
            $this->closeDb();
            throw $e;
        }
    }

    public function getAllProducts($order) 
    {
        try 
        {
            $this->openDb();
            $res = $this->contactsGateway->selectAllProduct($order);
            $this->closeDb();
            return $res;
        } 
        catch (Exception $e) 
        {
            $this->closeDb();
            throw $e;
        }
    }

    public function getContact($id) 
    {
        try 
        {
            $this->openDb();
            $res = $this->contactsGateway->selectById($id);
            $this->closeDb();
            return $res;
        } 
        catch (Exception $e) 
        {
            $this->closeDb();
            throw $e;
        }
        return $this->contactsGateway->find($id);
    }

    public function getProduct($id) 
    {
        try 
        {
            $this->openDb();
            $res = $this->contactsGateway->selectProById($id);
            $this->closeDb();
            return $res;
        } 
        catch (Exception $e) 
        {
            $this->closeDb();
            throw $e;
        }
        return $this->contactsGateway->find($id);
    }

    private function validateContactParams( $name, $phone, $email, $address ) 
    {
        $errors = array();
        if ( !isset($name) || empty($name) ) 
        {
            $errors[] = 'Name is required';
        }
        if ( empty($errors) ) 
        {
            return;
        }
        throw new ValidationException($errors);
    }

    private function validateProductParams( $name, $quantity, $price) 
    {
        $errors = array();
        if ( !isset($name) || empty($name) ) 
        {
            $errors[] = 'Name is required';
        }
        if ( empty($errors) ) 
        {
            return;
        }
        throw new ValidationException($errors);
    }

    public function createNewContact( $name, $phone, $email, $address ) 
    {
        try 
        {
            $this->openDb();
            $this->validateContactParams($name, $phone, $email, $address);
            $res = $this->contactsGateway->insert($name, $phone, $email, $address);
            $this->closeDb();
            return $res;
        } catch (Exception $e) 
        {
            $this->closeDb();
            throw $e;
        }
    }

    public function createNewProduct( $name, $quantity, $price) 
    {
        try 
        {
            $this->openDb();
            $this->validateProductParams($name, $quantity, $price);
            $res = $this->contactsGateway->insertProduct($name, $quantity, $price);
            $this->closeDb();
            return $res;
        } catch (Exception $e) 
        {
            $this->closeDb();
            throw $e;
        }
    }

    public function deleteContact( $id ) 
    {
        try 
        {
            $this->openDb();
            $res = $this->contactsGateway->delete($id);
            $this->closeDb();
        } 
        catch (Exception $e) 
        {
            $this->closeDb();
            throw $e;
        }
    }

    public function deleteProduct( $id ) 
    {
        try 
        {
            $this->openDb();
            $res = $this->contactsGateway->deleteProduct($id);
            $this->closeDb();
        } 
        catch (Exception $e) 
        {
            $this->closeDb();
            throw $e;
        }
    }

}
?>