<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-white">
                        <div>
                            <div class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $asset->name }}</h1>
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
                                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $asset->location }}</h1>
                                </div>

                                <!-- Options -->
                                <div class="mt-4 lg:row-span-3 lg:mt-0">
                                    <h2 class="sr-only">Product information</h2>
                                    <p class="text-3xl tracking-tight text-gray-900">
                                        {{ "Rp".number_format($asset->rental_price, 0, ',', '.'). " / Day" }}
                                    </p>

                                    <!-- Reviews -->
                                    <div class="mt-6">
                                        <h3 class="sr-only">Reviews</h3>
                                        <div class="flex items-center">
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($asset->star_rating >= $i)
                                                        <!-- Full star -->
                                                        <svg class="size-5 shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                            <path fill-rule="evenodd"
                                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    @elseif ($asset->star_rating > $i - 1)
                                                        <!-- Half star -->
                                                        <svg class="size-5 shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="clip-path: inset(0 50% 0 0);">
                                                            <path fill-rule="evenodd"
                                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    @else
                                                        <!-- Empty star -->
                                                        <svg class="size-5 shrink-0 text-gray-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                            <path fill-rule="evenodd"
                                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    @endif
                                                @endfor
                                            </div>
                                            <p class="sr-only">2 out of 5 stars</p>
                                            <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{ $asset->reviewer }} reviews</a>
                                        </div>
                                    </div>

                                    <form class="mt-10">
                                        <!-- Colors -->
                                        <div>
                                            <h3 class="text-sm font-medium text-gray-900">Color</h3>
                                            // todo datetime picker


                                            <div id="date-range-picker" date-rangepicker class="flex items-center">
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                        </svg>
                                                    </div>
                                                    <input id="datepicker-range-start" name="start" type="text"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                           placeholder="Select date start">
                                                </div>
                                                <span class="mx-4 text-gray-500">to</span>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                        </svg>
                                                    </div>
                                                    <input id="datepicker-range-end" name="end" type="text"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                           placeholder="Select date end">
                                                </div>
                                            </div>


                                            <fieldset aria-label="Choose a color" class="mt-4">
                                                <div class="flex items-center gap-x-3">
                                                    <!-- Active and Checked: "ring ring-offset-1" -->
                                                    <label aria-label="White" class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-400 focus:outline-none">
                                                        <input type="radio" name="color-choice" value="White" class="sr-only">
                                                        <span aria-hidden="true" class="size-8 rounded-full border border-black/10 bg-white"></span>
                                                    </label>
                                                    <!-- Active and Checked: "ring ring-offset-1" -->
                                                    <label aria-label="Gray" class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-400 focus:outline-none">
                                                        <input type="radio" name="color-choice" value="Gray" class="sr-only">
                                                        <span aria-hidden="true" class="size-8 rounded-full border border-black/10 bg-gray-200"></span>
                                                    </label>
                                                    <!-- Active and Checked: "ring ring-offset-1" -->
                                                    <label aria-label="Black" class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-900 focus:outline-none">
                                                        <input type="radio" name="color-choice" value="Black" class="sr-only">
                                                        <span aria-hidden="true" class="size-8 rounded-full border border-black/10 bg-gray-900"></span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <!-- Sizes -->
                                        <div class="mt-10">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-sm font-medium text-gray-900">Size</h3>
                                                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
                                            </div>

                                            <fieldset aria-label="Choose a size" class="mt-4">
                                                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                    <label class="group relative flex cursor-not-allowed items-center justify-center rounded-md border bg-gray-50 px-4 py-3 text-sm font-medium uppercase text-gray-200 hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                        <input type="radio" name="size-choice" value="XXS" disabled class="sr-only">
                                                        <span>XXS</span>
                                                        <span aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                    <svg class="absolute inset-0 size-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                      <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke"/>
                    </svg>
                  </span>
                                                    </label>
                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                        <input type="radio" name="size-choice" value="XS" class="sr-only">
                                                        <span>XS</span>
                                                        <!--
                                                          Active: "border", Not Active: "border-2"
                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                        -->
                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                    </label>
                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                        <input type="radio" name="size-choice" value="S" class="sr-only">
                                                        <span>S</span>
                                                        <!--
                                                          Active: "border", Not Active: "border-2"
                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                        -->
                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                    </label>
                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                        <input type="radio" name="size-choice" value="M" class="sr-only">
                                                        <span>M</span>
                                                        <!--
                                                          Active: "border", Not Active: "border-2"
                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                        -->
                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                    </label>
                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                        <input type="radio" name="size-choice" value="L" class="sr-only">
                                                        <span>L</span>
                                                        <!--
                                                          Active: "border", Not Active: "border-2"
                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                        -->
                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                    </label>
                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                        <input type="radio" name="size-choice" value="XL" class="sr-only">
                                                        <span>XL</span>
                                                        <!--
                                                          Active: "border", Not Active: "border-2"
                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                        -->
                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                    </label>
                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                        <input type="radio" name="size-choice" value="2XL" class="sr-only">
                                                        <span>2XL</span>
                                                        <!--
                                                          Active: "border", Not Active: "border-2"
                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                        -->
                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                    </label>
                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                    <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                        <input type="radio" name="size-choice" value="3XL" class="sr-only">
                                                        <span>3XL</span>
                                                        <!--
                                                          Active: "border", Not Active: "border-2"
                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                        -->
                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <button type="submit"
                                                class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                            Reserve
                                        </button>
                                    </form>
                                </div>

                                <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                                    <!-- Description and details -->
                                    <div>
                                        <h3 class="sr-only">Description</h3>
                                        {{-- UJI COBA--}}
                                        <div id="calendar"></div>
                                        {{-- UJI COBA--}}
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
                                                <li class="text-gray-400"><span class="text-gray-600">Hand cut and sewn locally</span></li>
                                                <li class="text-gray-400"><span class="text-gray-600">Dyed with our proprietary colors</span></li>
                                                <li class="text-gray-400"><span class="text-gray-600">Pre-washed &amp; pre-shrunk</span></li>
                                                <li class="text-gray-400"><span class="text-gray-600">Ultra-soft 100% cotton</span></li>
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
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

        {{--        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/index.global.min.js'></script>--}}
        {{--        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/web-component@6.1.15/index.global.min.js'></script>--}}
        {{--        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.15/index.global.min.js'></script>--}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: @json($events),
                });
                calendar.render();
            });
        </script>
        // todo calendar
    @endpush
</x-app-layout>