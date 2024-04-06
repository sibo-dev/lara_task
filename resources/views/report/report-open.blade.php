<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="flex flex-col items-center justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("Open Tasks") }}
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($issues as $issue)
            @if ($issue['state'] == 'open')
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $issue['title'] }}</h2>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ __("Date Created: ") }}{{ $issue['created_at'] }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ __("Assignee: ") }}{{ $issue['assignee'] }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    <a href="{{ $issue['url'] }}" target="_blank" class="text-blue-500 hover:underline">{{ $issue['url'] }}</a>
                </p>
                <a href="{{ $issue['url'] }}" target="_blank">{{ $issue['url'] }}</a>
                </p>
                <hr class="my-2">
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $issue['body'] }}</p>
                <div class="flex">
                    <form action="" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="closed_at" value="{{ now() }}">
                        <button input="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                            {{ __("Close") }}
                        </button>
                    </form>
                    <div class="mx-2"></div> <!-- Add a small gap between the buttons -->
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button input="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded">
                            {{ __("Delete") }}
                        </button>
                    </form>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>