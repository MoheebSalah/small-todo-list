@props(['task'])

<div class="group bg-white border border-gray-200 rounded-xl p-4 shadow-sm hover:shadow-md transition space-y-3">

    <h1 class="text-gray-800 font-semibold text-xl group-hover:text-indigo-600 transition">
        {{ $task->title }}
    </h1>

    <p class="text-gray-600 text-sm font-semibold leading-relaxed">
        {{ $task->description }}
    </p>

    <p class="text-gray-600/50 text-xs leading-relaxed">
        Created By : {{ $task->user->name }}
    </p>

    <div class="flex justify-between items-center pt-2">

        @if(auth()->id() === $task->user->id)
            <a href="/tasks/{{ $task->id }}/edit"
               class="px-3 py-1.5 text-sm rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition font-medium">
                Edit
            </a>
            <form
                method="POST"
                action="/tasks/{{ $task->id }}"
                onclick="return confirm('Are you sure you want to delete this task?')"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="px-3 py-1.5 text-sm rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition font-medium cursor-pointer"
                >
                    Delete
                </button>
            </form>
        @endif

    </div>
</div>
