@unless (empty($data))
  <li class="splide__slide">
    <a href="{{ get_permalink($data->ID) }}" class="blog-post-card-link basis-full md:basis-1/3 md:shrink-0 md:grow-0 group no-underline!">
      @unless (empty(get_the_post_thumbnail_url($data->ID)))
        <div class="blog-post-card-image-container overflow-hidden rounded-[10px]">
          <img src="{{ get_the_post_thumbnail_url($data->ID) }}" alt="" class="aspect-video rounded-[10px] transition-all duration-300 group-hover:scale-110 group-focus:scale-110 group-focus-within:scale-110">
        </div>
      @endunless
      <h3 class="preheader-base mt-3">FEATURED POST</h3>
      @unless (empty($data->post_title))
        <h2 class="blog-post-card-title-base transition-all duration-300 mt-2">{{ $data->post_title }}</h2>
      @endunless
    </a>
  </li>
@endunless
