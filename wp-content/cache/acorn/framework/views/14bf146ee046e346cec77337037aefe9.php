<?php $__env->startSection('content'); ?>
  <header class="blog-header container flex flex-col justify-start items-start">
    <div class="blog-header__heading">
      <h1 class="block text-left heading-base"><?php echo e($pageTitle); ?></h1>
    </div>
  </header>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/template-blog-page.blade.php ENDPATH**/ ?>