<?php
include("connectdb.php");

if (isset($_POST['search'])) {
    $keywords = $_POST['keywords'];

   

    $sql = "SELECT band, title,tracksAmount,released FROM album WHERE (band LIKE '%" . $keywords . "%' OR title LIKE '%" . $keywords . "%' OR tracksAmount LIKE '%" . $keywords ."%' OR released LIKE '%" .$keywords."%')";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <td><?php echo $row["band"]; ?></td>
                            <td><?php echo $row["title"]; ?></td>
                            <td><?php echo $row["tracksAmount"]; ?></td>
                            <td><?php echo $row["released"]; ?></td>
                            <td>
                                <a href="editAlbum.php?id=<?php echo $row["id"] ?>" class="edit"><i class="fa-solid fa-pencil"></i></a>
                                <a href="deleteAlbum.php?id=<?php echo $row["id"] ?>" class="delete"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
        <?php } ?>
    <?php }  else {
        echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
    }
}
?>