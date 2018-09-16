<?php 
    require("dbconnect.php");
    error_reporting(0);
    
    $share_id = $_POST['share_id'];    

    $del_share_sql="DELETE FROM `tbl_share` WHERE share_id='$share_id'";
    $del_share_qry=mysqli_query($dbc, $del_share_sql);
    if($del_share_qry)
    {
        echo "success";
    }
    else
    {
        echo "fail";
    }
?>