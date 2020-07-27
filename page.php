<?php get_header(); ?>



	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

        <!-- パンくず -->
        <?php if( function_exists('bcn_display')) : ?>
				<!-- breadcrumb -->
				<div class="breadcrumb">
          <!-- Breadcrumb NavXT のパンくずを表示するための記述 -->
          <?php bcn_display(); ?>
        </div><!-- /breadcrumb -->
        <?php endif; ?>

        <!-- 記事があれば以下を表示 -->
        <?php if( have_posts() ) : ?>
          <!-- 記事数分ループ -->
          <?php while( have_posts() ) : ?>
            <?php the_post(); ?>
          <!-- entry -->
          <article class="entry">

            <!-- entry-header -->
						<div class="entry-header">
							<!-- タイトルを表示 -->
							<h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->
							<!-- entry-meta -->
							<div class="entry-meta">
								<!-- 公開日を表示する -->
								<time class="entry-published" datetime="<?php the_time( 'c' ); ?>">公開日 <?php the_time( 'Y/n/j' ); ?></time>
								<!-- 最終更新日を表示 -->
								<?php if ( get_the_modified_time( 'Y-m-d' ) !== get_the_time( 'Y-m-d' ) ) : ?>
									<time class="entry-updated" datetime="<?php the_modified_time( 'c' ); ?>">最終更新日 <?php the_modified_time( 'Y/n/j' ); ?></time>
								<?php endif; ?>
							</div><!-- /entry-meta -->

							<!-- entry-img -->
							<div class="entry-img">
								<!-- アイキャッチ画像が設定されているなら -->
								<?php if ( has_post_thumbnail() ) : ?>
								<!-- アイキャッチ画像を大サイズで表示 -->
									<?php the_post_thumbnail( 'large' ); ?>
								<?php endif; ?>
							</div><!-- /entry-img -->

						</div><!-- /entry-header -->

						<!-- entry-body -->
						<div class="entry-body">
							<!-- 本文の表示 -->
							<?php the_content(); ?>
							<!-- ショートコード -->
							<?php echo do_shortcode( "[btn link='https://30daytrial.tosshii-portfolio.com/contact']お問い合わせはこちら[/btn]" ); ?>
							<!--改ページを有効にする -->
							<?php
								wp_link_pages(
									array(
										'before'         => '<nav class="entry-links">',
										'after'          => '</nav>',
										'link_before'    => '',
										'link_after'     => '',
										'next_or_number' => 'number',
										'separator'      => '',
									)
								);
							?>
						</div><!-- /entry-body -->

          </article> <!-- /entry -->
        <?php endwhile; ?>
        <?php endif; ?>
			</main><!-- /primary -->

			<!-- secondary -->
			<?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

	<?php get_footer(); ?>
