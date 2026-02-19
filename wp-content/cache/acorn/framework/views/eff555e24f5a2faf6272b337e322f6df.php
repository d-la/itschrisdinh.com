<?php $__env->startSection('content'); ?>
  <header class="gallery-header container flex flex-col justify-start items-start">
    <div class="gallery-header__heading">
      <h1 class="block text-left heading-base scroll-trigger animate--slide-in">Gallery</h1>
    </div>

    <?php if (isset($component)) { $__componentOriginal07bb736a3f2e5329f1db2eb31ecbbd79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07bb736a3f2e5329f1db2eb31ecbbd79 = $attributes; } ?>
<?php $component = App\View\Components\GalleryCollections::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('gallery-collections'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GalleryCollections::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07bb736a3f2e5329f1db2eb31ecbbd79)): ?>
<?php $attributes = $__attributesOriginal07bb736a3f2e5329f1db2eb31ecbbd79; ?>
<?php unset($__attributesOriginal07bb736a3f2e5329f1db2eb31ecbbd79); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07bb736a3f2e5329f1db2eb31ecbbd79)): ?>
<?php $component = $__componentOriginal07bb736a3f2e5329f1db2eb31ecbbd79; ?>
<?php unset($__componentOriginal07bb736a3f2e5329f1db2eb31ecbbd79); ?>
<?php endif; ?>
  </header>

  <?php if (isset($component)) { $__componentOriginala3869b2048fa217e2bd54791ad840539 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3869b2048fa217e2bd54791ad840539 = $attributes; } ?>
<?php $component = App\View\Components\ImageGallery::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('image-gallery'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ImageGallery::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3869b2048fa217e2bd54791ad840539)): ?>
<?php $attributes = $__attributesOriginala3869b2048fa217e2bd54791ad840539; ?>
<?php unset($__attributesOriginala3869b2048fa217e2bd54791ad840539); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3869b2048fa217e2bd54791ad840539)): ?>
<?php $component = $__componentOriginala3869b2048fa217e2bd54791ad840539; ?>
<?php unset($__componentOriginala3869b2048fa217e2bd54791ad840539); ?>
<?php endif; ?>
  <?php if (isset($component)) { $__componentOriginal434018aed29b634127ad22ba7ef70a65 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal434018aed29b634127ad22ba7ef70a65 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-gallery-lightbox','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('image-gallery-lightbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal434018aed29b634127ad22ba7ef70a65)): ?>
<?php $attributes = $__attributesOriginal434018aed29b634127ad22ba7ef70a65; ?>
<?php unset($__attributesOriginal434018aed29b634127ad22ba7ef70a65); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal434018aed29b634127ad22ba7ef70a65)): ?>
<?php $component = $__componentOriginal434018aed29b634127ad22ba7ef70a65; ?>
<?php unset($__componentOriginal434018aed29b634127ad22ba7ef70a65); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/template-gallery-page.blade.php ENDPATH**/ ?>