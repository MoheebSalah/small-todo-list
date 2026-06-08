<x-layout>
    <x-slot:title>
        Tasks
    </x-slot:title>

    <div class="space-y-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <h2 class="text-sm font-semibold text-gray-500 mb-4 uppercase tracking-wide">
                    Pending
                </h2>

                <div class="space-y-3">
                    @forelse($pending as $task)
                        <x-task :task="$task"/>
                    @empty
                        <p class="text-gray-400 text-sm">No tasks here yet!</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <h2 class="text-sm font-semibold text-gray-500 mb-4 uppercase tracking-wide">
                    In Progress
                </h2>

                <div class="space-y-3">
                    @forelse($inProgress as $task)
                        <x-task :task="$task"/>
                    @empty
                        <p class="text-gray-400 text-sm">No tasks here yet!</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <h2 class="text-sm font-semibold text-gray-500 mb-4 uppercase tracking-wide">
                    Done
                </h2>

                <div class="space-y-3">
                    @forelse($done as $task)
                        <x-task :task="$task"/>
                    @empty
                        <p class="text-gray-400 text-sm">No tasks here yet!</p>
                    @endforelse
                </div>
            </div>

        </div>

        <div class="flex justify-center">
            <a href="/tasks/create"
               class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-medium hover:bg-indigo-700 transition shadow-sm">
                + Create a new task
            </a>
        </div>

    </div>

</x-layout>
