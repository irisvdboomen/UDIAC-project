<?php
include ("conection.php");
    $sql = "SELECT  SUM(`product`.`points`) as loyalty_points
    FROM ((`order` 
    INNER join `orderproduct` on `order`.`orderID` = `orderproduct`.`orderID`
          INNER join `product` on `orderproduct`.`productID` = `product`.`productID`  ))
    where `order`.`customerID` = '$_SESSION['customerID']'";
    
    $run_Sql = mysqli_query($db_connection, $sql);
    echo "$run_Sql";

?>