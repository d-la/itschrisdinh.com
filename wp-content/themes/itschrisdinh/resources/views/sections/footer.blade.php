<footer class="content-info mb-8 container {{ $footerClasses }}">
  <div class="mx-auto my-6 border-t border-white w-full"></div>

  <div class="relative mx-auto w-full flex flex-row justify-between items-center text-white space-y-0">
    @if ($instagramLink['url'])
      <div class="footer-instagram-link relative flex items-center">
        <a href="{{ $instagramLink['url'] }}" target="_blank" aria-label="Open Instagram link" class="flex items-center justify-center transition-transform duration-300 ease-in-out hover:scale-110 focus-within:scale-110 focus:scale-110 copy-base">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
            <path d="M16.5 7.5l0 .01" />
          </svg>
        </a>
      </div>
    @endif

    @if ($emailAddress)
      <div class="footer-email-address flex items-center justify-end">
        <a href="mailto:{{ $emailAddress }}" class="flex items-center justify-center transition-transform duration-300 ease-in-out hover:scale-110 focus-within:scale-110 focus:scale-110 copy-base">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail md:hidden" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
            <path d="M3 7l9 6l9 -6" />
          </svg>
          <span class="hidden md:block">{{ $emailAddress }}</span>
        </a>
      </div>
    @endif
  </div>
</footer>
