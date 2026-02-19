@unless ( empty($terms) )
  <gallery-collections class="gallery-collections relative mt-2 flex flex-col md:flex-row gap-1 md:gap-2">
    <button class="gallery-collections__collection gallery-collections__collection--active inline hover:opacity-75 transition-all border-b border-b-transparent border-solid filter-base cursor-pointer text-left w-fit pb-1 scroll-trigger animate--slide-in"  data-filter='[data-collections~="all"]' data-term-slug="all" aria-label="Filter the gallery images to see all images part of any collection.">Show All</button>
    @foreach ($terms as $term)
      <button class="gallery-collections__collection inline hover:opacity-75 transition-all border-b border-solid border-b-transparent filter-base cursor-pointer text-left w-fit pb-1 scroll-trigger animate--slide-in" data-filter='[data-collections~="{{ $term->slug }}"]' data-term-slug="{{ $term->slug }}" data-term-id="{{ $term->term_id }}" aria-label="Filter the gallery images to see images part of the {{ $term->slug }} collection.">{{ $term->name }}</button>
    @endforeach
  </gallery-collections>
@endunless
