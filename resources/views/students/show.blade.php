<x-app-layout>
<h1>Student Details</h1>
    <p>Name: {{ $student->name }}</p>
    <p>Email: {{ $student->email }}</p>
    <p>Class: {{ $student->class }}</p>
    <p>Details: {{ $student->details }}</p>
    <a href="{{ route('students.edit', ['student' => $student->id]) }}">Edit</a>

    <!-- Add a form to delete the student here -->
    <form action="{{ route('students.destroy', ['student' => $student->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</x-app-layout>