<div class="threadList">

@foreach ($threads as $t)
	@include('threadlink', array(
		'threadId' => $t->id,
		'threadTitle' => $t->title,
	))
@endforeach

</div>