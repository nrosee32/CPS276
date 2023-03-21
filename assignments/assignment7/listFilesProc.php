<?php
require_once "dataProc.php";
$myProcessor = new DataProc();
$list = $myProcessor->getNames('list');
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
      <h1>List Files</h1>
		<a href="fileUploadForm.php">Add File</a>

		<div> <?php echo $list; ?></div>
    </main>
</body>
</html>