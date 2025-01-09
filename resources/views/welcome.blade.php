<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900">
                    {{-- Assets List --}}
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach($assets as $asset)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="size-12 flex-none rounded-full bg-gray-50"
                                         src="{{ $asset->image }}"
                                         alt="">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm/6 font-semibold text-gray-900">{{ $asset->name }}</p>
                                        <p class="mt-1 truncate text-xs/5 text-gray-500">
                                            {{ $asset->lander->name }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm/6 text-gray-900">{{ $asset->location }}</p>
                                    <p class="mt-1 text-xs/5 text-gray-500">{{ $asset->rental_price }}
                                        <time datetime="2023-01-23T13:23Z">/ Day</time>
                                    </p>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                    {{-- Assets List --}}
                </div>
                {{-- Pagination --}}
                {{ $assets->onEachSide(1)->links() }}
                {{-- Pagination --}}
            </div>
        </div>
    </div>
</x-app-layout>
