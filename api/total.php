<?php
include_once "../base.php";

$views=$_POST['total'];
$total=$Total->find(1);
$total['total']=$views;
$Total->save($total);

to("../back.php?do=total");

?>