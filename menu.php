<?php
include("conection.php");

if($_POST["submit_menu"]!= ""){

  $sql="select * from order inner join orderproduct on order.orderID= orderproduct.orderID inner join product on orderproduct.productID = product.productID 
  where customerID= '".mysqli_real_escape_string($db_connection,$_POST["customerID"])."'";
  if(mysqli_num_rows( mysqli_query($db_connection,$sql))==0){
    $sql="insert into customer set LocationName = '".mysqli_real_escape_string($db_connection,$_POST["LocationName"])."',productName= '".mysqli_real_escape_string($db_connection,$_POST["productName"])."',
    productType = '".mysqli_real_escape_string($db_connection,$_POST["productType"])."',points='".mysqli_real_escape_string($db_connection,$_POST["points"])." ' 
    ,productPrice='".mysqli_real_escape_string($db_connection,$_POST["productPrice"])." '";
     mysqli_query($db_connection,$sql);
     ECHO "SUBMITTEDS";
}
?>
<!DOCTYPE html>
<html>

  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Join now</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/form.css">


</head>

<body class= "menu-page">
  <div class="contact-body-menu">
    <div class="menu">
        <div class="contact-form">
          <br>
          <br>
          <img class="menu-logo" src="images/logo lucifer.png" alt="" onclick="location.href='login.html'">
        </div>

        <form action="" method="post">

          <label class="label-form" for="customerID">Customer</label>
          <input required type="text" id="customerID" placeholder="Customer ID" name="customerID">
          
          <label class="label-form" for="lucifer-locations">choose location</label>
          <select  id="lucifer-locations" name="LocationName">

           <option value="kennedyplein 103">kennedyplein 103</option>
          <option value="Kleine Berg 47">Kleine Berg 47</option>
        </select>

        <label class="label-form" for="product-name">product name</label>
          <input required type="text" id="product-name" placeholder="fill in your product name" name="productName">

          <label class="label-form" for="product type">product type</label>
          <select  id="product-type" name="productType">

           <option value="kennedyplein 103">food</option>
          <option value="Kleine Berg 47">coffee</option>
          <option value="Kleine Berg 47">coffee beans</option>
        </select>

        <label class="label-form" for="points">points</label>
        <input required type="text" id="points" placeholder="enter amount of points" name="points">

        <label class="label-form" for="pruduct-price">product price</label>
        <input required type="text" id="product-price" placeholder="price of pruduct" name="productPrice">
          
          <input class="button-join-2" type="submit" value="submit" name = "submit_menu">
        </form>
    </div>
  </div>

</body>

</html>