<?php 
/**
    * The about page view
*/
class ContactView
{
    private $modelObj;
    private $controller;
    function __construct($controller, $model)
    {
        $this->controller = $controller;
        $this->modelObj = $model;
        // print "Contact - ";
    }

    public function sum_view()
    {
        return $this->modelObj->sum($num1, $num2);
    }
 }
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    @$num1 = $_POST["txtnum1"];
    @$num2 = $_POST["txtnum2"];
    header("Location:http://localhost:8001/ewt/MVC_ex/contact/sum_view(".@$num1.", ".@$num2.")");
 }
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sum</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <input type="text" name="txtnum1" id="txtnum1" placeholder="Enter a number">
        <br>
        <input type="text" name="txtnum2" id="txtnum2" placeholder="Enter a number">
        <br>
        <input type="submit" value="Add" name="btnadd" id="btnadd">
    </form>
</body>
</html>