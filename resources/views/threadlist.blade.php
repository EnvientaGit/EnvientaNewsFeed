<div class="threadList">

@if ($threads)

	@foreach ($threads as $t)

		@include('threadlink', array(
			'threadId' => $t->id,
			'threadTitle' => $t->title,
		))

	@endforeach

@endif

</div>