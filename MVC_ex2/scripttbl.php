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

    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=ewt", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_create_contact = "CREATE TABLE `contacts` ( `id` int(11) NOT NULL AUTO_INCREMENT, `name` varchar(128) NOT NULL, `phone` varchar(64) DEFAULT NULL, `email` varchar(255) DEFAULT NULL, `address` varchar(255) DEFAULT NULL, PRIMARY KEY (`id`) )";        
        // use exec() because no results are returned
        $conn->exec($sql_create_contact);
        echo "<script>alert('Table contact created successfully')</script>";
    }
    catch(PDOException $e)
    {
        echo $sql_create_contact . "<br>" . $e->getMessage();
    }
    $conn = null;
?>