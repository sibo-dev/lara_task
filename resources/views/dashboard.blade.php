<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            <div class="float-right">
            <a href="{{ route('tasks') }}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                {{ __("View Your Tasks") }}
                </button>
            </a>
            </div>
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Open Tasks</h3>
                        <p>Display a list of open tasks here.</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Closed Tasks</h3>
                        <p>Display a list of closed tasks here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</x-app-layout>
