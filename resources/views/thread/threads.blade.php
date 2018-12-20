<div class="border card w-100">
  <h3 class="card-header dtitle p-2">Threads</h3>
  <div class="card-body p-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      
      @include('thread.threadlist')

    </div>
  </div>
  {{-- todo: only project owners are allowed to make new thread --}}
  {{--@if(Auth::user() && $project->owner == Auth::user()->id)--}}
  <div class="card-footer p-3">
    <span class="rt-badge badge badge-env" data-toggle="tooltip" data-placement="top" title="Admin panel"><i class="fa fa-exclamation-triangle"></i></span>
    <div class="input-group input-group-sm">
      <input name="thread_name" id="newThreadName" class="form-control" placeholder="Open new thread" aria-label="Open new theread" aria-describedby="btnAddNewThread" type="text">
      <div class="input-group-append">
        <button class="btn env_link_grey env_point input-group-text env_border_rslim" id="btnAddNewThread" type="submit" disabled="disabled">
          +
        </button>
      </div>
    </div>
  </div>
  {{--@endif--}}
</div>

@extrajs
<script type="text/javascript">
$(function () {

  // ******************************************************************
  // THREADS - thread names has to contain 3 or more characters
  $("#newThreadName").keyup(function(e){
    var keyCode = e.which;
    if($(this).val().length>3 && $(this).val().replace(/ /g, '') != '') {
      $("#btnAddNewThread").prop("disabled", false);
      // on enter create thread
      //if(keyCode==13) {
      if (e.keyCode == 10 || e.keyCode == 13) {
        $("#btnAddNewThread").trigger("click");
      }
    } else {
      $("#btnAddNewThread").prop("disabled", "disabled");
    }
  });

  // THREAD LIST LINKS
  $(".threadList").on('click', '.thread-link', function(e){
    e.preventDefault();
    $(".threadList a").removeClass("active");
    $.ajax({
      url: $(this).attr("href"),
      type: 'GET',
      complete: function(data) {
        $("#postsContainer").html(data.responseText);
      },
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    });
  });
  $(".threadList a:first-of-type").addClass("active");

  // NEW THREAD
  // todo: only project owners are allowed to make new thread
  {{--@if(Auth::user() && $project->owner == Auth::user()->id)--}}

    $("#btnAddNewThread").click(function() {
        $.ajax({
          url: '/thread/add/',
          type: 'POST',
          data: {'newThreadName': $('#newThreadName').val()},
          complete: function(data) {
            if(data.statusText=="OK") {
              $(".threadList").append(data.responseText);
              $("#newThreadName").val('');
              $(".threadList a:last-of-type").trigger("click");
              $("#noThreads").remove();
            }
          },
          headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        });
    });

  {{--@endif--}}

  
  // ******************************************************************
  // POSTS
  $('[data-toggle="tooltip"]').tooltip();
  $('html').on('click', '.btnReplyReveal', function(e){
    $(this).text($(this).text() == 'Reply' ? 'Cancel' : 'Reply');
    $(this).closest('.comment').find('.replyContainer').slideToggle("fast");
  });

  // NEW POST
  // todo: check if authenticated user and member of the project
  {{--@if(Auth::user() && $project->owner == Auth::user()->id)--}}

    $('html').on('keydown', "textarea.newPostContent", function(e){
      if($(this).val().length>1 && $(this).val().replace(/ /g, '') != '') {
        // on enter create thread
        if (e.ctrlKey && (e.keyCode == 10 || e.keyCode == 13)) {
          $(this).closest('.newCommentContainer').find('.btnAddNewComment').trigger("click");
        }
      }
    });


    $('html').on('click', '.btnAddNewComment', function() {
      var textarea = $(this).closest('.newCommentContainer').find('textarea.newPostContent');
      var newPostContent = textarea.val();
      //var newPostThread = $(this).attr("rel");
      var newPostThread = $("#threadId").val();
      var replyTo = $(this).data("replyto");

      $.ajax({
        url: '/post/add/',
        type: 'POST',
        data: {
          'newPostContent': newPostContent,
          'newPostThread': newPostThread,
          'replyTo': replyTo,
        },
        complete: function(data) {
          if(data.statusText=="OK") {
            textarea.val('');
            $("#posts").append(data.responseText);
            $('#emptyThread').remove();
            
            $("#posts").find(".btnReplyReveal").each(function(){
              if($(this).text() == 'Cancel') $(this).trigger("click");
            });
            
            var postReplied = $("#"+$("#posts .comment:last-of-type").attr("id"));
            var dest = postReplied.offset().top;
            $('html,body').animate({
                scrollTop: dest
            }, 500, 'swing');
            postReplied.addClass("_bpulse20");
            setTimeout(function() {postReplied.removeClass("_bpulse20")}, 6000);
          } else {
            console.log(data.responseText);
          }
        },
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      });

    });

    $('html').on('click', '.replytoLink', function(e) {
      e.preventDefault();
      var postReplied = $($(this).attr("href"));
      var dest = postReplied.offset().top-60;
      $('html,body').animate({
          scrollTop: dest
      }, 500, 'swing');
      postReplied.addClass("_bpulse20")
      setTimeout(function() {postReplied.removeClass("_bpulse20")}, 6000);
    });


    $('html').on('click', '.btnLike', function() {
      var postId = $(this).attr("rel");
      var likes = $(this).closest('.commandContainer').find('.numLikes');
      var likesNum = parseInt(likes.text());

      $.ajax({
        url: '/post/like/',
        type: 'POST',
        data: {
          'postId': postId
        },
        complete: function(data) {
          if(data.statusText=="OK") {
            likes.text(likesNum+parseInt(data.responseText));
          } else {
            console.log(data.responseText);
          }
        },
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      });
      
    });

  {{--@endif--}}


});
</script>
@endextrajs