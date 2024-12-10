<?php
include("connection.php");
$id=$_GET['id'];
$query="DELETE FROM employee WHERE id='$id'";
$data=mysqli_query($conn, $query);
if($data){
    echo "<script>
    alert('Record Delete.');
    window.location='../Employee Management System/index.php';
    </script>";
}else{
    echo "Failed";
}
?>