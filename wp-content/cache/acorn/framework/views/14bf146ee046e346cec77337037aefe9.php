<?php $__env->startSection('content'); ?>
  <header class="blog-header container flex flex-col justify-start items-start">
    <div class="blog-header__heading">
      <h1 class="block text-left heading-base"><?php echo e($pageTitle); ?></h1>
    </div>
  </header>

  <?php if (! ( empty($featuredPosts) )): ?>
    <section class="container py-10">
      <?php if (isset($component)) { $__componentOriginal2b7f91351e6b2a52e4a57d0c181cabcc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b7f91351e6b2a52e4a57d0c181cabcc = $attributes; } ?>
<?php $component = App\View\Components\SplideSlider::resolve(['sliderSettingsAcfName' => 'featured_slider_settings','slideViewTemplatePath' => 'partials.featured-blog-post-card','slideViewTemplateData' => $featuredPosts] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splide-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SplideSlider::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b7f91351e6b2a52e4a57d0c181cabcc)): ?>
<?php $attributes = $__attributesOriginal2b7f91351e6b2a52e4a57d0c181cabcc; ?>
<?php unset($__attributesOriginal2b7f91351e6b2a52e4a57d0c181cabcc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b7f91351e6b2a52e4a57d0c181cabcc)): ?>
<?php $component = $__componentOriginal2b7f91351e6b2a52e4a57d0c181cabcc; ?>
<?php unset($__componentOriginal2b7f91351e6b2a52e4a57d0c181cabcc); ?>
<?php endif; ?>
    </section>
  <?php endif; ?>

  <?php if (! (empty($otherCollectionPosts))): ?>
    <?php $__currentLoopData = $otherCollectionPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if (! (empty($section))): ?>
        <section class="container py-10">
          <?php if (isset($component)) { $__componentOriginal2b7f91351e6b2a52e4a57d0c181cabcc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b7f91351e6b2a52e4a57d0c181cabcc = $attributes; } ?>
<?php $component = App\View\Components\SplideSlider::resolve(['sliderSettingsAcfName' => 'other_blog_slider_settings','slideViewTemplatePath' => 'partials.other-blog-post-card','slideViewTemplateData' => $section] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('splide-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SplideSlider::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b7f91351e6b2a52e4a57d0c181cabcc)): ?>
<?php $attributes = $__attributesOriginal2b7f91351e6b2a52e4a57d0c181cabcc; ?>
<?php unset($__attributesOriginal2b7f91351e6b2a52e4a57d0c181cabcc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b7f91351e6b2a52e4a57d0c181cabcc)): ?>
<?php $component = $__componentOriginal2b7f91351e6b2a52e4a57d0c181cabcc; ?>
<?php unset($__componentOriginal2b7f91351e6b2a52e4a57d0c181cabcc); ?>
<?php endif; ?>
        </section>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/template-blog-page.blade.php ENDPATH**/ ?>