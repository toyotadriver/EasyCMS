<div id="container">
			
			<section>
				
				<? include_once 'layout/articles.php' ?>
				<!-- <article id="dem">
					<figure class='figure_article'>
						<img id="dempic" src="imgs/0AIO0z2G_qo.jpg">
					</figure>
					<figcaption>
						<font class="demfont" style="font-size:30px">Верхний текст</font>
						<br>
						<font class="demfont">Нижний текст</font>
					</figcaption>
				</article> -->
				
				<!-- <article class="article_prost">
					<p class='article_text'>жопа жопа жопа</p>
				</atrticle> -->
				<!-- <nav id='menu_pages'>
	
				</nav> -->
			</section>

			<aside id="soside">
				<?php
				$scrdir = "just_scripts/";
				$od = opendir($scrdir);
				$sd = scandir($scrdir);
				unset($sd[0]);
				unset($sd[1]);
				foreach($sd as $item)
				{
					$item_upper = strtoupper($item);
					$item_cut = substr($item, 0, -4);
					echo <<<_sc_result
						<a href="php/_phpsidescripts.php?p=$item_cut">$item_upper</a><br>
						_sc_result;
				}	
				?>
			</aside>
		</div>

	