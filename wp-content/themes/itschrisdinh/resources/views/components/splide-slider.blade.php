<splide-slider
  @unless (empty($sliderSettings['slider_id']))
      id="{{ $sliderSettings['slider_id'] }}"
  @endunless
  class="@unless (empty($sliderSettings['slider_classes'])) {{ $sliderSettings['slider_classes'] }} @endunless splide"
  @if (!empty($sliderAcfJSONData) && json_encode($sliderAcfJSONData))
  data-splide="{{ json_encode($sliderAcfJSONData) }}"
  @endif
  @if ($sliderSettings['custom_pagination'])
    data-custom-pagination="<?= $sliderSettings['custom_pagination'] ? 'true' : 'false'; ?>"
  @endif
  @unless (empty($sliderCustomSettings['mobile']))
    data-mobile-custom-settings="{{ $sliderCustomSettings['mobile'] }}"
  @endunless
  @unless (empty($sliderCustomSettings['tablet']))
    data-tablet-custom-settings="{{ $sliderCustomSettings['tablet'] }}"
  @endunless
  @unless (empty($sliderCustomSettings['desktop']))
    data-desktop-custom-settings="{{ $sliderCustomSettings['desktop'] }}"
  @endunless
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
          @foreach ($slideViewTemplateData as $item)
            @include($slideViewTemplatePath, ['data' => $item])
          @endforeach
        </ul>
      </div>
      <div class="splide__custom-pagination container text-center bottom-27.5 absolute z-1 text-white text-base {{ $customPaginationShowOn }}"></div>
      <div class="splide__pagination text-white"></div>
    </div>
</splide-slider>
