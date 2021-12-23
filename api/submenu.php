<?php include_once "../base.php";
dd($_POST);
dd($_GET);
//已經有的 (有ID)
if(isset($_POST['id'])){
    foreach($_POST['id'] as $key => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $sub=$Menu->find($id);
            $sub['name']=$_POST['name'][$key];
            $sub['href']=$_POST['href'][$key];
            $Menu->save($sub);
        }
    }
}

//新增的 (未有ID)
if(isset($_POST['name2'])){
    foreach($_POST['name2'] as $key => $name){
        if($name!=''){
            $Menu->save(['name'=>$name,
            'href'=>$_POST['href2'][$key],
            'sh'=>1,
            'parent'=>$_GET['main']]);
        }
    }
}

to("../back.php?do=".$Menu->table);
?>