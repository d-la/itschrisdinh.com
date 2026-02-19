<?php if (! ( empty($galleryItems) )): ?>
  <image-gallery id="gallery" class="container image-gallery py-10 flex flex-wrap flex-row gap-[13px] justify-start">
    <?php $__currentLoopData = $galleryItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <button class="image-gallery__item appearance-none basis-[calc(50%-10px)] md:basis-[calc(33.333%-10px)] lg:basis-[calc(25%-10px)] group cursor-pointer overflow-hidden mix" data-cascade data-collections="<?php echo e($item['filters']); ?>">
        <img
          data-index="<?php echo e($index); ?>"
          src="<?php echo e($item['url']); ?>"
          alt="<?php echo e($item['alt']); ?>"
          data-width="<?php echo e($item['width']); ?>"
          data-height="<?php echo e($item['height']); ?>"
          class="image-gallery__image w-full h-full aspect-square object-cover group-hover:scale-110 group-focus:scale-110 group-focus-within:scale-110 transition-all duration-300 ease focus:ring-4 focus:ring-blue-500 focus:ring-offset-2 focus-within:ring-4 focus-within:ring-blue-500 focus-within:ring-offset-2"
          loading="lazy"
          data-caption="<?php echo e($item['caption']); ?>"
        >
      </button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </image-gallery>
<?php endif; ?>

<?php if($morePostsAvailable && $loadMoreType == 'button'): ?>
  <div class="image-gallery-load-more flex justify-center items-center pb-10">
    <button type="button" data-per-page="<?php echo e($maximumAmountOfImages); ?>" offset="1" class="cta-primary">Load More</button>
  </div>
<?php endif; ?>
<?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/components/image-gallery.blade.php ENDPATH**/ ?>