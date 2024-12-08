<x-app-layout>
    <nav class="bg-gray-800 text-white shadow" x-data="{ open: false }">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="#" class="text-2xl font-bold">Manage Students</a>
            <ul class="hidden md:flex space-x-6">
                <li>
                    <a href="{{ route('admin.manage_students') }}" class="hover:text-gray-400">User Management</a>
                </li>
                <li>
                    <a href="{{url('create_evaluation')}}" class="hover:text-gray-400">Evaluation Forms</a>
                </li>
                <li>
                    <a href="{{url('show_feedbacks')}}" class="hover:text-gray-400">Feedback & Data</a>
                </li>
            </ul>
            <!-- Mobile Menu Button -->
            <button @click="open = !open" class="md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div x-show="open" class="md:hidden">
            <ul class="space-y-2 px-6 pb-4">
                <li>
                    <a href="{{ route('admin.manage-teachers') }}" class="block text-gray-200 hover:text-gray-400">User Management</a>
                </li>
                <li>
                    <a href="{{url('create_evaluation')}}" class="block text-gray-200 hover:text-gray-400">Evaluation Forms</a>
                </li>
                <li>
                    <a href="{{url('show_feedbacks')}}" class="block text-gray-200 hover:text-gray-400">Feedback & Data</a>
                </li>
            </ul>
        </div>
    </nav>
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-gray-800 shadow-md rounded-lg">
        <table class="min-w-full table-auto border-collapse border border-gray-700">
            <thead>
                <tr class="bg-gray-700 text-gray-200">
                    <th class="border border-gray-600 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-600 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-600 px-4 py-2 text-left">Email</th>
                    <th class="border border-gray-600 px-4 py-2 text-left">Role</th>
                    <th class="border border-gray-600 px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr class="text-gray-300 hover:bg-gray-700">
                        <td class="border border-gray-600 px-4 py-2">{{ $student->id }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->name }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->email }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->role }}</td>
                        <td class="border border-gray-600 px-4 py-2 text-center space-x-2">
                            <a href="{{ url('edit_student', $student->id) }}" class="text-blue-400 hover:underline">
                                Edit
                            </a>

                            <form action="{{ url('delete_student', $student->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="text-gray-500">
                        <td colspan="5" class="border border-gray-600 px-4 py-2 text-center">
                            No students found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4 flex justify-center">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:underline">Back to Dashboard</a>
    </div>
</x-app-layout>
