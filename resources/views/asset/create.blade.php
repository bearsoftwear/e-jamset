<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('assets.store') }}">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <div class="grid gap-4 grid-cols-2">
                            <x-input-sail name="name" value="{{ fake()->company() }}" required :label="__('Full Name')"/>
                            <x-input-sail name="location" value="{{ fake()->country() }}" required :label="__('Location')"/>
                            <x-input-sail name="rental_price" value="{{ fake()->randomNumber(7, true) }}" required :label="__('Rental Price')"/>
                            <x-input-sail name="image" value="https://picsum.photos/seed/{{ fake()->randomNumber(2, true) }}/256" required :label="__('Image')"/>
                        </div>
                        <x-primary-button class="mt-4">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
