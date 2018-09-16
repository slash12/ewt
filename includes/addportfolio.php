<?php 
    require("dbconnect.php");
    error_reporting(0);
    $pname=trim($_POST['pname']);

    if(empty($pname))
    {
        echo "empty";
    }
    else
    {
        $in_portfolio_sql="INSERT INTO tbl_portfolio(portfolio) VALUES ('$pname')";
        $in_portfolio_qry=mysqli_query($dbc, $in_portfolio_sql);
        if($in_portfolio_qry)
        {
            echo "success";
        }
        else
        {
            echo "fail";
        }
    }
?>