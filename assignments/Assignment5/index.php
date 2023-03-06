

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Single Directory</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="public/css/main.css">
  </head>
  <body>
  <?php
    require_once 'directories.php';
    ?>
    <div id="wrapper" class="container">
      <h1>File and Directory Assignment</h1>
      <p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</p>
      
      <?php echo $displayText; ?>

      <form action="index.php" method="POST">

      <div class="form-group">
        <label for="folderName">Folder Name</label>
        <input type="text" class="form-control" name="folderName" id="folderName">
      </div>
      <div class="form-group">
        <label for="comments">File Content</label>
        <textarea name="fileContent" class="form-control" id="fileContent" rows="10" cols="50"></textarea>
      </div>
      <button class="btn btn-primary" type="submit" id="submit">Submit</button>
        
      </form>
      
    </div>

</html>