<x-app-layout>
<br>
<a href="{{ route('students.create') }}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+ Add Student</button>
</a>
     <br>   
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Class
                </th>
                <th scope="col" class="px-6 py-3">
                    Details
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $student->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $student->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $student->class }}
                </td>
                <td class="px-6 py-4">
                    {{ $student->details }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="{{ route('students.show', ['student' => $student->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    <form action="{{ route('students.destroy', ['student' => $student->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>
</div>

</x-app-layout>