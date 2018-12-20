@if ($posts->count() > 0)

  @foreach ($posts as $post)

    @include('post.single_post')

  @endforeach

@else
  
  @include('post.no_posts')

@endif