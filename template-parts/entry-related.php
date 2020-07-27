<div class="entry-related">
  <div class="related-title">関連記事</div>

  <div class="related-items">
    <?php
      $args = array(
        // 表示中の投稿と同じカテゴリ
        'category__in' => $category[0]->cat_ID,
        // 表示中の投稿を除く
        'post__not_in' => array($post_ID),
        // ランダムに記事を選ぶ
        'orderby' => 'land',
        // 8件表示
        'posts_par_page' => 8,
      );
    ?>
    <?php $query = new WP_Query($args); ?>
    <?php if($query->have_posts()) : ?>
      <?php while($query->have_posts()) : ?>
        <?php $query->the_post(); ?>
          <a class="related-item" href="<?php the_permalink(); ?>">
            <div class="related-item-img">
              <!-- アイキャッチ画像が設定されているなら -->
              <?php if(has_post_thumbnail()) : ?>
                <!-- アイキャッチ画像を大サイズで表示 -->
                <?php the_post_thumbnail('large'); ?>
              <?php else : ?>
                <!-- noimage 画像を表示 -->
              <img src="<?php echo esc_url(get_template_directory_url()); ?>/img/noimg/png" alt="">
              <?php endif; ?>
            </div><!-- /related-item-img -->

            <div class="related-item-title"><?php the_title(); ?></div><!-- /related-item-title -->
          </a><!-- /related-item -->
      <?php endwhile; ?>
      <!-- グローバル変数を復元 -->
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p>関連記事はありません。</p>
    <?php endif; ?>
  </div><!-- /related-items -->
</div><!-- /entry-related -->
