<?php
include_once "../base.php";
/* 四行可縮成下面一行
$views=$_POST['total'];
$total=$Total->find(1);
$total['total']=$views;
$Total->save($total); */

$Total->save(['id'=>1,'total'=>$_POST['total']]); 

to("../back.php?do=total");

?>