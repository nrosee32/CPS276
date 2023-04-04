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
        <h1>Display Notes</h1>
        
        <a href="addNotes.php">Add Notes</a>
        <form action="displayNotes.php" method="post" enctype="multipart/form-data" id="notesForm" onsubmit="validateForm();">
            <div class="form-group">
                <p><label for="begDate">Beginning Date:</label></p>
                <input type="date" class="form-control" id="begDate" name="begDate">
            </div>
            <div class="form-group">
                <p><label for="endDate">End Date:</label></p>
                <input type="date" class="form-control" id="endDate" name="endDate">
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-primary" name="displayNotes" value="Get Notes" />
            </div>
  		</form>
        <div> <?php echo $notes; ?></div>

    </div>
  
  </body>
</html>