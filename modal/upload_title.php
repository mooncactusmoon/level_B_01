<h3>更新標題區圖片</h3>
<hr>
<form action="api/upload_title.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片 : </td>
            <td><input type="file" name="img"></td>
        </tr>

    </table>
    <!-- 或者 form action="api/upload_title.php?id=</?=$_GET['id'];?>"  -->
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div><input type="submit" value="更新"><input type="reset" value="重製"></div>
</form>