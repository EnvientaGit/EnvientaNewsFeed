<div class="newCommentContainer card w-100">

  {{--
  <h6 class="card-header dtitle p-2">
    <a href="" class="env_link"><i class="far fa-pencil env_color" aria-hidden="true"></i> New post </a>
           <a href="" class="env_link"><i class="fa fa-picture-o" aria-hidden="true"></i> Photo/video | </a>
    <a href="" class="env_link"><i class="fa fa-video-camera" aria-hidden="true"></i> Broadcast</a>
  </h6>
  --}}

  {{-- Comment section --}}
  <div class="card-footer bg-white border-0 pb-1">
    <div class="env_wrap">
      <div class="mr-3">
        <a href="https://www.gravatar.com/{{$avatar_hash}}" target="_blank">
          <img src="{{ "https://www.gravatar.com/avatar/" . $avatar_hash . "?s=100"}}" class="img-fluid img-thumbnail rounded-circle border mb-2" height="50" width="50">
        </a>
      </div>
      <div>
        <textarea class="newPostContent form-control" placeholder="What's on your mind? - Send with Ctrl/Command + Enter"></textarea>
      </div>
      <div class="ml-3">
        <button type="button" class="btnAddNewComment btn btn-light border btn-sm" style="margin-right: -0.3em;" @if ($post) data-replyto="{{ $post->id }}" @endif>
          @if ($post)
            Reply
          @else
            Post
          @endif
        </button>
        <br />
      </div>
    </div>
  </div>
</div>

