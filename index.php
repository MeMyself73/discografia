<?php include("connectdb.php"); ?>
<?php include("includes/header.php"); ?>


<div class="container p-4">

    <?php if (isset($_SESSION["message"])) { ?>
        <div class="alert alert-<?= $_SESSION["message_type"] ?> alert-dismissible fade show" id="message" role="alert">
            <?= $_SESSION["message"]; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            const myTimeout = setTimeout(clearMessage, 5000);
            function clearMessage() {
                document.getElementById("message").style.display = "none"
            }
        </script>
    <?php session_unset();
    } ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card-card-body">
                <form action="saveTask.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="band" class="form-control" placeholder="Band " autofocus>
                    </div>
                    <div class="form-group">
                        <input name="title" class="form-control" placeholder="Title" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="number" name="tracksAmount" class="form-control" placeholder="Tracks amount" autofocus>
                    </div>
                    <div class="form-group">
                        <input name="released" class="form-control" placeholder="Released" autofocus>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" name="saveTask" value="Save Album" onclick="clearMessage()">Save Album</button>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Band</th>
                        <th>Title</th>
                        <th>Tracks amount</th>
                        <th>Released</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM album";
                    $resultAlbum = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($resultAlbum)) { ?>
                        <tr>
                            <td><?php echo $row["band"]; ?></td>
                            <td><?php echo $row["title"]; ?></td>
                            <td><?php echo $row["tracksAmount"]; ?></td>
                            <td><?php echo $row["released"]; ?></td>
                            <td>
                                <a href="editTask.php?id=<?php echo $row["id"] ?>" class="edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <a href="deleteTask.php?id=<?php echo $row["id"] ?>" class="delete">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include("includes/footer.php"); ?>