<header class="banner relative header container min-h-[150px] flex justify-between items-center z-50">
  <a href="{{ home_url('/') }}" class="header__website-logo brand component heading-lg text-3xl md:text-4xl lg:text-5xl text-white mt-[10px]">
      Chris D.
  </a>

  <button id="menu-toggle-button" class="hamburger-button cursor-pointer group size-6" aria-label="Open menu">
      <svg class="transition-all duration-300 group-focus:opacity-80 group-hover:opacity-80 group-focus-visible:opacity-80" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white">
          <circle cx="12" cy="12" r="11" fill="white" />
      </svg>
  </button>
</header>
@unless (empty($menuItems))
  <div id="menu-overlay" class="fixed pointer-events-none opacity-0 inset-0 bg-neutral-900 transition-opacity duration-175 ease-in-out z-40">
    <div class="container flex h-full flex-col-reverse lg:flex-row justify-between items-center pb-10">
      <nav class="w-full flex flex-col justify-end items-end text-white lg:justify-start lg:items-start z-20" aria-label="Primary Navigation">
          <ul class="flex flex-col w-full items-end lg:items-start">
            @foreach ($menuItems as $menuItem)
              @php
                  $shouldOpenInNewTab = get_post_meta($menuItem->ID, '_menu_item_target', true);
              @endphp
              <li class="nav-item mb-6" data-image="{{ $menuItem->navigation_image }}">
                <a
                  href="{{ $menuItem->url }}"
                  class="inline-block text-5xl lg:text-5xl transition-transform duration-300 ease-in-out no-underline! hover:scale-110 focus:scale-110 focus-within:scale-110"
                  target="{{ $shouldOpenInNewTab ?: '_self' }}"
                  >
                    {{ $menuItem->title }}
                </a>
              </li>
            @endforeach
          </ul>
          <ul class="header-socials flex flex-row gap-5 items-start">
            @if (is_array($instagramLink) && !empty($instagramLink['url']))
              <li>
                <a
                  href="{{ $instagramLink['url'] }}"
                  class="text-2xl md:text-4xl text-base transition-transform duration-300 ease-in-out group"
                  target="{{ $instagramLink['target'] ?: '_self' }}"
                  aria-label="View Chris Dinh's instagram account"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram size-6 group-hover:scale-105 group-focus:scale-105 group-focus-within:scale-105 transition-all duration-300" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M16.5 7.5l0 .01" />
                  </svg>
                </a>
              </li>
            @endif
            @if (!empty($emailAddress))
              <li>
                <a href="mailto:{{ $emailAddress }}" class="text-2xl md:text-4xl text-base transition-transform duration-300 ease-in-out group" aria-label="Email Chris Dinh">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 group-hover:scale-105 group-focus:scale-105 group-focus-within:scale-105 transition-all duration-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                  </svg>
                </a>
              </li>
            @endif
          </ul>
      </nav>
    </div>
  </div>
@endunless
