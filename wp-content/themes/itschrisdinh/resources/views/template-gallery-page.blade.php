{{--
  Template Name: Gallery Page
--}}

@extends('layouts.app')

@section('content')
  <header class="gallery-header container flex flex-col justify-start items-start">
    <div class="gallery-header__heading">
      <h1 class="block text-left heading-base">Gallery</h1>
    </div>

    <x-gallery-collections></x-gallery-collections>
  </header>

  @unless ( empty($galleryItems) )
    <section class="container py-10">
      <div id="gallery" class="flex flex-wrap flex-row gap-2.5 justify-start">
        @foreach ($galleryItems as $index => $item)
          @php
            $itemTerm = !empty($item['taxonomy_terms']) ? 'all ' . $item['taxonomy_terms'] : 'all';
          @endphp
          <div class="gallery__item basis-[calc(50%-10px)] md:basis-[calc(33.333%-10px)] lg:basis-[calc(25%-10px)] group cursor-pointer overflow-hidden mix" data-collections="{{ $itemTerm }}">
            <img
              data-index="{{ $index }}"
              src="{{ $item['sizes']['medium'] ?: $item['url'] }}"
              alt="{{ $item['alt'] }}"
              data-width="{{ $item['width'] }}"
              data-height="{{ $item['height'] }}"
              class="w-full h-full aspect-square object-cover group-hover:scale-110 transition-all duration-300 ease"
              loading="lazy"
            >
          </div>
        @endforeach
      </div>
    </section>
  @endunless
@endsection
