<?php 
    require("dbconnect.php");
    error_reporting(0);
    
    $portfolio_id = $_POST['portfolio_id'];    

    $del_portfolio_sql="DELETE FROM `tbl_portfolio` WHERE portfolio_id='$portfolio_id'";
    $del_portfolio_qry=mysqli_query($dbc, $del_portfolio_sql);
    if($del_portfolio_qry)
    {
        echo "success";
    }
    else
    {
        echo "fail";
    }
?>