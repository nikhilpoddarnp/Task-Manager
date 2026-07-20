<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Task
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Title</label>
                        <input type="text" name="title" value="{{ old('title', $task->title) }}"
                               class="w-full border rounded p-2">
                        @error('title')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Description</label>
                        <textarea name="description" class="w-full border rounded p-2">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="mb-4 flex items-center gap-2">
                        <input type="checkbox" name="is_completed" value="1"
                               {{ $task->is_completed ? 'checked' : '' }}>
                        <label>Mark as completed</label>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Update Task
                    </button>
                    <a href="{{ route('tasks.index') }}" class="ml-2 text-gray-600">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>