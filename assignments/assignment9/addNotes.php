<?php 
require_once 'classes/Date_time.php';
$dt = new Date_time();
$notes = $dt->checkSubmit();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Display and Delete Names</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      #msg {
        margin: 10px 0 0 0;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <h1>Add Note</h1>
        
        <a href="displayNotes.php">Display Notes</a>
        <form action="addNotes.php" method="post" enctype="multipart/form-data" id="notesForm" onsubmit="validateForm();">
          <div> <?php echo $notes; ?></div>
          <div class="form-group">
            <p><label for="dateTime">Date and Time:</label></p>
              <input type="datetime-local" class="form-control" id="dateTime" name="dateTime">      	</div>
          <div class="form-group">
            <p><label for="note">Note:</label></p>
            <textarea rows="5" cols="60" name="note" id="note"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="addNote" value="Add Note" />
          </div>
  		</form>

    </div>
  
  </body>
</html>