<splide-slider
  <?php if (! (empty($sliderSettings['slider_id']))): ?>
      id="<?php echo e($sliderSettings['slider_id']); ?>"
  <?php endif; ?>
  class="<?php if (! (empty($sliderSettings['slider_classes']))): ?> <?php echo e($sliderSettings['slider_classes']); ?> <?php endif; ?> splide"
  <?php if(!empty($sliderAcfJSONData) && json_encode($sliderAcfJSONData)): ?>
  data-splide="<?php echo e(json_encode($sliderAcfJSONData)); ?>"
  <?php endif; ?>
  <?php if($sliderSettings['custom_pagination']): ?>
    data-custom-pagination="<?= $sliderSettings['custom_pagination'] ? 'true' : 'false'; ?>"
  <?php endif; ?>
  <?php if (! (empty($sliderCustomSettings['mobile']))): ?>
    data-mobile-custom-settings="<?php echo e($sliderCustomSettings['mobile']); ?>"
  <?php endif; ?>
  <?php if (! (empty($sliderCustomSettings['tablet']))): ?>
    data-tablet-custom-settings="<?php echo e($sliderCustomSettings['tablet']); ?>"
  <?php endif; ?>
  <?php if (! (empty($sliderCustomSettings['desktop']))): ?>
    data-desktop-custom-settings="<?php echo e($sliderCustomSettings['desktop']); ?>"
  <?php endif; ?>
  >
    <div class="flex justify-center items-center">
      <div class="splide__arrows z-10">
        <button class="splide__arrow splide__arrow--prev bg-transparent! z-10">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" stroke="white" class="bi bi-chevron-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/> </svg>
        <button class="splide__arrow splide__arrow--next bg-transparent! z-10">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" stroke="white" class="bi bi-chevron-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/> </svg>
        </button>
      </div>
      <div class="splide__track justify-center items-center">
        <ul class="splide__list">
          <?php $__currentLoopData = $slideViewTemplateData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make($slideViewTemplatePath, ['data' => $item], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <div class="splide__custom-pagination container text-center bottom-27.5 absolute z-1 text-white copy-base <?php echo e($customPaginationShowOn); ?>"></div>
      <div class="splide__pagination text-white"></div>
    </div>
</splide-slider>
<?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/components/splide-slider.blade.php ENDPATH**/ ?>