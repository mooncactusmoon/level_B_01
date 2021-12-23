<h3>編輯次選單</h3>
<hr>
<form action="api/submenu.php?main=<?=$_GET['id'];?>" method="post" enctype="multipart/form-data">
    <table id="sub">
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <tr>
            <td><input type="text" name="name"></td>
            <td><input type="text" name="href"></td>
            <td><input type="checkbox" name="del" value=""></td>
        </tr>
    </table>
    <div>
        <input type="submit" value="修改確定">
        <input type="reset" value="重製">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>

<script>

function more(){
    let row=`<tr>
            <td><input type="text" name="name"></td>
            <td><input type="text" name="href"></td>
            <td></td>
        </tr>`; //上引號放字串可段行，用單引號必須在同一行
    $("#sub").append(row);
/* 原生JS寫法
let table=document.getElementById("sub");
table.innerHTML=table.innerHTML+row;
cosole.log(table+row);*/


}
</script>