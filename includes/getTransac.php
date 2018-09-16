<?php 
    require 'dbconnect.php';


  $sql_get = "SELECT * FROM tbl_transaction";


  $result_qry = mysqli_query($dbc,$sql_get);

  if($result_qry)
  {
    $transaction = new stdClass();
      while($row = mysqli_fetch_array($result_qry, MYSQLI_ASSOC))
      {
        $transaction->name[] = $row['tname'];
        $transaction->price[] = $row['price'];
        $transaction->date_created[] = $row['created_at'];
      }
      echo json_encode($transaction);
  }
  else
  {
    echo "error: ".mysqli_error($conn);
  }
  
?>