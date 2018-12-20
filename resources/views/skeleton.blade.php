{{-- <div class="row m-0 mb-3 box-shadow-bottom">
  <div class="card w-100">
    <h6 class="card-header dtitle p-2">General informations
    <i class="fa fa-pencil-square-o env_edit pull-right" aria-hidden="true" data-toggle="modal" data-target="#simplemde"></i>
    </h6>
      <div class="card-body p-3">
        <p class="card-text text-justify">
          {!! $faq !!}
        </p>
      </div>
  </div>
</div> --}}

@include('top')

{{-- THREADS + COMMENTS--}}
<div class="container-fluid mb-5">
  <div class="row">
    <div class="col-md-3 px-0">

      @include('threads')

    </div>

    <div class="col-md-9 pr-0">

      @include('postscontainer')

    </div>
  </div>
</div>
