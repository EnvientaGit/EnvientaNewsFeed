<div class="border card w-100">
  <h3 class="card-header dtitle p-2">Threads</h3>
  <div class="card-body p-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      
      @include('threadlist')

    </div>
  </div>
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
  $("#newThreadName").keyup(function(){
    if($(this).val().length>3 && $(this).val().replace(/ /g, '') != '') {
      $("#btnAddNewThread").prop("disabled", false);
    } else {
      $("#btnAddNewThread").prop("disabled", "disabled");
    }
  });

  {{--@if(Auth::user() && $project->owner == Auth::user()->id)--}}

    $("#btnAddNewThread").click(function() {
        $.ajax({
          url: '/thread/add/',
          type: 'POST',
          data: {'newThreadName': $('#newThreadName').val()},
          complete: function(data) {
            console.log("complete: ");
            console.log(data);
            //$('#posts').load('thread/'+data);
            $("#newThreadName").val('');
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