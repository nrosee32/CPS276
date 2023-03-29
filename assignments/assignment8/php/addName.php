<?php
require_once '../Pdo_methods.php';
$userInput = json_decode($_POST['data']);
$userInputName = $userInput->name;
$nameOrder = explode(' ',$userInputName);
$response = (object) [
    'masterstatus'=>'success',
    'msg'=>'Name added successfully'
];

if(sizeof($nameOrder)!=2){
    $response = (object) [
        'masterstatus'=>'error',
        'msg'=>'There was an error entering the name'
    ];
} else {
    $nameOrder= array_reverse($nameOrder);
    $newName = implode(', ', $nameOrder);

    $pdo = new PdoMethods();

    $sql = "INSERT INTO names (name) VALUES (:flname)";
    $bindings = [
        [':flname',$newName,'str']
    ];

    $result = $pdo->otherBinded($sql, $bindings);
    if($result === 'error'){
        $response = (object)[
        'masterstatus'=>'error',
        'msg'=>"There was an error entering the name"
        ];
    } else {
        $response = (object)[
        'masterstatus'=>'success',
        'msg'=>"Name has been added"
        ];
    }
}

echo(json_encode($response));

?>