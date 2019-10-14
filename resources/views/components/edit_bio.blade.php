<form method="post" action="{{ route('student.update', $id) }}">
	{{ csrf_field() }}
    {{ method_field('patch') }}

	<textarea class="textarea" name="bio">{{ $bio }}</textarea>
	<div class="button__center">
		<button class="button button--big" name="update_bio">Save</button>
		<a href="{{ url('students/') }}/{{ $id }}" class="button button--transparent">Cancel</a>
	</div>
</form>