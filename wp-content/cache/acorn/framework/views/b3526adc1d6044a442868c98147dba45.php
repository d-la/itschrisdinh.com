<?php $__env->startSection('content'); ?>
  <article <?php (post_class('h-entry')); ?>>
    <header class="container pb-5">
      <?php if (! (empty($thumbnailData['url']))): ?>
        <img src="<?php echo e($thumbnailData['url']); ?>" class="rounded-[10px]" alt="<?php if (! (empty($thumbnailData['alt']))): ?> <?php echo e($thumbnailData['alt']); ?> <?php endif; ?>">
      <?php endif; ?>
      <h1 class="heading-base my-4">
        <?php echo $title; ?>

      </h1>

      <?php echo $__env->make('partials.entry-meta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </header>

    <div class="e-content container [&_p]:copy-base [&_h2]:subheader-base">
      <?php (the_content()); ?>
    </div>

    <?php if (! (empty($relatedPosts))): ?>
      <div class="related-articles container py-10">
        <h2 class="subheader-base pb-5 text-center">You May Also Like</h2>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-5">
          <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('partials.related-blog-post-card', ['data' => $post, 'cardType' => 'related'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    <?php endif; ?>
  </article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/single-blog.blade.php ENDPATH**/ ?>