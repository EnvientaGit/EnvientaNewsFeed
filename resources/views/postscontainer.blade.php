<div class="tab-content" id="postsContainer">

  {{-- pane --}}
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

    <div class="border card w-100 box-shadow-bottom">
      <h3 class="card-header dtitle p-2"><i class="fa fa-comments env_color"></i> @if ($thread) {{ $thread->title  }} @else No threads @endif</h3>
      
      <div class="newComment card-body p-0">
        
        @if ($thread)
        
          @include('post.new_comment')

        @else

          @include('no_threads')

        @endif

      </div>

      <div class="card-footer p-3" id="posts">

        @if ($thread)

          @include('post.posts')

        @endif

      </div>
    </div>

  </div>
  {{-- /pane --}}

</div>

