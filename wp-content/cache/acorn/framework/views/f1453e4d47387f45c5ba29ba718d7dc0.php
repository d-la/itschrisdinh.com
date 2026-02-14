<slider>
  <section
      id="<?php echo e($sliderSettings['slider_id']); ?>"
      class="<?php echo e($sliderSettings['slider_classes']); ?> splider splide"
      data-splide="<?php echo e(json_encode($sliderAcfJSONData)); ?>"
      <?php if($sliderSettings['custom_pagination']): ?>
          data-custom-pagination="<?= $sliderSettings['custom_pagination'] ? 'true' : 'false'; ?>"
      <?php endif; ?>
      data-mobile-custom-settings="<?php echo e(json_encode($sliderCustomSettings['mobile'])); ?>"
      data-tablet-custom-settings="<?php echo e(json_encode($sliderCustomSettings['tablet'])); ?>"
      data-desktop-custom-settings="<?php echo e(json_encode($sliderCustomSettings['desktop'])); ?>"
      >
      <div class="flex justify-center items-center">
          <div class="splide__arrows z-10">
              <button class="splide__arrow splide__arrow--prev !bg-transparent z-10">
                  <!--using the same svg path because the button is configured to set the svg path backwords for the left button-->
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" stroke="white" class="bi bi-chevron-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/> </svg>
              <button class="splide__arrow splide__arrow--next !bg-transparent z-10">
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

          <div class="splide__custom-pagination text-center bottom-24 left-0 px-0 py-4 absolute right-0 z-1 text-white <?php echo e($customPaginationShowOn); ?>"></div>
          <div class="splide__pagination text-white"></div>
      </div>
      
  </section>
</slider>
<?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/components/slider.blade.php ENDPATH**/ ?>