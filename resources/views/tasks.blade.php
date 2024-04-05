<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>


    <div class="flex flex-col items-center justify-center">
        <a href="{{ route('tasks.create') }}">
            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                {{ __("Create New Task") }}
            </button>
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col items-center justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Open Tasks") }}
                </div>
            </div>

            @foreach($tasks as $task)
            @if($task->completed == 0)
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <!-- The href below must open the card in a new tab -->
                <a href="{{ route('tasks.view', $task->id) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $task->title }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $task->description }}</p>
                <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="completed" value="1">
                    <button input="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                        {{ __("Complete") }}
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
            @endif
            @endforeach

        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Completed Tasks") }}
                </div>
            </div>
            @foreach($tasks as $task)
            @if($task->completed)
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $task->title }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $task->description }}</p>
                <form action="{{ route('tasks.reopen', $task->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="completed" value="1">
                    <button input="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                        {{ __("Reopen") }}
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
            @endif
            @endforeach
        </div>
    </div>



</x-app-layout>