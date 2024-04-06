<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EditTask') }}
        </h2>
    </x-slot>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{ __("Whoops!") }}</strong>
        <span class="block sm:inline">{{ __("There were some problems with your input.") }}</span>
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="flex flex-col items-center justify-center">
        <form action="{{ route('tasks.edit', $task->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <br>
                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <br>
                <textarea name="description" id="description" class="form-control" placeholder="{{ $task->description }}"></textarea>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                    {{ __("Update Task")}}
                </button>
                <a href="{{ route('tasks.view', $task->id) }}">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        {{ __("Cancel")}}
                    </button>
                </a>
            </div>
        </form>
    </div>
</x-app-layout>