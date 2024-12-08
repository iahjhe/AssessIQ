<x-app-layout>

        
        <nav class="bg-gray-800 text-white shadow" x-data="{ open: false }">
            <div class="container mx-auto flex justify-between items-center py-4 px-6">
                <a href="#" class="text-2xl font-bold">All Feedbacks</a>
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

    
    <div class="bg-gray-800 p-6 shadow-md rounded-lg">
        @if($feedbacks->isEmpty())
            <p class="text-gray-400 text-center">No feedback available.</p>
        @else
            <ul class="space-y-4">
                @foreach($feedbacks as $feedback)
                    <li class="bg-gray-700 p-4 rounded-lg text-white">
                        <p>{{ $feedback->feedback }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mt-4 flex justify-center">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:underline">Back to Dashboard</a>
    </div>
</x-app-layout>
