<?php $__env->startSection('content'); ?>
  <header class="gallery-header container flex flex-col justify-start items-start">
    <div class="gallery-header__heading">
      <h1 class="block text-left heading-base">Gallery</h1>
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

  <?php if (! ( empty($galleryItems) )): ?>
    <section class="container py-10">
      <div id="gallery" class="flex flex-wrap flex-row gap-2.5 justify-start">
        <?php $__currentLoopData = $galleryItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $itemTerm = !empty($item['taxonomy_terms']) ? 'all ' . $item['taxonomy_terms'] : 'all';
          ?>
          <div class="gallery__item basis-[calc(50%-10px)] md:basis-[calc(33.333%-10px)] lg:basis-[calc(25%-10px)] group cursor-pointer overflow-hidden mix" data-collections="<?php echo e($itemTerm); ?>">
            <img
              data-index="<?php echo e($index); ?>"
              src="<?php echo e($item['sizes']['medium'] ?: $item['url']); ?>"
              alt="<?php echo e($item['alt']); ?>"
              data-width="<?php echo e($item['width']); ?>"
              data-height="<?php echo e($item['height']); ?>"
              class="w-full h-full aspect-square object-cover group-hover:scale-110 transition-all duration-300 ease"
              loading="lazy"
            >
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </section>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/template-gallery-page.blade.php ENDPATH**/ ?>