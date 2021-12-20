<?php
include "../base.php";
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}else{
    if($DB->table!='admin' && $DB->table!='menu'){
        $data['img']='';
    }
}

switch($DB->table){
    case "title":
        $data['text']=$_POST['text'];
        $data['sh']=0;
    break;
    case "admin":
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
    break;
    case "menu":
        $data['name']=$_POST['name'];
        $data['href']=$_POST['href'];
        $data['sh']=1;
        $data['parent']=0;

    break;
    default:
        $data['text']=$_POST['text']??''; //檢查是否存在
        $data['sh']=1;
    break;
}
// dd($_POST);
// dd($_FILES);
$DB->save($data);

to("../back.php?do=".$DB->table);
?>