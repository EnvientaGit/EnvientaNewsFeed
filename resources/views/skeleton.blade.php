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

<div class="border border-warning rounded alert alert-light alert-dismissible fade show box-shadow-bottom border-secondary" role="alert">
    <div class="row">
      <img src="{{ URL::to('img/language.svg') }}" class="ml-3" height="70" alt="Alert!">
      <div class="right ml-4 text-primary">
        <strong>Hey there!</strong>
        <br>Please keep in mind that we are not tolerate any profanities, obscene, indecent behavior in the post sessions!
        <br>Thank you for your understanding!
      </div>
    </div>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" class="text-primary">&times;</span>
  </button>
</div>

{{-- THREADS + COMMENTS--}}
<div class="container-fluid mb-5">
  <div class="row">
    <div class="col-md-3 px-0">

      @include('threads')

    </div>

    <div class="col-md-9 pr-0">


      @include('posts')


    </div>
  </div>
</div>
