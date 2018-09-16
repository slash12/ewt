<?php 
    require("dbconnect.php");
    error_reporting(0);
    
    $portfolio = $_POST['portfolio'];
    $portfolio_id = $_POST['portfolio_id'];    

    $up_portfolio_sql="UPDATE `tbl_portfolio` SET `portfolio`='$portfolio' WHERE portfolio_id='$portfolio_id'";
    $up_portfolio_qry=mysqli_query($dbc, $up_portfolio_sql);
    if($up_portfolio_qry)
    {
        echo "success";
    }
    else
    {
        echo "fail";
    }
?>