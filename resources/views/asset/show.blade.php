<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-white">
                        <div>
                            <div class="flex flex-row">
                                <div class="flex-col max-w-2xl items-center px-4 sm:px-6 lg:max-w-7xl lg:px-8 basis-2/3">
                                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                                        {{ $asset->name }}
                                    </h1>
                                    <h3 class="text-gray-500">{{ $asset->location }}</h3>
                                </div>
                                @if(auth()->user()->hasRole('lander') && $asset->user_id === auth()->id())
                                    <div class="flex basis-1/3 items-center justify-end">
                                        <x-button-edit href="#" class="sm:ml-3" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-asset')">
                                            Edit
                                        </x-button-edit>
                                        <x-danger-button class="sm:ml-3" x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete-asset')">
                                            Delete
                                        </x-danger-button>
                                        {{-- MODAL EDIT --}}
                                        <x-modal name="edit-asset" :show="$errors->assetStore->isNotEmpty()" focusable>
                                            <form method="post" action="{{ route('assets.update', $asset->id) }}" class="p-6">
                                                @csrf
                                                @method('patch')

                                                <h2 class="text-lg font-medium text-gray-900">
                                                    {{ __('Asset Information') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ __("Update your asset information.") }}
                                                </p>

                                                <div class="mt-6">
                                                    <x-input-label for="name" :value="__('Name')"/>
                                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $asset->name)" required autocomplete="off"/>
                                                    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                                                </div>

                                                <div class="mt-6">
                                                    <x-input-label for="location" :value="__('Location')"/>
                                                    <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', $asset->location)" required autocomplete="off"/>
                                                    <x-input-error class="mt-2" :messages="$errors->get('location')"/>
                                                </div>

                                                <div class="mt-6">
                                                    <x-input-label for="rental_price" :value="__('Rental Price')"/>
                                                    <x-text-input id="rental_price" name="rental_price" type="text" class="mt-1 block w-full" :value="old('rental_price', $asset->rental_price)" required autocomplete="off"/>
                                                    <x-input-error class="mt-2" :messages="$errors->get('rental_price')"/>
                                                </div>

                                                <div class="mt-6">
                                                    <x-input-label for="image" :value="__('Image')"/>
                                                    <x-text-input id="image" name="image" type="text" class="mt-1 block w-full" :value="old('image', $asset->image)" required autocomplete="off"/>
                                                    <x-input-error class="mt-2" :messages="$errors->get('Image')"/>
                                                </div>

                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancel') }}
                                                    </x-secondary-button>

                                                    <x-primary-button class="ms-3">
                                                        {{ __('Update Asset') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </x-modal>

                                        <x-modal name="delete-asset" :show="$errors->assetDelete->isNotEmpty()" focusable>
                                            <form method="post" action="{{ route('assets.destroy', $asset->id) }}" class="p-6">
                                                @csrf
                                                @method('delete')

                                                <h2 class="text-lg font-medium text-gray-900">
                                                    {{ __('Are you sure you want to delete your asset?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ __('Once your asset is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your asset.') }}
                                                </p>

                                                <div class="mt-6">
                                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only"/>
                                                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" placeholder="{{ __('Password') }}"/>
                                                    <x-input-error :messages="$errors->assetDelete->get('password')" class="mt-2"/>
                                                </div>

                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancel') }}
                                                    </x-secondary-button>

                                                    <x-danger-button class="ms-3">
                                                        {{ __('Delete Asset') }}
                                                    </x-danger-button>
                                                </div>
                                            </form>
                                        </x-modal>
                                        {{-- MODAL --}}
                                    </div>
                                @endif

                            </div>

                            <!-- Image gallery -->
                            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                                <img src="{{ $asset->image }}" alt="Two each of gray, white, and black shirts laying flat." class="hidden size-full rounded-lg object-cover lg:block">
                                <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                                    <img src="{{ $asset->image }}" alt="Model wearing plain black basic tee." class="aspect-[3/2] w-full rounded-lg object-cover">
                                    <img src="{{ $asset->image }}" alt="Model wearing plain gray basic tee." class="aspect-[3/2] w-full rounded-lg object-cover">
                                </div>
                                <img src="{{ $asset->image }}" alt="Model wearing plain white basic tee." class="aspect-[4/5] size-full object-cover sm:rounded-lg lg:aspect-auto">
                            </div>

                            <!-- Product info -->
                            <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto_auto_1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                                    {{-- CALENDAR --}}
                                    <div id="calendar"></div>
                                    {{-- CALENDAR --}}
                                </div>

                                <!-- Options -->
                                <div class="mt-4 lg:row-span-3 lg:mt-0">
                                    <h2 class="sr-only">Product information</h2>
                                    <p class="text-3xl tracking-tight text-gray-900">
                                        {{ 'Rp' . number_format($asset->rental_price, 0, ',', '.') . ' / Day' }}
                                    </p>

                                    <!-- Reviews -->
                                    <div class="mt-6">
                                        <h3 class="sr-only">Reviews</h3>
                                        <div class="flex items-center">
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($asset->star_rating >= $i)
                                                        <!-- Full star -->
                                                        <svg class="size-5 shrink-0 text-gray-900" viewBox="0 0 20 20"
                                                             fill="currentColor" aria-hidden="true" data-slot="icon">
                                                            <path fill-rule="evenodd"
                                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    @elseif ($asset->star_rating > $i - 1)
                                                        <!-- Half star -->
                                                        <svg class="size-5 shrink-0 text-gray-900" viewBox="0 0 20 20"
                                                             fill="currentColor" aria-hidden="true"
                                                             style="clip-path: inset(0 50% 0 0);">
                                                            <path fill-rule="evenodd"
                                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    @else
                                                        <!-- Empty star -->
                                                        <svg class="size-5 shrink-0 text-gray-200" viewBox="0 0 20 20"
                                                             fill="currentColor" aria-hidden="true" data-slot="icon">
                                                            <path fill-rule="evenodd"
                                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    @endif
                                                @endfor
                                            </div>
                                            <p class="sr-only">2 out of 5 stars</p>
                                            <a href="#"
                                               class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{ $asset->reviewer }}
                                                reviews</a>
                                        </div>
                                    </div>

                                    @auth
                                        <form class="mt-10" method="post" action="{{ route('transaction.store') }}">
                                            @csrf
                                            <div class="mx-auto mt-5">
                                                <div>
                                                    <x-input-label for="event" :value="__('Event')"/>
                                                    <x-text-input id="event" class="block mt-1 w-full" type="text" name="event" :value="old('event') ? old('event') : fake()->jobTitle()" required autocomplete="off"/>
                                                    <x-input-error :messages="$errors->get('event')" class="mt-2"/>
                                                </div>
                                            </div>
                                            <div class="mx-auto mt-5">
                                                <h3 class="text-sm font-medium text-gray-900">Date</h3>
                                                {{-- date range picker --}}
                                                <div class="relative max-w-sm mt-2">
                                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                             viewBox="0 0 20 20">
                                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                        </svg>
                                                    </div>
                                                    <input name="date" id="flatpickr-range" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date"
                                                           value="{{  old('date') }}">
                                                </div>
                                                <x-input-error :messages="$errors->get('date')" class="mt-2"/>
                                                {{-- date range picker --}}
                                            </div>
                                            <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                                            <input type="hidden" name="start_date" id="start_date" value="{{ old('start_date') }}">
                                            <input type="hidden" name="finish_date" id="finish_date" value="{{ old('finish_date') }}">


                                            <button type="submit"
                                                    class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                Reserve
                                            </button>
                                        </form>
                                    @endauth
                                </div>

                                <div
                                        class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                                    <!-- Description and details -->
                                    <div>
                                        <h3 class="sr-only">Description</h3>

                                        <div class="space-y-6">
                                            <p class="text-base text-gray-900">
                                                {{ fake()->realText(500) }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="mt-10">
                                        <h3 class="text-sm font-medium text-gray-900">Highlights</h3>

                                        <div class="mt-4">
                                            <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                                <li class="text-gray-400"><span class="text-gray-600">Hand cut and
                                                        sewn locally</span></li>
                                                <li class="text-gray-400"><span class="text-gray-600">Dyed with our
                                                        proprietary colors</span></li>
                                                <li class="text-gray-400"><span class="text-gray-600">Pre-washed &amp;
                                                        pre-shrunk</span></li>
                                                <li class="text-gray-400"><span class="text-gray-600">Ultra-soft 100%
                                                        cotton</span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="mt-10">
                                        <h2 class="text-sm font-medium text-gray-900">Details</h2>

                                        <div class="mt-4 space-y-6">
                                            <p class="text-sm text-gray-600">
                                                {{ fake()->realText() }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: @json($events),
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                });
                calendar.render();
            });

            window.addEventListener('load', function () {
                // Range Date Picker
                flatpickr('#flatpickr-range', {
                    mode: 'range',
                    altInput: true,
                    altFormat: "j F Y",
                    dateFormat: 'Y-m-d',
                    disable: @json($disableDates),
                    onChange: function (selectedDates, dateStr, instance) {
                        document.getElementById('start_date').value = instance.formatDate(selectedDates[0], 'Y-m-d');
                        document.getElementById('finish_date').value = instance.formatDate(selectedDates[1], 'Y-m-d');
                    }
                })
            });
        </script>
    @endpush
</x-app-layout>
