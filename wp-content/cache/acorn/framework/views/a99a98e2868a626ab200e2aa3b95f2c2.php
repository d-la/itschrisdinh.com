<?php if (! ( empty($terms) )): ?>
  <gallery-collections class="gallery-collections relative mt-2 flex flex-col md:flex-row gap-1 md:gap-2">
    <button class="gallery-collections__collection gallery-collections__collection--active inline hover:opacity-75 transition-all border-b border-b-transparent border-solid filter-base cursor-pointer text-left w-fit pb-1 scroll-trigger animate--slide-in"  data-filter='[data-collections~="all"]' data-term-slug="all" aria-label="Filter the gallery images to see all images part of any collection.">Show All</button>
    <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <button class="gallery-collections__collection inline hover:opacity-75 transition-all border-b border-solid border-b-transparent filter-base cursor-pointer text-left w-fit pb-1 scroll-trigger animate--slide-in" data-filter='[data-collections~="<?php echo e($term->slug); ?>"]' data-term-slug="<?php echo e($term->slug); ?>" data-term-id="<?php echo e($term->term_id); ?>" aria-label="Filter the gallery images to see images part of the <?php echo e($term->slug); ?> collection."><?php echo e($term->name); ?></button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </gallery-collections>
<?php endif; ?>
<?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/components/gallery-collections.blade.php ENDPATH**/ ?>