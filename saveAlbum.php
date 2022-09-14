<?php

include("functions.php");
session_start();
$result;

if (isset($_POST["saveAlbum"])) {
  $band = $_POST["band"];
  $title = $_POST["title"];
  $tracksAmount = $_POST["tracksAmount"];
  $released = $_POST["released"];

  $sql = "INSERT INTO album (band,title,tracksAmount,released) VALUES(\"{$band}\",'{$title}','{$tracksAmount}','{$released}')";
  saveAlbum($sql);

  $_SESSION["message"] = "Album Saved";
  $_SESSION["message_type"] = "success";
  header("Location:index.php");
}
