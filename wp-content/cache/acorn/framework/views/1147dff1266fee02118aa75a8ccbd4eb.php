<?php if (! (empty($post))): ?>
  <a href="<?php echo e(get_permalink($post->ID)); ?>" class="related-post-link basis-full md:basis-1/3 md:shrink-0 md:grow-0 group no-underline!">
    <?php if (! (empty(get_the_post_thumbnail_url($post->ID)))): ?>
      <div class="related-post-image-container overflow-hidden rounded-[10px]">
        <img src="<?php echo e(get_the_post_thumbnail_url($post->ID)); ?>" alt="" class="aspect-video rounded-[10px] transition-all duration-300 group-hover:scale-110 group-focus:scale-110 group-focus-within:scale-110">
      </div>
    <?php endif; ?>
    <?php if (! (empty($post->post_title))): ?>
      <h2 class="related-post-base transition-all duration-300 mt-2"><?php echo e($post->post_title); ?></h2>
    <?php endif; ?>
  </a>
<?php endif; ?>
<?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/partials/related-post-card.blade.php ENDPATH**/ ?>