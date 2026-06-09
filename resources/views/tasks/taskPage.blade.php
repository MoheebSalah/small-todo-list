<x-layout>
    <x-slot:title>
        {{ $task->title }}
    </x-slot:title>

    <div class="min-h-[70vh] flex items-center justify-center px-4 bg-gray-50">

        <div class="w-full max-w-2xl bg-white border border-gray-200 shadow-lg rounded-2xl p-8 space-y-6">

            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        {{ $task->title }}
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Task Details
                    </p>
                </div>

                <span class="
                    px-3 py-1 text-xs font-semibold rounded-full
                    {{ $task->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                    {{ $task->status === 'in_progress' ? 'bg-blue-100 text-blue-700' : '' }}
                    {{ $task->status === 'done' ? 'bg-green-100 text-green-700' : '' }}
                ">
                    {{ str_replace('_', ' ', ucfirst($task->status)) }}
                </span>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-gray-700 mb-2">
                    Description
                </h2>
                <p class="text-gray-600 leading-relaxed">
                    {{ $task->description }}
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-gray-100">

                <div class="bg-gray-50 rounded-xl p-4">
                    <p class="text-xs text-gray-500">Created At</p>
                    <p class="text-sm font-medium text-gray-800">
                        {{ $task->created_at->format('Y-m-d H:i') }}
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-4">
                    <p class="text-xs text-gray-500">Last Edited</p>
                    <p class="text-sm font-medium text-gray-800">
                        {{ $task->updated_at->format('Y-m-d H:i') }}
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-4 sm:col-span-2">
                    <p class="text-xs text-gray-500">Created By</p>
                    <p class="text-sm font-medium text-gray-800">
                        {{ $task->user->name }}
                    </p>
                </div>

            </div>

            <!-- Actions -->
            <div class="flex gap-3 pt-4">

                @if(auth()->id() === $task->user_id)
                <a href="/tasks/{{ $task->id }}/edit"
                   class="flex-1 text-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-lg transition">
                    Edit Task
                </a>

                <!-- DELETE BUTTON -->
                <form method="POST"
                      action="/tasks/{{ $task->id }}"
                      class="flex-1"
                      onsubmit="return confirm('Are you sure you want to delete this task? This action cannot be undone.')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="w-full text-center bg-red-600 hover:bg-red-700 text-white font-medium py-3 rounded-lg transition">
                        Delete Task
                    </button>

                </form>
                @endif

                <a href="/tasks"
                   class="flex-1 text-center border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium py-3 rounded-lg transition">
                    Back
                </a>

            </div>

        </div>

    </div>
</x-layout>
