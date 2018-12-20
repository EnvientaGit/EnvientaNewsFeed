{{-- Posted section --}}
<div class="row m-0 mb-3 box-shadow-bottom">
  <div class="card w-100">
    <h6 class="card-header dtitle p-2 bg-white border-0">
      <!-- Split dropleft button -->
      <div class="env_wrap">
        <div class="mr-3">
          <a href="https://www.gravatar.com/{{$avatar_hash}}" target="_blank" class="pull-left">
          <img src="{{ "https://www.gravatar.com/avatar/" . $avatar_hash . "?s=100"}}"
            class="img-fluid img-thumbnail rounded-circle border mt-2" height="50" width="50"
            style="margin-left: 0.7em;">
          </a>
        </div>
        <div class="pull-left mt-2">
          <a href="https://www.gravatar.com/{{$avatar_hash}}" class="env_link">
            <strong>Mate Molnar</strong>
          </a><br>
          <small>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
        </div>
        <div class="pull-left ml-3 mt-2">

          <div class="btn-group pull-right">
            <div class="btn-group dropleft" role="group">
              <i type="button" class="fa fa-ellipsis-h text-info dropdown-toggle-split env_point"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </i>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">
                  <i class="fa fa-bookmark-o" aria-hidden="true"></i> Save post
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Embed</a>
                <a class="dropdown-item" href="#">Turn on notifications for this post</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="fa fa-exclamation" aria-hidden="true"></i> Report post
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </h6>
      <div class="card-body p-3 bg-white env_wrap">
          <div class="form-group w-100 mb-0">
            <p class="text-justify">
              {{ $post->content }}
            </p>
            <hr class="my-0">
            <span>
              <button type="button" class="btn btn-outline-primary btn-sm pull-left my-3">
                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Like</button>
              <span class="text-primary btn-sm pull-left my-3 ml-2">
                <i class="fa fa-thumbs-up" aria-hidden="true"></i> 4</span>
              <button type="button" class="reveal_write_back btn btn-light btn-sm pull-right my-3 border">Reply</button>
            </span>
          </div>
      </div>

      {{-- Write_reply --}}
      <div id="show_write_back" class="card-footer grady pb-1" style="display: none;">
        @include('post.write_reply')
      </div>


      {{-- Commented Section 
      @include('post.commented')
      --}}

      {{-- Replied Section 
      @include('post.replied')
      --}}

      {{-- Re-Replied Section 
      @include('post.re_replied')
      --}}

  </div>
</div>
