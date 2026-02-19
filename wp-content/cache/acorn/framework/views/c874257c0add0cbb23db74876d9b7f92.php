<?php if (! (empty($data))): ?>
  <li class="splide__slide">
    <a href="<?php echo e(get_permalink($data->ID)); ?>" class="blog-post-card-link basis-full md:basis-1/3 md:shrink-0 md:grow-0 group no-underline!">
      <?php if (! (empty(get_the_post_thumbnail_url($data->ID)))): ?>
        <div class="blog-post-card-image-container overflow-hidden rounded-[10px]">
          <img src="<?php echo e(get_the_post_thumbnail_url($data->ID)); ?>" alt="" class="aspect-video rounded-[10px] transition-all duration-300 group-hover:scale-110 group-focus:scale-110 group-focus-within:scale-110">
        </div>
      <?php endif; ?>
      <h3 class="preheader-base mt-3">FEATURED POST</h3>
      <?php if (! (empty($data->post_title))): ?>
        <h2 class="blog-post-card-title-base transition-all duration-300 mt-2"><?php echo e($data->post_title); ?></h2>
      <?php endif; ?>
    </a>
  </li>
<?php endif; ?>
<?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/partials/featured-blog-post-card.blade.php ENDPATH**/ ?>