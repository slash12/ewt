<?php 
    require("dbconnect.php");
    error_reporting(0);
    $sname=trim($_POST['sname']);

    if(empty($sname))
    {
        echo "empty";
    }
    else
    {
        $in_share_sql="INSERT INTO tbl_share(share) VALUES ('$sname')";
        $in_share_qry=mysqli_query($dbc, $in_share_sql);
        if($in_share_qry)
        {
            echo "success";
        }
        else
        {
            echo "fail";
        }
    }
    
?>