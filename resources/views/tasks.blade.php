<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tasks') }}
            </h2>
            <div class="flex">
                <a href="{{ route('tasks.create') }}">
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                        {{ __("Create New Task") }}
                    </button>
                </a>
            </div>
        </div>
    </x-slot>
    <section>
    @include('tasks.partials.open-tasks')
    </section>
    
    <section>
    @include('tasks.partials.closed-tasks')
    </section>


</x-app-layout>