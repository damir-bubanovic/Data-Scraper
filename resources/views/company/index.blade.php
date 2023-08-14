<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                	@if (count($companies))
                		<ul class="space-y-2">
	                		@foreach ($companies as $company)
					                <li class="text-gray-700">
					                    <p><strong>Company:</strong> {{ $company['company'] }}</p>
					                    <p><strong>Contact:</strong> {{ $company['contact'] }}</p>
					                    <p><strong>Country:</strong> {{ $company['country'] }}</p>
					                </li>
					                <hr>
					            @endforeach
				          	</ul>
				          @else
				          	<p class="text-gray-700">No data available.</p>
                	@endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>