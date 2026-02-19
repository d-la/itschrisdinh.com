{{--
  Template Name: Blog Page
--}}

@extends('layouts.app')

@section('content')
  <header class="blog-header container flex flex-col justify-start items-start">
    <div class="blog-header__heading">
      <h1 class="block text-left heading-base">{{ $pageTitle }}</h1>
    </div>
  </header>

  @unless ( empty($featuredPosts) )
    <section class="container py-10">
      <x-splide-slider
        slider-settings-acf-name="featured_slider_settings"
        slide-view-template-path="partials.featured-blog-post-card"
        :slide-view-template-data="$featuredPosts">
      </x-splide-slider>
    </section>
  @endunless

  @unless (empty($otherCollectionPosts))
    @foreach ($otherCollectionPosts as $section)
      @unless (empty($section))
        <section class="container py-10">
          <x-splide-slider
            slider-settings-acf-name="other_blog_slider_settings"
            slide-view-template-path="partials.other-blog-post-card"
            :slide-view-template-data="$section">
          </x-splide-slider>
        </section>
      @endunless
    @endforeach
  @endunless
@endsection
