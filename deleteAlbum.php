<?php

include("connectdb.php");
session_start();

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM album WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Album Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>