<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5x1 mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in as") }} {{ Auth::user()->name }}
                </div>
                <div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                        {{ __("View Your Tasks") }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Message From the author: Use the following space to display any additional information or links to other parts of your application.
                    Perhaps task history or most commonly completed or repeated tasks and a graph.
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</x-app-layout>
