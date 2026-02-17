@unless ( empty($galleryItems) )
  <image-gallery id="gallery" class="container image-gallery py-10 flex flex-wrap flex-row gap-[13px] justify-start">
    @foreach ($galleryItems as $index => $item)
      <button class="image-gallery__item appearance-none basis-[calc(50%-10px)] md:basis-[calc(33.333%-10px)] lg:basis-[calc(25%-10px)] group cursor-pointer overflow-hidden mix" data-collections="{{ $item['filters'] }}">
        <img
          data-index="{{ $index }}"
          src="{{ $item['url'] }}"
          alt="{{ $item['alt'] }}"
          data-width="{{ $item['width'] }}"
          data-height="{{ $item['height'] }}"
          class="image-gallery__image w-full h-full aspect-square object-cover group-hover:scale-110 group-focus:scale-110 group-focus-within:scale-110 transition-all duration-300 ease focus:ring-4 focus:ring-blue-500 focus:ring-offset-2 focus-within:ring-4 focus-within:ring-blue-500 focus-within:ring-offset-2"
          loading="lazy"
          data-caption="{{ $item['caption'] }}"
        >
      </button>
    @endforeach
  </image-gallery>
@endunless

@if ($morePostsAvailable && $loadMoreType == 'button')
  <div class="image-gallery-load-more flex justify-center items-center pb-10">
    <button type="button" data-per-page="{{ $maximumAmountOfImages }}" offset="1" class="cta-primary">Load More</button>
  </div>
@endif
