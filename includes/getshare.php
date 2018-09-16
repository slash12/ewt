<?php 
    require("dbconnect.php");
    error_reporting(0);
    
    $get_share_sql="SELECT * FROM tbl_share";
    $get_share_qry=mysqli_query($dbc, $get_share_sql);
    if($get_share_qry)
    {
        $arr_share = array();
        while($row = mysqli_fetch_array($get_share_qry, MYSQLI_ASSOC))
        {
            $share = new stdClass();
            $share->share_id[] = $row['share_id'];
            $share->share[] = $row['share'];
            $arr_share[] = $share;
        }
        echo json_encode($arr_share);
    }
    else
    {
        echo "fail";
    }
    
   
    
?>