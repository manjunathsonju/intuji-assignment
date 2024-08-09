<!-- Footer -->
<?php
//echo "<h1>" .  . "</h1>";
include "config.php";
$sql_title = "SELECT * FROM settings";
$result_title = mysqli_query($conn, $sql_title) or die("Tile Query Failed");
$row_title = mysqli_fetch_assoc($result_title);
// print_r($row_title);
// die();
$page_title = $row_title['websitename'];
$footertitle = $row_title['footerdesc'];
?>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span><?php echo $footertitle; ?></span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>

</html>