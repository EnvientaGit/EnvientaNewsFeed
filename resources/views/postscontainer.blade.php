<div class="tab-content" id="postsContainer">

  {{-- pane --}}
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

    <div class="border card w-100 box-shadow-bottom">
      <h3 class="card-header dtitle p-2"><i class="fa fa-comments env_color"></i> {{ $thread->title }}</h3>
      
      <div class="newComment card-body p-0">

        @include('post.new_comment')

      </div>

      <div class="card-footer p-3" id="posts">

        @include('post.posts')

      </div>
    </div>

  </div>
  {{-- /pane --}}

</div>

