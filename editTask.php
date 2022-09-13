<?php
include("connectdb.php");
$band = "";
$title = "";
$tracksAmount = "";
$released = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM album WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $band = $row["band"];
        $title = $row["title"];
        $tracksAmount = $row["tracksAmount"];
        $released = $row["released"];
    }
}
if (isset($_POST["update"])) {
    $id = $_GET["id"];
    $band = $_POST["band"];
    $title = $_POST["title"];
    $tracksAmount = $_POST["tracksAmount"];
    $released = $_POST["released"];

    $sql = "UPDATE album SET band = '$band', title = '$title', tracksAmount = '$tracksAmount', released = '$released' WHERE id = $id";
    mysqli_query($conn, $sql);
    $_SESSION["message"] = "Task updated successfully";
    $_SESSION["message_type"] = "warning";
    header("location:index.php");
}
?>
<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editTask.php?id=<?php echo $_GET["id"]?>" method="POST">
                    <div class="form-group">
                        <input name="band" type="text" class="form-control" value="<?php echo $band; ?>" placeholder="Update Band">
                    </div>
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <input name="tracksAmount" type="number" class="form-control" value="<?php echo $tracksAmount; ?>" placeholder="Update Track Amount">
                    </div>
                    <div class="form-group">
                        <input name="released" type="number" class="form-control" value="<?php echo $released; ?>" placeholder="Update Released">
                    </div>
                    <button class="btn-success" name="update">Update</button>  
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>