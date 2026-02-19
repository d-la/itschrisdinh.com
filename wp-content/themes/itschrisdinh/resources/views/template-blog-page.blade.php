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
@endsection
