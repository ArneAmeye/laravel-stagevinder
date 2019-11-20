<form method="post" action="{{ route('student.update', $id) }}">
	{{ csrf_field() }}
    {{ method_field('patch') }}

	<div class="button__center">
		<button class="button button--big fab fa-dribbble" name="update_dribbble"> Connect</button>
		<a href="{{ url('students/') }}/{{ $id }}" class="button button--transparent">Cancel</a>
	</div>
</form>