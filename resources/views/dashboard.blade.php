<x-app-layout>
    {{--
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ (auth()->user()->getRoleNames()->first() ) }}
        </h2>
    </x-slot>
    --}}


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!--
{
    "id": 3,
    "event": "Casting Machine Set-Up Operator",
    "booking_code": "146020257727",
    "asset_id": 31,
    "approval": "wait",
    "start_date": "2025-01-13T12:41:27.000000Z",
    "finish_date": null,
    "borrower_id": 12,
    "borrower": {
      "id": 12,
      "user_id": 15,
      "name": "Rosamond Koch"
    },
    "asset": {
      "id": 31,
      "lander_id": 1,
      "name": "Stiedemann-Barton",
      "location": "American Samoa",
      "rental_price": 8092433,
      "image": "https://picsum.photos/seed/19/256"
    }
  },
  TODO: table list transaction and approval
-->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                            <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date of Birth</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Role</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Salary</th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                            <tr class="odd:bg-gray-50">
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">John Doe</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">Web Developer</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">$120,000</td>
                            </tr>

                            <tr class="odd:bg-gray-50">
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Jane Doe</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">04/11/1980</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">Web Designer</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">$100,000</td>
                            </tr>

                            <tr class="odd:bg-gray-50">
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Gary Barlow</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">24/05/1995</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">Singer</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">$20,000</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
