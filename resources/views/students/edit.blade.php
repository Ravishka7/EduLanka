<x-app-layout>
    <!-- component -->
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
  <div class="container max-w-screen-lg mx-auto">
    <div>
      <h2 class="font-semibold text-xl text-gray-600">Edit Student Details</h2>
      <br>
      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
          <div class="text-gray-600">
            <p class="font-medium text-lg">Personal Details</p>
            <p>Please fill out all the fields.</p>
          </div>



          <form action="{{ route('students.update', ['student' => $student->id]) }}" method="POST">
            @csrf
            @method('PUT')

          <div class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                         
              <div class="md:col-span-5">
                <label for="name">Full Name</label>
                <input type="text" name="name" value="{{ $student->name }}"  id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required/>
              </div>

              <div class="md:col-span-3">
                <label for="class">Class</label>
                <input type="text" name="class" value="{{ $student->class }}" id="class" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" />
              </div>

              <div class="md:col-span-2">
                <label for="phone">Phone</label>
                <input type="text" name="phone" value="{{ $student->phone }}" id="phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" />
              </div>

              <div class="md:col-span-5">
                <label for="email">Email Address</label>
                <input type="text" name="email" value="{{ $student->email }}" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  placeholder="email@domain.com" required/>
              </div>

              <div class="md:col-span-5">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ $student->address }}" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" />
              </div>

              <div class="md:col-span-5">
                <label for="guardian_name">Guardian Name</label>
                <input type="text" name="guardian_name" value="{{ $student->guardian_name }}" id="guardian_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" />
              </div>
     
              <div class="md:col-span-5 text-right">
                <div class="inline-flex items-end">
                  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                </div>
              </div>

            </div>
          </div>
          </form>


          
        </div>
      </div>
    </div>

    <a href="https://www.buymeacoffee.com/dgauderman" target="_blank" class="md:absolute bottom-0 right-0 p-4 float-right">
      <img src="https://www.buymeacoffee.com/assets/img/guidelines/logo-mark-3.svg" alt="Buy Me A Coffee" class="transition-all rounded-full w-14 -rotate-45 hover:shadow-sm shadow-lg ring hover:ring-4 ring-white">
    </a>
  </div>
</div>
</x-app-layout>