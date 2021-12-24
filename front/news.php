<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
        <?php include "marquee.php"; ?>
    </marquee>
    <div style="height:32px; display:block;"></div>
    <span class="t botli">更多最新消息顯示區</span>
    <!--正中央-->
    
        <?php
         $all=$DB->math('count','*'); //找總共幾筆資料
         // echo $all;
         $div=5;//設定一個分頁要幾個資料
         $pages=ceil($all/$div); //去算該有幾個分頁
         // echo $pages;
         $now=$_GET['p']??1; //當前頁面判斷，沒有就是第一頁
         $start=($now-1)*$div; //從哪個索引值開始
?>
<ol style="list-style-type:decimal;" start="<?=($now-1)*$div+1;?>">
<?php
         $rows = $DB->all(" limit $start,$div");
       
        foreach ($rows as $row) {
            echo "<li class='sswww'>";
            echo mb_substr($row['text'], 0, 20);
            echo "<div class='all' style='display:none'>{$row['text']}</div>";
            echo "</li>";
        }
        ?>
    </ol>
    <!-- 這段style可以不要 很閒再做 -->
    <style> 
        .more_news a{
            text-decoration:none;
        }
        .more_news a:hover{
            text-decoration:underline;
        }
    </style>
    <div class="more_news" style="text-align:center;">
    <div class="cent">
            <?php
            if(($now-1)>0){
                $p=$now-1;
                echo "<a href='?do={$DB->table}&p=$p'> &lt; </a>";
            }else{
                echo "<a href='?do={$DB->table}&p=$now'> &lt; </a>";

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
            }else{
                echo "<a href='?do={$DB->table}&p=$now'> &gt; </a>"; //有連結
                // echo "<a> &gt; </a>"; //沒有連結
            }
            ?>
        </div>
        <!-- <a class="bl" style="font-size:30px;" href="?do=meg&p=0">&lt;&nbsp;</a>
        <a class="bl" style="font-size:30px;" href="?do=meg&p=0">&nbsp;&gt;</a> -->
    </div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
    $(".sswww").hover(
        function() {
            $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
                "top": $(this).offset().top - 50
            })
            $("#alt").show()
        }
    )
    $(".sswww").mouseout(
        function() {
            $("#alt").hide()
        }
    )
</script>