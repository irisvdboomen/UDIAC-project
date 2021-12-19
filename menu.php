<?php
include("conection.php");

if(isset($_POST["submit_menu"])){
  $customerID=mysqli_real_escape_string($db_connection,$_POST["customerID"]);
  $check_customer = "SELECT * FROM customer WHERE customerID = '$customerID'";
  $res = mysqli_query($db_connection, $check_customer);
  $locationName = mysqli_real_escape_string($db_connection,$_POST["LocationName"]);
  $productName = mysqli_real_escape_string($db_connection,$_POST["productName"]);
  $productType = mysqli_real_escape_string($db_connection,$_POST["productType"]);
  $points = mysqli_real_escape_string($db_connection,$_POST["points"]);
  $productPrice = mysqli_real_escape_string($db_connection,$_POST["productPrice"]);
  if(mysqli_num_rows($res) > 0) {
    $sql= "insert into `order` (locationName,customerID ) values ('$locationName','$customerID');";
    $sql.="insert into `product` (productName,productType, points,price) values ('$productName','$productType','$points','$productPrice');";
    $result = mysqli_multi_query($db_connection, $sql);
    var_dump($sql);
echo "customer is correct";
  }else{
    echo "the customer needs to create an acount";
  }
}
?>
<!DOCTYPE html>
<html>

  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>join now</title>
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
          <select  id="lucifer-locations"  name="LocationName">

           <option value="kennedyplein 103">kennedyplein</option>
          <option value="Kleine Berg 47">Little Mountai</option>
        </select>

        <label class="label-form" for="product-name">pruduct name</label>
          <input required type="text" id="product-name" placeholder="fill in your product name" name="productName">

          <label class="label-form" for="product type">product type</label>
          <select  id="product-type"  name="productType">

           <option value="Beverages">Beverages</option>
          <option value="food">food</option>
          <option value="Products">Products</option>
        </select>

        <label class="label-form" for="points">points</label>
        <input required type="text" id="points" placeholder="enter amount of points" name="points">

        <label class="label-form" for="pruduct-price">product price</label>
        <input required type="text" id="product-price" placeholder="price of pruduct" name="productPrice">
          
          <input class="button-join-2" type="submit" value="submit" name = "submit_menu">
        </form>
        <p>
            <button onclick="readTag()">Test NFC Read</button>
            <button onclick="writeTag()">Test NFC Write</button>
          </p>
          <pre id="log"></pre>
          
    </div>
  </div>







</body>
<script>  
async function readTag() {
  alert("reading")
  if ("NDEFReader" in window) {
    const ndef = new NDEFReader();
    try {
      await ndef.scan();
      ndef.onreading = event => {
        const decoder = new TextDecoder();
        for (const record of event.message.records) {
          document.querySelector("#customerID").value=decoder.decode(record.data);
          consoleLog("Record type:  " + record.recordType);
          consoleLog("MIME type:    " + record.mediaType);
          consoleLog("=== data ===\n" + decoder.decode(record.data));
        }
      }
    } catch(error) {
      consoleLog(error);
    }
  } else {
    consoleLog("Web NFC is not supported.");
  }
}

async function writeTag() {
  if ("NDEFReader" in window) {
    const ndef = new NDEFReader();
    try {
      await ndef.write("What Web Can Do Today");
      consoleLog("NDEF message written!");
    } catch(error) {
      consoleLog(error);
    }
  } else {
    consoleLog("Web NFC is not supported.");
  }
}

function consoleLog(data) {
  var logElement = document.getElementById('log');
  logElement.innerHTML += data + '\n';
}
</script>
</html>