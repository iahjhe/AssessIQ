<x-app-layout>
    <!-- Navbar -->
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

    <!-- Main Content -->
    <div class="container mx-auto py-12 space-y-12 px-6">
        <!-- User Management Section -->
        <section id="user-management" class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">User Management</h2>
            <p class="text-gray-600 mb-6">Manage admin, teacher, and student accounts efficiently.</p>
            <div class="space-y-4">
                {{-- <a href="/admin/create-admin" class="block text-blue-600 hover:underline">
                    ➡️ Create Admin Accounts
                </a> --}}
                <a href="{{ route('admin.manage-teachers') }}" class="block text-blue-600 hover:underline">
                    ➡️ Manage Teacher Accounts
                </a>
                <a href="{{ route('admin.manage_students') }}" class="block text-blue-600 hover:underline">
                    ➡️ Manage Student Accounts
                </a>
            </div>
        </section>

        <!-- Evaluation Form Management Section -->
        <section id="evaluation-management" class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Evaluation Form Management</h2>
            <p class="text-gray-600 mb-6">Create and manage evaluation forms with ease.</p>
            <div class="space-y-4">
                <a href="{{url('create_evaluation')}}" class="block text-blue-600 hover:underline">
                    ➡️ Evaluation Form
                </a>
                <a href="{{url('show_evaluation')}}" class="block text-blue-600 hover:underline">
                    ➡️ Show Evaluations
                </a>
            </div>
        </section>

        <!-- Feedback and Evaluation Data Section -->
        <section id="feedback-data" class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Feedback and Evaluation Data</h2>
            <p class="text-gray-600 mb-6">View and analyze all submitted feedback and evaluations.</p>
            <div class="space-y-4">
                <a href="{{url('show_feedbacks')}}" class="block text-blue-600 hover:underline">
                    ➡️ View Submitted Feedbacks
                </a>
                <a href="{{url('show_reports')}}" class="block text-blue-600 hover:underline">
                    ➡️ Generate Reports & Analytics
                </a>
            </div>
        </section>
    </div>
</x-app-layout>
