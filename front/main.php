<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php include "marquee.php";?>
	</marquee>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	
	<div style="width:100%; padding:2px; height:290px;">
		<div id="mwww" loop="true" style="width:100%; height:100%;">
			<div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
		</div>
	</div>
	<script>
		var lin = new Array(); //JS一定要先宣告陣列
		
		<?php
		// 撈出所有要顯示的動畫圖片並放入JS陣列中
		$mvs=$Mvim->all(['sh'=>1]);
		foreach($mvs as $mv){
		?>
			lin.push('<?="img/{$mv['img']}";?>') //push資料進去lin陣列
		<?php
		}

		?>
		var now = 0;
		ww() //先執行一次
		if (lin.length > 1) {
			setInterval("ww()", 3000); //3000為毫秒 = 3秒
			now = 1;
		}
		
		function ww() {
			$("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
			//$("#mwww").attr("src",lin[now])
			now++;
			if (now >= lin.length)
				now = 0;
		}
		
	</script>
	<div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
		<span class="t botli">最新消息區
			<?php
			if($News->math('count','*',['sh'=>1])>5){ //判斷是否超過五筆
				echo "<a href='?do=news'style='float:right'>More...</a>";
			}
			?>
		</span>
		<ul class="ssaa" style="list-style-type:decimal;">
		<?php
		$news=$News->all(['sh'=>1]," LIMIT 5");
		foreach($news as $n){
			echo "<li>";
			echo mb_substr($n['text'],0,20);
			echo "<div class='all' style='display:none'>{$n['text']}</div>";
			echo "</li>";
		}
		?>
		</ul>
		<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
		<script>
			$(".ssaa li").hover(
				function() {
					$("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
					$("#altt").show()
				}
			)
			$(".ssaa li").mouseout(
				function() {
					$("#altt").hide()
				}
			)
		</script>
	</div>
</div>