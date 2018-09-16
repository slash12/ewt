<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    // // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple</title>
</head>
<body>
<?php 
    if(isset($_POST['btnadd']))
    {
        $name = $_POST['txtname'];
        $address = $_POST['txtaddress'];

        try 
        {
            $conn = new PDO("mysql:host=$servername;dbname=ewt_pdo", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tbl_user (name, address)
            VALUES ('$name', '$address')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "<script>alert('New record created successfully')</script>";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    if(isset($_POST['btnlist']))
    {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Id</th><th>Name</th><th>Address</th></tr>";
        class TableRows extends RecursiveIteratorIterator 
        {
            function __construct($it) 
            {
                parent::__construct($it, self::LEAVES_ONLY);
            }
            function current() 
            {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
            }
            function beginChildren() 
            {
                echo "<tr>";
            }
            function endChildren() 
            {
                echo "</tr>" . "\n";
            }
        }
        try 
        {
            $conn = new PDO("mysql:host=$servername;dbname=ewt_pdo", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id, name, address FROM tbl_user");
            $stmt->execute();
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) 
            {
            echo $v;
            }
        }
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
    }
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="txtname">Name</label>
        <input type="text" name="txtname" id="txtname">
        <label for="txtaddress">Address</label>
        <input type="text" name="txtaddress" id="txtaddress">
        <input type="submit" value="Add" name="btnadd" id="btnadd">
        <input type="submit" value="List" name="btnlist" id="btnlist">
    </form>
</body>
</html>