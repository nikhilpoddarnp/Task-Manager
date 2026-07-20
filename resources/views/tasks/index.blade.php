<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Tasks
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('tasks.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
                + Add New Task
            </a>

            <div class="bg-white shadow rounded-lg p-6 mt-4">
                @forelse ($tasks as $task)
                    <div class="flex justify-between items-center border-b py-3">
                        <div>
                            <h3 class="font-bold {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                                {{ $task->title }}
                            </h3>
                            <p class="text-sm text-gray-600">{{ $task->description }}</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No tasks yet. Add your first task!</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>