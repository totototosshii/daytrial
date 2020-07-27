<div id="pickup">
		<div class="inner">

			<div class="pickup-items">
        <!-- ピックアップする記事の投稿idを指定する -->
        <?php $pickup_ids = array(10, 11, 12); ?>
        <?php foreach($pickup_ids as $pickup_id) : ?>
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
              <div class="pickup-item-tag"><?php my_the_post_category(false, $pickup_id); ?></div><!-- /pickup-item-tag -->
            </div><!-- /pickup-item-img -->
            <div class="pickup-item-body">
              <h2 class="pickup-item-title"><?php echo esc_html(get_the_title($pickup_id)); ?></h2><!-- /pickup-item-title -->
            </div><!-- /pickup-item-body -->
          </a><!-- /pickup-item -->
        <?php endforeach; ?>

			</div><!-- /pickup-items -->

		</div><!-- /inner -->
	</div><!-- /pickup -->
