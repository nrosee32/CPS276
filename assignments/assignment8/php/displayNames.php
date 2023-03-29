<?php
require_once '../Pdo_methods.php';
$pdo = new PdoMethods();
$sql = "SELECT * FROM names";
$records = $pdo->selectNotBinded($sql);

if($records == 'error'){
    $response = (object)[
        'masterstatus'=>'error',
        'msg'=>"There was an error getting the names"
        ];
}
else {
    if(count($records) != 0){
        $names = array_column($records,'name');
        $namestr = implode('<br>', $names);
        $response = (object)[
            'masterstatus'=>'success',
            'msg'=>"Success",
            'names'=>$namestr
            ];    

    }
    else {
        $response = (object)[
            'masterstatus'=>'error',
            'msg'=>"There was an error getting the names"
            ];    
    }
}

echo(json_encode($response));

?>