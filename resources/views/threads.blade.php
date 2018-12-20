<div class="border card w-100">
  <h3 class="card-header dtitle p-2">Threads</h3>
  <div class="card-body p-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      
      @include('threadlist')

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
  $("#newThreadName").keyup(function(){
    if($(this).val().length>3 && $(this).val().replace(/ /g, '') != '') {
      $("#btnAddNewThread").prop("disabled", false);
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
  $('html').on('click', '.reveal_write_back', function(e){
    $(this).text($(this).text() == 'Reply' ? 'Cancel' : 'Reply');
    $('#show_write_back').slideToggle("fast");
  });

  // NEW POST
  // todo: check if authenticated user and member of the project
  {{--@if(Auth::user() && $project->owner == Auth::user()->id)--}}

    $('html').on('click', '.btnAddNewComment', function() {
      var textarea = $(this).closest('.newCommentContainer').find('textarea.newPostContent');
      var newPostContent = textarea.val();
      var newPostThread = $(this).attr("rel");
      
      $.ajax({
        url: '/post/add/',
        type: 'POST',
        data: {
          'newPostContent': newPostContent,
          'newPostThread': newPostThread
        },
        complete: function(data) {
          if(data.statusText=="OK") {
            textarea.val('');
            $("#posts").append(data.responseText);
            $('#emptyThread').remove();
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