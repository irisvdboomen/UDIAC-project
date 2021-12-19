<?php
session_start();
include ("conection.php");
 $customerID=$_SESSION['customerID'];
    $sql = "SELECT  SUM(`product`.`points`) as loyalty_points
    FROM ((`order` 
    INNER join `orderproduct` on `order`.`orderID` = `orderproduct`.`orderID`
          INNER join `product` on `orderproduct`.`productID` = `product`.`productID`))  
    where `order`.`customerID` = '$_SESSION['customerID']'";
    
  $result=mysqli_query($db_connection, $sql);

 $row = mysqli_fetch_array($result);
 // echo "$row";

?>