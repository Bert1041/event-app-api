<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Personal Events') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200">
                    <p class="mb-8">
                        <x-button-link href="{{ route('event.showForm') }}">
                            Create new Event
                        </x-button-link>
                    </p>
                    @if (count($events) > 0)
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">

                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Name
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Description
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Event Date
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Event Status
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Event Access
                                                    </th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Delete</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($events as $event)
                                                    <tr>
                                                        <td
                                                            class="py-4 whitespace-nowrap  text-right text-sm font-medium">
                                                            <span class="bg-emerald-300 hover:bg-lime-700 active:bg-gray-900 px-4 py-2 rounded-md">
                                                                <a href="{{ route('event.live', $event->id) }}"
                                                                class=" text-sm text-gray-700">Go
                                                                Live</a>
                                                            </span>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{ $event->title }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{ $event->description }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{ $event->event_date }}
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            @if ($event->is_active == '1')
                                                                <span class="text-green-500">Active</span>
                                                            @else
                                                                <span class="text-red-500">Inactive</span>
                                                            @endif
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{ $event->access }}
                                                        </td>
                                                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                        {{$token->last_used_at ? $token->last_used_at->diffForHumans() : ''}}
                                                    </td> --}}
                                                        <td
                                                            class="py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <form method="GET"
                                                                action="{{ route('event.edit', ['event' => $event->id]) }}">
                                                                @csrf
                                                                <x-button class="bg-cyan-500">Edit</x-button>
                                                            </form>
                                                        </td>
                                                        <td
                                                            class="py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <form method="POST"
                                                                action="{{ route('event.delete', ['event' => $event->id]) }}">
                                                                @csrf
                                                                <x-button>Delete</x-button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <!-- More people... -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-center">You don't any events created yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
