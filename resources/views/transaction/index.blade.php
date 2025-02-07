<x-app-layout>
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
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>

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
                                        <select id="example8" class="text-xs block w-full border-0 border-b-2 border-gray-200 focus:border-primary-500 focus:ring-0 disabled:cursor-not-allowed">
                                            <option value="" @selected($transaction->approval == 'accept')>Accept</option>
                                            <option value="" @selected($transaction->approval == 'wait')>Wait</option>
                                            <option value="" @selected($transaction->approval == 'deny')>Deny</option>
                                        </select>
                                        // TODO: IF SELECTED UPDATE STATUS
                                    </td>
                                    <td class="px-6 py-4">{{ $transaction->start_date }}</td>
                                    <td class="px-6 py-4">{{ $transaction->finish_date }}</td>
                                    <td class="px-6 py-4">{{ $transaction->user->name }}</td>
                                    <td class="px-6 py-4">{{ $transaction->total_price }}</td>
                                    {{-- <td class="flex justify-end gap-4 px-6 py-4 font-medium"><a href="">Delete</a><a href="" class="text-primary-700">Edit</a></td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
