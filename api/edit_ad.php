<?php
include_once "../base.php";

// dd($_POST);

// if(isset($_POST['id'])){
// }   防止空資料讓這api壞掉的防呆if

foreach($_POST['id'] as $key => $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        //刪除
        $Ad->del($id);

    }else{
        //更新
        $data['id']=$id;
        $data['text']=$_POST['text'][$key];

        $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $Ad->save($data);
    }
}

to("../back.php?do=".$Ad->table);

?>