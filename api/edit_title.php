<?php
include_once "../base.php";

// dd($_POST);

// if(isset($_POST['id'])){
// }   防止空資料讓這api壞掉的防呆if

foreach($_POST['id'] as $key => $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        //刪除
        $Title->del($id);

    }else{
        //更新
        $data['id']=$id;
        $data['text']=$_POST['text'][$key];
        // if($_POST['sh']==$id){
        //     $data['sh']=1;
        // }else{
        //     $data['sh']=0;
        // } 可簡化成下面($data['sh'])
        $data['sh']=($_POST['sh']==$id)?1:0;
        $Title->save($data);
    }
}

to("../back.php?do=".$Title->table);

?>