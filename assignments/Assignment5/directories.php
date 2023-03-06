<?php
  $displayText = "";

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    $newDir = $_POST["folderName"];
    $newDirFolder = "/home/n/k/nkesten/public_html/cps276/assignments/Assignment5/directories/".$newDir;
    $newDirPath = "https://russet-v8.wccnet.edu/~nkesten/cps276/assignments/Assignment5/directories/".$newDir."/readme.txt";
    $alreadyExists = is_dir($newDirFolder);

    if($alreadyExists){
      $displayText = "<label>A directory already exists with that name.</label>";
    }else{
      mkdir($newDirFolder, 0777, true);
      $fileContent = $_POST["fileContent"];
      $newReadMe = $newDirFolder."/readme.txt";
      file_put_contents($newReadMe,$fileContent);
      $displayText = "File and Directory were created</label>";
      $displayText = $displayText."<p><a href='$newDirPath'>Path to file </a></p>";
    }

  }

?>