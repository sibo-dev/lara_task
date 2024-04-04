<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>
    
    <div class="flex flex-col items-center justify-center">
        <form action="{{ route('tasks.save') }}" method="post">
            @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <br>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="description">Description</label>
            <br>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                {{ __("Create Task")}}
            </button>
        </form>
        </div>
        <br>
        <div>
            <a href="{{ route('tasks') }}">
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    {{ __("Cancel")}}
                </button>
            </a>
        </div>
    </div>
</x-app-layout>