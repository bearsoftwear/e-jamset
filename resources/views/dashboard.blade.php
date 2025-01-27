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


                    <div class="">
                        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Event</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Booking Code</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Asset</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Start Date</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Finish Date</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Borrower</th>
                                    {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th> --}}
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                @foreach ($transactions as $transaction)
                                    <tr class="hover:bg-gray-50">
                                        <th class="px-6 py-4 font-medium text-gray-900">{{ $transaction->event }}</th>
                                        <td class="px-6 py-4">{{ $transaction->booking_code }}</td>
                                        <td class="px-6 py-4">{{ $transaction->asset->name }}</td>
                                        <td class="px-6 py-4">
                                            @if ($transaction->approval == 'accept')
                                                <span
                                                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="h-3 w-3">
                                                        <path fill-rule="evenodd"
                                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Accept
                                                </span>
                                            @elseif($transaction->approval == 'wait')
                                                <span
                                                    class="inline-flex items-center gap-1 rounded-full bg-yellow-50 px-2 py-1 text-xs font-semibold text-yellow-600">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-yellow-600"></span>
                                                    Wait
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="h-3 w-3">
                                                        <path
                                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                    </svg>
                                                    Deny
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">{{ $transaction->start_date }}</td>
                                        <td class="px-6 py-4">{{ $transaction->finish_date }}</td>
                                        <td class="px-6 py-4">{{ $transaction->borrower->name }}</td>
                                        {{-- <td class="flex justify-end gap-4 px-6 py-4 font-medium"><a href="">Delete</a><a href="" class="text-primary-700">Edit</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

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


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
