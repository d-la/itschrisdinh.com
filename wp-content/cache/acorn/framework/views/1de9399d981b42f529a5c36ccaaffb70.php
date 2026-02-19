<?php if (! (empty($data))): ?>
  <a href="<?php echo e(get_permalink($data->ID)); ?>" class="blog-post-card-link max-w-[400px] mx-auto group no-underline!">
    <?php if (! (empty(get_the_post_thumbnail_url($data->ID)))): ?>
      <div class="blog-post-card-image-container overflow-hidden rounded-[10px]">
        <img src="<?php echo e(get_the_post_thumbnail_url($data->ID)); ?>" alt="" class="aspect-video rounded-[10px] transition-all duration-300 group-hover:scale-110 group-focus:scale-110 group-focus-within:scale-110">
      </div>
    <?php endif; ?>
    <?php if (! (empty($data->post_title))): ?>
      <h2 class="blog-post-card-title-base transition-all duration-300 mt-2"><?php echo e($data->post_title); ?></h2>
    <?php endif; ?>
  </a>
<?php endif; ?>
<?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/partials/related-blog-post-card.blade.php ENDPATH**/ ?>