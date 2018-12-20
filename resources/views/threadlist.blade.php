<div class="threadList">

@foreach ($threads as $t)
	@include('threadlink', array(
		'threadId' => $t->id,
		'threadTitle' => $t->title,
	))
@endforeach

</div>

@extrajs
<script type="text/javascript">
$(function () {
	$(".threadList").on('click', '.thread-link', function(e){
		e.preventDefault();
		$(".threadList a").removeClass("active");
		$.ajax({
			url: $(this).attr("href"),
			type: 'GET',
			complete: function(data) {
				$("#posts").html(data.responseText);
			},
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		});
	});
	$(".threadList a:first-of-type").trigger("click");
});
</script>
@endextrajs