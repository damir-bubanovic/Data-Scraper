<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Scraper') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- <form> --}}
									<form action="/scraper" method="POST">
					            @csrf
					            <div class="mb-4">
					                <label for="url" class="block text-gray-700 font-medium mb-2">URL to Scrape</label>
					                <input type="url" id="url" name="url" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500">
					            </div>
					            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Scrape Data</button>
					        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>