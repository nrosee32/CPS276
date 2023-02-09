<?php

$i = 1;
$i = 1;

$table = "<table border='1'";

while ($i <  16){
    $table .="<tr>";
    $j = 1;
    while ($j < 6){
        $table .="<td>row $i cell $j</td>";
        $j++;
    }
    $i++;
    $table .= "</tr>";
}
$table .= "</table>";
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
    <p><?php echo $table; ?> </p>
    
</body>
</html>
