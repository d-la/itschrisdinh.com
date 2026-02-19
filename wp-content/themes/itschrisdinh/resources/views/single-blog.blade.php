@extends('layouts.app')

@section('content')
  <article @php(post_class('h-entry'))>
    <header class="container pb-5">
      @unless (empty($thumbnailData['url']))
        <img src="{{ $thumbnailData['url'] }}" class="rounded-[10px]" alt="@unless (empty($thumbnailData['alt'])) {{ $thumbnailData['alt']}} @endunless">
      @endunless
      <h1 class="heading-base my-4">
        {!! $title !!}
      </h1>

      @include('partials.entry-meta')
    </header>

    <div class="e-content container [&_p]:copy-base [&_h2]:subheader-base">
      @php(the_content())
    </div>

    @unless (empty($relatedPosts))
      <div class="related-articles container py-10">
        <h2 class="subheader-base pb-5 text-center">You May Also Like</h2>

        <div class="flex flex-col md:flex-row justify-center items-center">
          @foreach ($relatedPosts as $post)
            @include('partials.related-post-card', ['post' => $post])
          @endforeach
        </div>
      </div>
    @endunless
  </article>
@endsection
