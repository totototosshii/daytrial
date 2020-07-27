
<div id="pickup">
		<div class="inner">

			<div class="pickup-items">
        <!-- pickupを取得 -->
        <?php
          $pickup_posts = get_posts(
            array(
              // 投稿タイプ.
              'post_type'      => 'post',
              // 3件取得.
              'posts_per_page' => 3,
              // pickupタグがついたもの.
              'tag'            => 'pickup',
              // 新しい順.
              'orderby'        => 'DESC',
            )
          );
        ?>

      <?php foreach($pickup_posts as $post) : ?>
        <?php setup_postdata($post); ?>
        <a href="<?php echo esc_url(get_permalink($pickup_id)); ?>" class="pickup-item">
          <div class="pickup-item-img">
            <!-- アイキャッチ画像が設定されているなら -->
            <?php if(has_post_thumbnail()) : ?>
              <!-- アイキャッチ画像を大サイズで表示 -->
              <?php the_post_thumbnail('large'); ?>
            <?php else : ?>
              <!-- noimage 画像を表示 -->
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.png" alt="">
            <?php endif; ?>
            <div class="pickup-item-tag"><?php my_the_post_category( false ); ?></div><!-- /pickup-item-tag -->
          </div><!-- /pickup-item-img -->
          <div class="pickup-item-body">
            <h2 class="pickup-item-title"><?php echo esc_html(get_the_title()); ?></h2><!-- /pickup-item-title -->
          </div><!-- /pickup-item-body -->
        </a><!-- /pickup-item -->
      <?php endforeach; ?>
      <!-- グローバル変数を復元 -->
      <?php wp_reset_postdata(); ?>
    </div><!-- /pickup-items -->

  </div><!-- /inner -->
</div><!-- /pickup -->
