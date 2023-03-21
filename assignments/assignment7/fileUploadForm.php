<?php
require_once "fileUploadProc.php";
if (isset( $_POST["sendPdf"])){
	processFile();
}
else {
	$output = "";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Basic Form</title>
    
  </head>
  <body>
    <main class="container">
      <h1>File Upload</h1>
		<a href="listFilesProc.php">Show File List</a>

      <form action="fileUploadForm.php" method="post" enctype="multipart/form-data">
      	<div class="form-group">
      		<p><label for="fileName">File Name:</label></p>
      		<input type="text" name="fileName" id="fileName">
      	</div>
      	<div class="form-group">
      		<input type="file" name="pdf" id="pdf">
      	</div>
		<div class="form-group">
      		<input type="submit" class="btn btn-primary" name="sendPdf" value="Send PDF" />
      	</div>
		</form>

		<div> <?php echo $output; ?></div>
    </main>
</body>
</html>