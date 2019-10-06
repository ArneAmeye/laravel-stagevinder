<h1>Student List</h1>
@foreach($students as $student)
	<a href="./students/{{ $student->id }}">
		<p>
			{{ $student->firstname }}
		</p>
	</a>
@endforeach