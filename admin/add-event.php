<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Event</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="save-event.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="event_title">Title</label>
                        <input type="text" name="event_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="eventdesc" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Event image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Event Date</label>
                        <input type="date" name="event_date" class="form-control">
                    </div>
                    <div class="form-group time">
                        <label>Time</label>
                        <input type="time" name="time_from" class="form-control">
                        <span>TO</span>
                        <input type="time" name="time_to" class="form-control">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>