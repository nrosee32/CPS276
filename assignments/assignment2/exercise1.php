<?php

$i = 1;
$j = 1;

$nested_list = "";
for ($i = 1; $i < 5; $i++){
   $nested_list = $nested_list."<ul><li>".$i;
   $nested_list = $nested_list."<ul>";

   for ($j = 1; $j < 6; $j++){
        $nested_list = $nested_list."<li>".$j."</li>";
    }
    $nested_list = $nested_list."</ul></li></ul>";
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><?php echo $nested_list; ?> </p>
</body>
</html>
