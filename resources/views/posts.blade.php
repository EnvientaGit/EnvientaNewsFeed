<div class="tab-content" id="posts">

  {{-- pane --}}
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

    <div class="border card w-100 box-shadow-bottom">
      <h3 class="card-header dtitle p-2"><i class="fa fa-comments env_color"></i> {{ $thread->title }}</h3>
      <div class="card-body p-0">

        <div class="card w-100">
          <h6 class="card-header dtitle p-2">
            <a href="" class="env_link"><i class="far fa-pencil env_color" aria-hidden="true"></i> New post </a>
            {{--       <a href="" class="env_link"><i class="fa fa-picture-o" aria-hidden="true"></i> Photo/video | </a>
            <a href="" class="env_link"><i class="fa fa-video-camera" aria-hidden="true"></i> Broadcast</a> --}}
          </h6>
          {{-- Comment section --}}
          <div class="card-footer bg-white border-0 pb-1">
            <div class="env_wrap">
              <div class="mr-3">
                <a href="https://www.gravatar.com/{{$avatar_hash}}" target="_blank">
                  <img src="{{ "https://www.gravatar.com/avatar/" . $avatar_hash . "?s=100"}}" class="img-fluid img-thumbnail rounded-circle border mb-2" height="50" width="50">
                </a>
              </div>
              <div>
                <textarea  class="form-control" placeholder="What's on your mind?"></textarea>
              </div>
              <div class="ml-3">
                <button type="button" class="btn btn-light border btn-sm" style="margin-right: -0.3em;">Post</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card-footer p-3">

        @include('50_project.52_newsfeed.feeds')

      </div>
    </div>

  </div>
  {{-- /pane --}}

</div>
