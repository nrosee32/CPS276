<?php
if (isset($_POST['addName'])){
    $str = $_POST['list'];
    $list = explode("\n", $str);
    $newNameArr = explode(' ', $_POST['aName']);
    $revNameArr = array_reverse($newNameArr);
    $newName = implode(', ', $revNameArr);
    $list[] = $newName;
    if(count($list) > 0){
        sort($list);
        $str = implode("" , $list);
    }
} else if(isset($POST['clearName'])) {
    $str = '';
}
?>