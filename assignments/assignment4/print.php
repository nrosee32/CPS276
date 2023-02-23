<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"crossorigin="anonymous">
    <title>Names</title>

<body>
    <?php
    require_once 'AddNameProc.php';
    ?>
<html>
<p><h1>Add Names</h1></p>
<form method='POST'>
    <div class="d-grid gap-2 d-md-block">
         <input type="submit" name="addName" class="btn btn-primary" value="Add Name"></button>
         <input type="submit" name="clearName" class="btn btn-primary" value="Clear Names"></button>
    </div>
    <br>
    <label for="enterName">Enter Name</label>
        <input type="text" name="aName" class="form-control" name="aName" id="aName" >
      </div>
    <br>
    <label for="list">List of Names</label><br>
    <textarea readonly name="list" class="form-control" id="list" rows="15" cols="50">
            <?php
            if(isset($newName)) {
                echo $str;
            } else {
                echo "";

            }
            ?>
        </textarea>
</form>
</html>