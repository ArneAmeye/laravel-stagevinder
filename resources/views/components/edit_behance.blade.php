<form method="post" action="{{ route('student.update', $id) }}">
	{{ csrf_field() }}
    {{ method_field('patch') }}

	<input type="text" class="input" name="behance" placeholder="Behance portfolio URL" value="{{ $behanceUrl }}">
	<div class="button__center">
		<button class="button button--big" name="update_behance">Save</button>
		<a href="{{ url('students/') }}/{{ $id }}" class="button button--transparent">Cancel</a>
	</div>
</form>