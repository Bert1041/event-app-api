<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You have gone live with this event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200">
                    <p class="mb-8">
                        <x-button-link href="{{ route('dashboard') }}">
                            See all events
                        </x-button-link>
                    </p>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">

                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Title
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    description
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $event->title }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $event->description }}
                                                </td>
                                            </tr>

                                            <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-4">
                    <p class="mb-8">
                        <x-button-link class="hover:bg-green-700 bg-lime-400"
                            href="{{ route('ticket.create', $event->id) }}">
                            Create Ticket
                        </x-button-link>
                    </p>
                    <div class="flex flex-col">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <table class="divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Ticket No
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        @foreach ($event->tickets as $ticket)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {{ $ticket->id }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if ($ticket->is_valid == 'valid')
                                                            <span class="text-green-500">Available</span>
                                                        @else
                                                            <span class="text-red-500">Sold</span>
                                                        @endif
                                                    </td>
                                                    @if ($ticket->is_valid == 'valid')
                                                        <td class="py-4 whitespace-nowrap text-sm font-medium">
                                                            <form method="POST"
                                                                action="{{ route('ticket.update', $ticket->id) }}">
                                                                @method('put')
                                                                @csrf
                                                                <x-button>Sell Ticket</x-button>
                                                            </form>

                                                        </td>
                                                    @endif
                                                </tr>

                                            </tbody>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
