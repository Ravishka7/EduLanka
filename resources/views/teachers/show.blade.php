<x-app-layout>
<h1>Teacher Details</h1>
    <p>Name: {{ $teacher->name }}</p>
    <p>Email: {{ $teacher->email }}</p>
    <p>Class: {{ $teacher->class }}</p>
    <p>Details: {{ $teacher->details }}</p>
    <a href="{{ route('teachers.edit', ['teacher' => $teacher->id]) }}">Edit</a>

    <!-- Add a form to delete the teacher here -->
    <form action="{{ route('teachers.destroy', ['teacher' => $teacher->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</x-app-layout>