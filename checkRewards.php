<?php  
include("conection.php");
include("checkPoints.php");
include("checkLogin.php");
?>
<?php
if(isset($_POST['confirm_sandwitch'])){
            $points = 20;
            $customerID=$_SESSION['customerID'];
            $newPoints = $activePoints + $points;
            $update_points = "UPDATE points SET activePoints = '$newPoints' WHERE customerID = '$customerID'";
            $run_query = mysqli_query($db_connection, $update_points);

            header("Location: challenge.php");
}
?>