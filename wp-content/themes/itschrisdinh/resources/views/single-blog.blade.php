@extends('layouts.app')

@section('content')
  <article @php(post_class('h-entry'))>
    <header class="container pb-5">
      @unless (empty($thumbnailData['url']))
        <img src="{{ $thumbnailData['url'] }}" class="rounded-[10px] scroll-trigger animate--slide-in" alt="@unless (empty($thumbnailData['alt'])) {{ $thumbnailData['alt']}} @endunless">
      @endunless
      <h1 class="heading-base my-4 scroll-trigger animate--slide-in">
        {!! $title !!}
      </h1>

      @include('partials.entry-meta')
    </header>

    <div class="e-content container [&_p]:copy-base [&_h2]:subheader-base scroll-trigger animate--slide-in">
      @php(the_content())
    </div>

    @unless (empty($relatedPosts))
      <div class="related-articles container py-10">
        <h2 class="subheader-base pb-5 text-center">You May Also Like</h2>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-5">
          @foreach ($relatedPosts as $post)
            @include('partials.related-blog-post-card', ['data' => $post, 'cardType' => 'related'])
          @endforeach
        </div>
      </div>
    @endunless
  </article>
@endsection
