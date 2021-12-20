<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $DB->title ?></p>
    <form method="post" target="back" action="?do=tii">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%"><?= $DB->header ?></td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <!-- 撈資料 -->
                <?php
                $rows = $DB->all();
                foreach ($rows as  $row) {

                ?>
                    <!-- 撈資料 end -->
                    <tr>
                        <td width="45%">
                            <img src="./img/<?= $row['img']; ?>" style="width:300px;height:30px;">
                        </td>
                        <td width="23%">
                            <input type="text" name="text" value="<?= $row['text']; ?>">
                        </td>
                        <td width="7%">
                            <input type="radio" name="sh" value="<?= $row['id']; ?>">
                        </td>
                        <!-- 題目要求刪除可多筆資料，故要注意這裡 -->
                        <td width="7%">
                            <input type="checkbox" name="del[]" id="<?= $row['id']; ?>">
                        </td>
                        <!-- name="del[]" end -->
                        <td>
                        <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/update_title.php&#39;)" value="更新圖片">
                        </td>
                    </tr>
                    <!-- 最後一個括號別忘了 -->
                <?php
                }
                ?>

            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/title.php&#39;)" value="<?= $DB->button ?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>