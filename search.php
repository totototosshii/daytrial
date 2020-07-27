<?php get_header(); ?>


	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

				<!-- breadcrumb -->
				<div class="breadcrumb">
					<!-- Breadcrumb NavXT のパンくずを表示するための記述 -->
					<?php bcn_display(); ?>
				</div><!-- /breadcrumb -->

				<div class="archive-head">
					<div class="archive-lead">SEARCH</div>
					<h1 class="archive-title m_search"><span>"<?php the_search_query(); ?>"</span>の検索結果：<?php echo esc_html( $wp_query->found_posts ); ?></h1><!-- /archive-title -->
				</div><!-- /archive-head -->

        <!-- 記事があれば entries ブロック以下を表示 -->
				<?php if ( have_posts() ) : ?>
				<!-- entries -->
				<div class="entries m_horizontal">
					<!-- 記事数分ループ -->
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
					<!-- entry-item -->
					<!-- 記事のリンクを表示 -->
					<a href="<?php the_permalink(); ?>" class="entry-item">
						<!-- entry-item-img -->
						<div class="entry-item-img">
							<!-- アイキャッチ画像が設定されているなら -->
							<?php if ( has_post_thumbnail() ) : ?>
							<!-- アイキャッチ画像を大サイズで表示 -->
								<?php the_post_thumbnail( 'large' ); ?>
							<?php else : ?>
								<!-- noimage 画像を表示 -->
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/noimg.png" alt="">
							<?php endif; ?>
						</div><!-- /entry-item-img -->

						<!-- entry-item-body -->
						<div class="entry-item-body">
							<div class="entry-item-meta">
							<!-- カテゴリー1つ目の名前を表示 -->
							<div class="entry-item-tag"><?php my_the_post_category( false ); ?></div><!-- /entry-item-tag -->
							<!-- 公開日時を動的に表示する -->
							<time class="entry-item-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'Y/n/j' ); ?></time><!-- /entry-item-published -->
							</div><!-- /entry-item-meta -->
							<!-- タイトルを表示 -->
							<h2 class="entry-item-title"><?php the_title(); ?></h2><!-- /entry-item-title -->
							<div class="entry-item-excerpt">
							<!-- 抜粋を表示 -->
							<?php the_excerpt(); ?>
							</div><!-- /entry-item-excerpt -->
						</div><!-- /entry-item-body -->
					</a><!-- /entry-item -->

					<?php endwhile; ?>
				</div><!-- /entries -->
				<?php endif; ?>

				<!-- pagenation -->
				<?php get_template_part( 'template-parts/pagenation'); ?>

			</main><!-- /primary -->

			<!-- secondary -->
			<?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

	<!-- footer-menu -->
	<?php get_footer(); ?>
