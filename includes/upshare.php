<?php 
    require("dbconnect.php");
    error_reporting(0);
    
    $share = $_POST['share'];
    $share_id = $_POST['share_id'];    

    $up_share_sql="UPDATE `tbl_share` SET `share`='$share' WHERE share_id='$share_id'";
    $up_share_qry=mysqli_query($dbc, $up_share_sql);
    if($up_share_qry)
    {
        echo "success";
    }
    else
    {
        echo "fail";
    }
?>