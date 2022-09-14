<?php

function saveAlbum($sql){
    try {
        include("connectdb.php");
        mysqli_query($conn,$sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function updateAlbum($sql){
    try {
        include("connectdb.php");
        mysqli_query($conn,$sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function deleteAlbum($sql){
    try {
        include("connectdb.php");
        mysqli_query($conn,$sql);
        mysqli_close($conn);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function selectAlbum($sql){
    try {
        include("connectdb.php");
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            mysqli_close($conn);
            return $data;
        }
        return false;

    } catch (\Throwable $th) {
        return false;
    }
}


?>