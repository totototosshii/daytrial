<!-- footer-menu -->
	<div id="footer-menu">
		<div class="inner">
			<div class="footer-logo"><a href="/">TF-30</a></div><!-- /footer-logo -->
			<div class="footer-sub">WordPress自作テーマ学習用デモサイト。</div><!-- /footer-sub -->

			<nav class="footer-nav">
				<!-- フッター用メニューを動的に表示する -->
				<?php wp_nav_menu(
					array(
						'menu-class'     => 'footer-list',
						'container'      => 'false',
						'container_class' => 'footer-nav',
						'depth'          => 1,
						'theme_location'  => 'global'
					)
				);
				?>
			</nav>

		</div><!-- /inner -->
	</div><!-- /footer-menu -->



	<!-- footer -->
	<footer id="footer">
		<div class="inner">
			<div class="copy">&copy; daily-trial WordPress theme All rights reserved.</div><!-- /copy -->
			<div class="by">Presented by <a href="https://tokyofreelance.jp/" rel="noopener" target="_blank">東京フリーランス</a>
			</div><!-- /by -->

		</div><!-- /inner -->
	</footer><!-- /footer -->

	<!-- シングルページのとき -->
	<?php if(is_single()): ?>
		<!-- footer-sns -->
		<?php get_template_part( 'template-parts/footer-sns' ); ?>
	<?php endif; ?>

	<div class="floating">
		<a href="#"><i class="fas fa-chevron-up"></i></a>
	</div>

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="js/script.js"></script> -->
  <?php wp_footer(); ?><!-- ↑2行を←に置き換える -->
</body>

</html>
