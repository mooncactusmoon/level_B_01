<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $DB->title ?></p>
    <form method="post" action="api/edit.php?do=<?=$DB->table;?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                   
                    <td width="80%"><?=$DB->header;?></td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
              
                </tr>
                <!-- 撈資料  多筆資料的話 name要用陣列-->
                <?php
                    $all=$DB->math('count','*'); //找總共幾筆資料
                    // echo $all;
                    $div=3;//設定一個分頁要幾個資料
                    $pages=ceil($all/$div); //去算該有幾個分頁
                    // echo $pages;
                    $now=$_GET['p']??1; //當前頁面判斷，沒有就是第一頁
                    $start=($now-1)*$div; //從哪個索引值開始
    
                    $rows = $DB->all(" limit $start,$div");

                
                foreach ($rows as  $row) {
                    $checked=($row['sh']==1)?'checked':'';

                ?>
                    
                    <tr>
               
                        <td width="80%">
                            <textarea name="text[]" id="" style="width:95%;height:60px"><?=$row['text'];?></textarea>
                           
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?=$checked;?> >
                        </td>
                        
                        <td width="10%">
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
               
                    </tr>
                <?php
                    // 最後一個括號別忘了
                }
                ?>
                <!-- 撈資料 end -->
            </tbody>
        </table>
     <!-- 分頁寫法 -->
     <div class="cent">
            <?php
            if(($now-1)>0){
                $p=$now-1;
                echo "<a href='?do={$DB->table}&p=$p'> &lt; </a>";
            }

            for($i=1;$i<=$pages;$i++){
                if($i==$now){ //判斷頁碼是否當前頁面
                    $fontsize="24px";
                }else{
                    $fontsize="16px";
                }
                // echo "<a href='?do=image&p=$i'>$i&nbsp;&nbsp;</a>";
                echo "<a href='?do={$DB->table}&p=$i' style='font-size:$fontsize'>&nbsp;$i&nbsp;</a>";
            }

            if(($now+1)<=$pages){
                $p=$now+1;
                echo "<a href='?do={$DB->table}&p=$p'> &gt; </a>";
            }
            ?>
        </div>
        <!-- 分頁寫法 end-->
   
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                    <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$DB->table;?>.php?table=<?=$DB->table;?>&#39;)" 
                              value="<?=$DB->button;?>">
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>