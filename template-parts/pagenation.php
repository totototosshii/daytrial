<div class="pagenation">
  <?php
    echo paginate_links(
      array(
        'end_size'  => 0,
        'mid_size'  => 1,
        'prev_next' => true,
        'prev_text' => '<i class="fas fa-angle-left"></i>',
        'next_text' => '<i class="fas fa-angle-right"></i>',
      )
    );
  ?>
</div><!-- /pagenation -->
