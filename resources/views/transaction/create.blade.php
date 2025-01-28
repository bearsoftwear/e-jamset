<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('transaction.store') }}">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <div class="grid gap-4 grid-cols-2">
                            <x-input-sail name="booking_code" value="{{ fake()->numerify('####' . now()->year . '####') }}" readonly :label="__('Booking Code')"/>
                            <x-input-sail name="event" value="{{ fake()->jobTitle() }}" required :label="__('Event')"/>
                            <x-input-sail name="NIK" value="{{ fake()->numerify('##############') }}" required :label="__('NIK')" />
                            <x-input-sail name="name" value="{{ Auth::check() ? Auth::user()->name : fake()->name() }}" required :label="__('Full Name')"/>
                            <x-input-sail name="date" value="{{ $transaction['date'] }}" :label="__('Date')" readonly/>
                            <x-input-sail name="rental_price" value="{{ 'Rp' . number_format($transaction['total_price'], 0, ',', '.') }}" readonly :label="__('Rental Price')"/>
                            <input type="hidden" name="asset_id" value="{{ $transaction['asset_id'] }}">
                            <input type="hidden" name="start_date" value="{{ $transaction['start_date'] }}">
                            <input type="hidden" name="finish_date" value="{{ $transaction['finish_date'] }}">

                        </div>
                        <x-back-button class="mt-4" href="{{ route('assets.show', 1) }}">
                            {{ __('Cancel') }}
                        </x-back-button>

                        <x-primary-button class="mt-4">
                            {{ __('Submit') }}
                            {{--TODO: MAKE IT WORK--}}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
