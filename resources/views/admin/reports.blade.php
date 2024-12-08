<x-app-layout>
    <nav class="bg-gray-800 text-white shadow" x-data="{ open: false }">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="#" class="text-2xl font-bold">Reports and Analytics</a>
            <ul class="hidden md:flex space-x-6">
                <li>
                    <a href="{{ route('admin.manage-teachers') }}" class="hover:text-gray-400">User Management</a>
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

    <div class="p-6 bg-gray-800 shadow-md rounded-lg">

    
        <div class="mt-4 text-gray-400">
            <p>Total Students: {{ $totalStudents }}</p>
            <p>Total Teachers: {{ $totalTeachers }}</p>
            <p>Total Feedbacks: {{ $totalFeedbacks }}</p>
        </div>
    
        <div class="mt-4">
            <h3 class="text-lg font-semibold text-gray-400">Average Ratings per Teacher</h3>
            <table class="min-w-full table-auto border-collapse border border-gray-700">
                <thead>
                    <tr class="bg-gray-700 text-gray-400">
                        <th class="border border-gray-600 px-4 py-2 text-left">Teacher</th>
                        <th class="border border-gray-600 px-4 py-2 text-center">Average Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($averageRatings as $rating)
                        <tr class="text-gray-400 hover:bg-gray-700">
                            <td class="border border-gray-600 px-4 py-2">{{ $rating->teacher->name ?? 'N/A' }}</td>
                            <td class="border border-gray-600 px-4 py-2 text-center">{{ number_format($rating->avg_rating, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

    <div class="mt-4 flex justify-center">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:underline">Back to Dashboard</a>
    </div>
</x-app-layout>
