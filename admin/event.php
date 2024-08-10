<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="admin-heading">All Events</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-event.php">add event</a>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="google_calendar_event_sync.php?logout=true">disconnect event</a>
            </div>
            <?php $status = $statusMsg = '';
            if (!empty($_SESSION['status_response'])) {
                $status_response = $_SESSION['status_response'];
                $status = $status_response['status'];
                $statusMsg = $status_response['status_msg'];
            }
            ?>

            <!-- Status message -->
            <?php if (!empty($statusMsg)) { ?>
                <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
            <?php } ?>
            <div class="col-md-12">
                <?php
                include "config.php"; // database configuration
                /* Calculate Offset Code */
                $limit = 3;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;

                if ($_SESSION["user_role"] == '1') {
                    /* select query of event table for admin user */
                    $sql = "SELECT event.event_id, event.title, event.description,event.event_date,user.username FROM event
                    
                    LEFT JOIN user ON event.author = user.user_id
                    ORDER BY event.event_id DESC LIMIT {$offset},{$limit}";
                } elseif ($_SESSION["user_role"] == '0') {
                    /* select query of event table for normal user */
                    $sql = "SELECT event.event_id, event.title, event.description,event.event_date,user.username FROM event
                    
                    LEFT JOIN user ON event.author = user.user_id
                    WHERE event.author = {$_SESSION['user_id']}
                    ORDER BY event.event_id DESC LIMIT {$offset},{$limit}";
                }

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Title</th>

                            <th>Date</th>
                            <th>Author</th>

                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $serial = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td class='id'><?php echo $serial; ?></td>
                                    <td><?php echo $row['title']; ?></td>

                                    <td><?php echo $row['event_date']; ?></td>
                                    <td><?php echo $row['username']; ?></td>

                                    <td class='delete'><a href='delete-event.php?id=<?php echo $row['event_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php
                                $serial++;
                            } ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo "<h3>No Results Found.</h3>";
                }
                // show pagination
                if ($_SESSION["user_role"] == '1') {
                    /* select query of event table for admin user */
                    $sql1 = "SELECT * FROM event";
                } elseif ($_SESSION["user_role"] == '0') {
                    /* select query of event table for normal user */
                    $sql1 = "SELECT * FROM event
                  WHERE author = {$_SESSION['user_id']}";
                }
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if (mysqli_num_rows($result1) > 0) {

                    $total_records = mysqli_num_rows($result1);

                    $total_page = ceil($total_records / $limit);

                    echo '<ul class="pagination admin-pagination">';
                    if ($page > 1) {
                        echo '<li><a href="event.php?page=' . ($page - 1) . '">Prev</a></li>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="' . $active . '"><a href="event.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                    if ($total_page > $page) {
                        echo '<li><a href="event.php?page=' . ($page + 1) . '">Next</a></li>';
                    }

                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>