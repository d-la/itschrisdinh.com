<header class="banner relative header max-w-7xl mx-auto px-5 min-h-[150px] flex justify-between items-center z-50">
  <a href="<?php echo e(home_url('/')); ?>" class="header__website-logo brand component heading-lg text-3xl md:text-4xl lg:text-5xl text-white mt-[10px]">
      Chris D.
  </a>

  <button id="menu-toggle-button" class="hamburger-button cursor-pointer group size-6" aria-label="Open menu">
      <svg class="transition-all duration-300 group-focus:opacity-80 group-hover:opacity-80 group-focus-visible:opacity-80" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white">
          <circle cx="12" cy="12" r="11" fill="white" />
      </svg>
  </button>
</header>
<?php if (! (empty($menuItems))): ?>
  <div id="menu-overlay" class="fixed pointer-events-none opacity-0 inset-0 bg-neutral-900 transition-opacity duration-175 ease-in-out z-40">
    <div class="max-w-7xl mx-auto flex h-full flex-col-reverse lg:flex-row justify-between items-center px-5">
      <nav class="w-full flex flex-col justify-end items-end text-white lg:justify-start lg:items-start z-20" aria-label="Primary Navigation">
          <ul class="flex flex-col w-full items-end lg:items-start">
            <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                  $shouldOpenInNewTab = get_post_meta($menuItem->ID, '_menu_item_target', true);
              ?>
              <li class="nav-item mb-6" data-image="<?php echo e($menuItem->navigation_image); ?>">
                <a
                  href="<?php echo e($menuItem->url); ?>"
                  class="inline-block text-5xl lg:text-5xl transition-transform duration-300 ease-in-out no-underline! hover:scale-110 focus:scale-110 focus-within:scale-110"
                  target="<?php echo e($shouldOpenInNewTab ?: '_self'); ?>"
                  >
                    <?php echo e($menuItem->title); ?>

                </a>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </nav>
      <div class="w-full flex flex-col justify-start items-start pt-24 text-white whitespace-nowrap lg:w-1/2 lg:pr-48 z-20">
        <?php if(is_array($instagramLink) && !empty($instagramLink['url'])): ?>
            <a
              href="<?php echo e($instagramLink['url']); ?>"
              class="text-2xl md:text-4xl transition-transform duration-300 ease-in-out hover:scale-110"
              target="<?php echo e($instagramLink['target'] ?: '_self'); ?>"
              >
                <?php echo e($instagramLink['title']); ?>

            </a>
        <?php endif; ?>
        <?php if(!empty($phoneNumber)): ?>
            <a href="tel:<?php echo e($phoneNumber); ?>" class="text-2xl md:text-4xl transition-transform duration-300 ease-in-out"><?php echo e($phoneNumber); ?></a>
        <?php endif; ?>
        <?php if(!empty($emailAddress)): ?>
            <a href="mailto:<?php echo e($emailAddress); ?>" class="text-2xl md:text-4xl transition-transform duration-300 ease-in-out"><?php echo e($emailAddress); ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /Users/daniel/Local Sites/itschrisdinh-2/app/public/wp-content/themes/itschrisdinh/resources/views/sections/header.blade.php ENDPATH**/ ?>