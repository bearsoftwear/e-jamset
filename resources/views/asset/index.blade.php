<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('assets.create') }}" class="rounded-lg border border-green-500 bg-green-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-green-700 hover:bg-green-700 focus:ring focus:ring-green-200 disabled:cursor-not-allowed disabled:border-green-300 disabled:bg-green-300">Create Asset</a>
        </h2>
    </x-slot>

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-3000" class="alert alert-success">
            <div class="absolute top-4 right-4 mx-auto max-w-[400px] rounded-xl border border-secondary-50 bg-white p-4 text-sm shadow-lg">
                <button @click="show = false" class="ttop-4 absolute right-4 ml-auto text-secondary-500 hover:text-secondary-900">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                    </svg>
                </button>
                <div class="flex space-x-4">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="pr-6 font-medium text-secondary-900">{{ session('success') }}</h4>
                        <div class="mt-1 text-secondary-500">{{ fake()->realText() }}</div>
                        {{-- <div class="mt-2 flex space-x-4">
                            <button class="inline-block font-medium leading-loose text-secondary-500 hover:text-secondary-900">Dismiss</button>
                            <button class="inline-block font-medium leading-loose text-primary-600 hover:text-primary-700">View more</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Assets List --}}
                    <ul role="list" class="divide-y divide-gray-100 grid grid-cols-2 gap-x-4">
                        @foreach ($assets as $asset)
                            <a href="{{ route('assets.show', $asset->id) }}" class="hover:bg-gray-100 rounded-lg border-none">
                                <li class="flex justify-between gap-x-6 py-5 px-2">
                                    <div class="flex min-w-0 gap-x-4">
                                        <img class="size-12 flex-none rounded-full bg-gray-50" src="{{ $asset->image }}" alt="">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm/6 font-semibold text-gray-900">{{ $asset->name }}</p>
                                            <p class="mt-1 text-xs/5 text-gray-500">{{ $asset->rental_price }} / Day
                                                <time datetime="2023-01-23T13:23Z">- Profit : {{ $asset->finished * $asset->rental_price }}</time>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                        <p class="text-sm/6 text-gray-900">{{ $asset->location }}</p>
                                        <p class="mt-1 text-xs/5 text-gray-500">
                                            <time datetime="2023-01-23T13:23Z">({{ $asset->waiting }} Waiting & {{ $asset->finished }} Finished)</time>
                                        </p>
                                    </div>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                    {{-- Assets List --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
