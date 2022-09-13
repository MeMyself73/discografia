<?php 

include ("connectdb.php");

if(isset($_POST["saveTask"])){
   $band = $_POST["band"];
   $title = $_POST["title"];
   $tracksAmount = $_POST["tracksAmount"];
   $released = $_POST["released"];
  
   $sql = "INSERT INTO album (band, title,tracksAmount,released) VALUES(\"{$band}\",'{$title}','{$tracksAmount}','{$released}')";
   $result = mysqli_query($conn, $sql);
   mysqli_close($conn);
   if(!$result){
       die("Query failed");
   }

   $_SESSION["message"] = "Task Saved";
   $_SESSION["message_type"] = "success";
  header("Location:index.php");

}
?>