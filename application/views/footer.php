</div>
<!-- END OF BODY CONTAINER -->

<!-- Footer -->

<!-- Footer -->
<footer class="footer">

	<div class="sub-footer">
		<?php
			$this->load->config('nav_menu');
			$sub_footer_items = $this->config->item('sub_footer');
			foreach($sub_footer_items as $sub_footer_item)
			{
				?>
				<div class="sub-footer-col">
					<h4><?=$sub_footer_item['text']?></h4>
					<ul class="sub-footer-list">
						<?php
							foreach ($sub_footer_item['sub_menus'] as $sub_menu)
							{
								?>
								<li><a href="<?=site_url($sub_menu['url'])?>"><?=$sub_menu['text']?></a></li>
								<?php
							}
						?>
					</ul>
				</div>
				<?php
			}
			$sub_footer_right_items = $this->config->item('sub_footer_right');
			foreach($sub_footer_right_items as $sub_footer_right_item)
			{
				?>
				<div class="sub-footer-col-right">
					<h4><?=$sub_footer_right_item['text']?></h4>
					<ul class="sub-footer-list">
						<?php
							foreach ($sub_footer_right_item['sub_menus'] as $sub_menu)
							{
								?>
								<li>
									<a href="<?=$sub_menu['url']?>" target="_blank">
										<span class="cb-icon cb-icon-sm cb-icon-p-sm cb-icon-<?=$sub_menu['icon']?> cb-vertical-center"></span>
										<?=$sub_menu['text']?>
									</a>
								</li>
								<?php
							}
						?>
					</ul>
				</div>
				<?php
			}
		?>
	</div>
	
	<div class="main-footer">
		<div class="footer-logo">
			<img src="<?=site_url('img/Logo-footer.png')?>" alt="Logo" class="logo-footer" />
			<div class="footer-text">
				Copyright of PT.SAMP &copy; 2018<br/>
				All rights reserved
			</div>
		</div>
	</div>
	<!--<div class="container text-center">
		<span class="text-muted">Copyright &copy; <?=COMPANY_NAME?> 2017</span>
	</div>-->
	<!-- /.container -->
</footer>

</body>
</html>