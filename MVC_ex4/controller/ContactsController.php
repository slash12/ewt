<?php
require_once 'model/contactsService.php';
class ContactsController 
{

    private $contactsService = NULL;

    public function __construct() 
    {
        $this->contactsService = new ContactsService();
    }

    public function redirect($location) 
    {
        header('Location: '.$location);
    }

    public function handleRequest() 
    {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try 
        {
            if ( !$op || $op == 'list' ) 
            {
                $this->listContacts();
            } 
            elseif ( $op == 'new' ) 
            {
                $this->saveContact();
            } 
            elseif ( $op == 'delete' ) 
            {
                $this->deleteContact();
            } 
            elseif ( $op == 'show' ) 
            {
                $this->showContact();
            } 
            else 
            {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } 
        catch ( Exception $e ) 
        {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function handlePro() 
    {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try 
        {
            if ( !$op || $op == 'list' ) 
            {
                $this->listProducts();
            } 
            elseif ( $op == 'new' ) 
            {
                $this->saveProduct();
            } 
            elseif ( $op == 'delete' ) 
            {
                $this->deleteProduct();
            } 
            elseif ( $op == 'show' ) 
            {
                $this->showProduct();
            } 
            else 
            {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } 
        catch ( Exception $e ) 
        {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function listContacts() 
    {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $contacts = $this->contactsService->getAllContacts($orderby);
        include 'view/contacts.php';
    }

    public function listProducts() 
    {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $products = $this->contactsService->getAllProducts($orderby);
        include 'view/products.php';
    }

    public function saveContact() 
    {
        $title = 'Add new contact';

        $name = '';
        $phone = '';
        $email = '';
        $address = '';

        $errors = array();

        if ( isset($_POST['form-submitted']) ) 
        {
            $name = isset($_POST['name']) ? $_POST['name'] :NULL;
            $phone = isset($_POST['phone'])? $_POST['phone'] :NULL;
            $email = isset($_POST['email'])? $_POST['email'] :NULL;
            $address = isset($_POST['address'])? $_POST['address']:NULL;

            try 
            {
                $this->contactsService->createNewContact($name, $phone, $email, $address);
                $this->redirect('index.php');
                return;
            } 
            catch (ValidationException $e) 
            {
                $errors = $e->getErrors();
            }
        }

        include 'view/contact-form.php';
    }
    public function saveProduct() 
    {
        $title = 'Add new product';

        $name = '';
        $quantity = '';
        $price = '';        

        $errors = array();

        if ( isset($_POST['proform-submitted']) ) 
        {
            $name = isset($_POST['name']) ? $_POST['name'] :NULL;
            $quantity = isset($_POST['quantity'])? $_POST['quantity'] :NULL;
            $price = isset($_POST['price'])? $_POST['price'] :NULL;            

            try 
            {
                $this->contactsService->createNewProduct($name, $quantity, $price);
                $this->redirect('proindex.php');
                return;
            } 
            catch (ValidationException $e) 
            {
                $errors = $e->getErrors();
            }
        }

        include 'view/product-form.php';
    }

    public function deleteContact() 
    {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) 
        {
            throw new Exception('Internal error.');
        }

        $this->contactsService->deleteContact($id);
        $this->redirect('index.php');
    }

    public function deleteProduct() 
    {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) 
        {
            throw new Exception('Internal error.');
        }

        $this->contactsService->deleteProduct($id);
        $this->redirect('proindex.php');
    }

    public function showContact() 
    {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) 
        {
            throw new Exception('Internal error.');
        }
        $contact = $this->contactsService->getContact($id);
        include 'view/contact.php';
    }

    public function showProduct() 
    {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) 
        {
            throw new Exception('Internal error.');
        }
        $product = $this->contactsService->getProduct($id);
        include 'view/product.php';
    }

    public function showError($title, $message) 
    {
        include 'view/error.php';
    }
}
?>