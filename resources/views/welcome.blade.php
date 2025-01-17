<?php

use App\Models\Asset;

$assets = Asset::with('lander')->paginate(12);
?>

<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Assets List --}}
                    <div class="grid grid-cols-4 gap-4">
                        @foreach($assets as $asset)
                            <a href="{{ route('assets.show', $asset->id) }}">
                                <div class="relative mx-auto max-w-md overflow-hidden rounded-lg bg-white shadow">
                                    <div>
                                        <img src="{{ $asset->image }}" class="w-full object-cover" alt=""/>
                                    </div>
                                    <div class="absolute inset-0 z-10 bg-gradient-to-t from-black"></div>
                                    <div class="absolute inset-x-0 bottom-0 z-20 p-4">
                                        <p class="text-sm text-white text-opacity-80">{{ $asset->lander->name }}
                                        </p>
                                        <h3 class="text-xl font-medium text-white">{{ $asset->name }}</h3>
                                        <p class="text-white text-opacity-80">{{ $asset->location }}</p>
                                        <p class="mt-2 text-xs text-white text-opacity-80">
                                            {{ "Rp".number_format($asset->rental_price, 0, ',', '.'). " / Day" }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>
                {{-- Pagination --}}
                {{ $assets->onEachSide(1)->links() }}
                {{-- Pagination --}}
            </div>
        </div>
    </div>
</x-app-layout>
