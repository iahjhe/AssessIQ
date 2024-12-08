<x-app-layout>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-500 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('student.add_evaluation') }}" method="POST" class="bg-gray-800 p-6 shadow-md rounded-lg">
        @csrf
        <!-- Teacher Dropdown -->
        <div class="mb-4">
            <label for="teacher_id" class="block text-white">Teacher</label>
            <select name="teacher_id" id="teacher_id" class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-black" required>
                <option value="" disabled selected>Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
            @error('teacher_id')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Subject -->
        <div class="mb-4">
            <label for="subject" class="block text-white">Subject</label>
            <input type="text" name="subject" id="subject" class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-black" required>
            @error('subject')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Rating -->
        <div class="mb-4">
            <label for="rating" class="block text-white">Rating</label>
            <input type="number" name="rating" id="rating" min="1" max="5" class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-black" required>
            @error('rating')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Feedback -->
        <div class="mb-4">
            <label for="feedback" class="block text-white">Feedback</label>
            <textarea name="feedback" id="feedback" class="w-full px-4 py-2 border rounded-lg bg-gray-700 text-black" rows="4"></textarea>
            @error('feedback')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mb-4 text-center">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Submit Evaluation</button>
        </div>
    </form>

    <div class="mt-4 flex justify-center">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:underline">Back to Dashboard</a>
    </div>
</x-app-layout>
