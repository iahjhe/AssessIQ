<x-app-layout>
<nav class="bg-gray-800 text-white shadow" x-data="{ open: false }">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="#" class="text-2xl font-bold">Admin Panel</a>
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
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-gray-800 p-6 shadow-md rounded-lg flex justify-center">
        <table class="min-w-full border-collapse border border-gray-700 mx-auto">
            <thead>
                <tr class="bg-gray-700 text-gray-400">
                    <th class="border border-gray-600 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-600 px-4 py-2 text-left">Evaluator</th>
                    <th class="border border-gray-600 px-4 py-2 text-left">Teacher</th>
                    <th class="border border-gray-600 px-4 py-2 text-left">Subject</th>
                    <th class="border border-gray-600 px-4 py-2 text-center">Rating</th>
                    <th class="border border-gray-600 px-4 py-2 text-left">Feedback</th>
                    <th class="border border-gray-600 px-4 py-2 text-center">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($evaluations as $evaluation)
                    <tr class="text-gray-400 hover:bg-gray-700">
                        <td class="border border-gray-600 px-4 py-2">{{ $evaluation->id }}</td>
                        <td class="border border-gray-600 px-4 py-2">
                            {{ $evaluation->evaluator->name ?? 'N/A' }}
                        </td>
                        <td class="border border-gray-600 px-4 py-2">
                            {{ $evaluation->teacher->name ?? 'N/A' }}
                        </td>
                        <td class="border border-gray-600 px-4 py-2">{{ $evaluation->subject }}</td>
                        <td class="border border-gray-600 px-4 py-2 text-center">{{ $evaluation->rating }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $evaluation->feedback ?? 'No feedback' }}</td>
                        <td class="border border-gray-600 px-4 py-2 text-center">
                            {{ $evaluation->created_at->format('M d, Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="border border-gray-600 px-4 py-2 text-center text-gray-500">
                            No evaluations found.
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
