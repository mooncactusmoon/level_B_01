<?php
include_once "../base.php";
// var_dump($DB); 物件用var_dump()

?>
    <h3>更新<?=$DB->upload;?></h3>
    <hr>
    <form action="api/upload.php?do=<?=$DB->table;?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><?=$DB->upload;?>: </td>
                <td><input type="file" name="img"></td>
            </tr>
        </table>
        <!-- 或者 form action="api/upload_title.php?id=</?=$_GET['id'];?>"  -->
        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <div><input type="submit" value="更新"><input type="reset" value="重製"></div>
    </form>
