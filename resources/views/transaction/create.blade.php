<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('assets.store') }}">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <div class="grid gap-4 grid-cols-2">
                            <x-input-sail name="NIK" value="{{ fake()->numerify('##############') }}" required
                                :label="__('NIK')" />
                            <x-input-sail name="name" value="{{ fake()->name() }}" required :label="__('Full Name')" />
                            <x-input-sail name="date" value="{{ request('dateStr') }}" :label="__('Date')" />
                            {{-- TODO: make readable human date then disabled --}}
                            <x-input-sail disabled name="rental_price" value="{{ fake()->randomNumber(7, true) }}"
                                :label="__('Rental Price')" />
                            {{-- TODO: fetch rental price from db with controller, make it readable by human --}}
                            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                            <input type="hidden" name="finish_date" value="{{ request('finish_date') }}">
                        </div>
                        <x-back-button class="mt-4" href="{{ route('assets.show', 1) }}">
                            {{ __('Cancel') }}
                        </x-back-button>

                        <x-primary-button class="mt-4">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
