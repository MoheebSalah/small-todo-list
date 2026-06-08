<x-layout>
    <x-slot:title>
        Edit Task
    </x-slot:title>

    <div class="min-h-[70vh] flex items-center justify-center px-4">

        <form method="POST" action="/tasks/{{ $task->id }}"
              class="w-full max-w-md bg-white border border-gray-200 shadow-lg rounded-2xl p-8 space-y-5">

            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold text-center text-gray-800">
                Edit Task
            </h1>

            <div>
                <input
                    type="text"
                    name="title"
                    value="{{ $task->title }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('title') border-red-500 @enderror"
                >

                @error('title')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <textarea
                name="description"
                rows="4"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
            >{{ $task->description }}</textarea>

            @error('message')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror

            <select name="status"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>
                    In Progress
                </option>

                <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>
                    Done
                </option>

            </select>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-lg transition">
                Save Changes
            </button>

            <a href="/tasks"
               class="block text-center w-full py-3 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                Cancel
            </a>

        </form>

    </div>
</x-layout>
