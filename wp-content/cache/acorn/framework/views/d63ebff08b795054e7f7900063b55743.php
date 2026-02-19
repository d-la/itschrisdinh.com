<article <?php (post_class('h-entry')); ?>>
  <header class="container pb-5">
    <?php if (! (empty(get_the_post_thumbnail_url()))): ?>
      <img src="<?php echo e(get_the_post_thumbnail_url()); ?>" class="rounded-[10px]" alt="<?php echo e(get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true )); ?>">
    <?php endif; ?>
    <h1 class="heading-base my-4">
      <?php echo $title; ?>

    </h1>

    <?php echo $__env->make('partials.entry-meta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </header>

  <div class="e-content container [&_p]:copy-base [&_h2]:subheader-base">
    <?php (the_content()); ?>
  </div>

  <?php if($pagination()): ?>
    <footer>
      <nav class="page-nav" aria-label="Page">
        <?php echo $pagination; ?>

      </nav>
    </footer>
  <?php endif; ?>
</article>
<?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/partials/content-single.blade.php ENDPATH**/ ?>