{{--
  Template Name: Gallery Page
--}}

@extends('layouts.app')

@section('content')
  <header class="gallery-header container flex flex-col justify-start items-start">
    <div class="gallery-header__heading">
      <h1 class="block text-left heading-base scroll-trigger animate--slide-in">Gallery</h1>
    </div>

    <x-gallery-collections></x-gallery-collections>
  </header>

  <x-image-gallery></x-image-gallery>
  <x-image-gallery-lightbox></x-image-gallery-lightbox>
@endsection
