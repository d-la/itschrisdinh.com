@extends('layouts.app')

@section('content')
  @unless ( empty($slides) && empty($sliderSettings) )
    <x-splide-slider
      slider-settings-acf-name="homepage_slider_settings"
      slide-view-template-path="components.homepage-slider-slides"
      :slide-view-template-data="$slides">
    </x-splide-slider>
  @endunless
@endsection
