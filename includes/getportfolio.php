<?php 
    require("dbconnect.php");
    error_reporting(0);
    
    $get_portfolio_sql="SELECT * FROM tbl_portfolio";
    $get_portfolio_qry=mysqli_query($dbc, $get_portfolio_sql);
    if($get_portfolio_qry)
    {
        $arr_portfolio = array();
        while($row = mysqli_fetch_array($get_portfolio_qry, MYSQLI_ASSOC))
        {
            $portfolio = new stdClass();
            $portfolio->portfolio_id[] = $row['portfolio_id'];
            $portfolio->portfolio[] = $row['portfolio'];
            $arr_portfolio[] = $portfolio;
        }
        echo json_encode($arr_portfolio);
    }
    else
    {
        echo "fail";
    }
    
   
    
?>