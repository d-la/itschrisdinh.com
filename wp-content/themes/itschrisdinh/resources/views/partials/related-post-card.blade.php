@unless (empty($post))
  <a href="{{ get_permalink($post->ID) }}" class="related-post-link basis-full md:basis-1/3 md:shrink-0 md:grow-0 group no-underline!">
    @unless (empty(get_the_post_thumbnail_url($post->ID)))
      <div class="related-post-image-container overflow-hidden rounded-[10px]">
        <img src="{{ get_the_post_thumbnail_url($post->ID) }}" alt="" class="aspect-video rounded-[10px] transition-all duration-300 group-hover:scale-110 group-focus:scale-110 group-focus-within:scale-110">
      </div>
    @endunless
    @unless (empty($post->post_title))
      <h2 class="related-post-base transition-all duration-300 mt-2">{{ $post->post_title }}</h2>
    @endunless
  </a>
@endunless
