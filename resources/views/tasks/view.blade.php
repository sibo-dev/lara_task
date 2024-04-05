<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task View') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $task->title }}
                </div>
            </div>
        <div class="p-6 text-gray-900">
                    {{ $task->description }}
                </div>
        </div>
        <form action="{{ route('tasks.edit', $task->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="completed" value="1">
                    <button input="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                        {{ __("Edit") }}
                    </button>
                </form>
                <form action="{{ route('tasks.delete', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button input="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded">
                        {{ __("Delete") }}
                    </button>
                </form>
    </div>


</x-app-layout>
