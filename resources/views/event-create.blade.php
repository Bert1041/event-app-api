<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('event.create') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <div class="p-4 pb-4">
                                <x-label for="title" :value="__('Your Event Name')" />

                                <x-input id="eventTitle" class="block mt-1 w-full" type="text" name="title"
                                    :value="old('title')" required autofocus />
                            </div>

                            <div class="p-4 pb-4">
                                <x-label for="description" :value="__('Your Event Description')" />

                                <textarea name="description" id="eventDescription"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required>{{ old('description') }}</textarea>
                            </div>

                            <div class="p-4 pb-4 w-1/4">
                                <x-label for="date" :value="__('Your Event Date')" />

                                <x-input id="eventDate" class="block mt-1 w-full" type="date" name="event_date"
                                    :value="old('event_date')" required autofocus />

                            </div>
                            <div class="p-4 pb-4 w-1/2">
                                <x-label for="status" :value="__('Your Event Status')" />

                                <x-input id="eventStatus" class="block mt-1 w-full" type="number" name="is_active"
                                    placeholder="Enter 1 for active 0 for inactive" :value="old('status')" required autofocus />

                            </div>
                            <div class="p-4 pb-4 w-1/2">
                                <x-label for="email" :value="__('Your Event Access')" />

                                <x-input id="eventAccess" class="block mt-1 w-full" type="text" name="access"
                                    placeholder="Enter paid or free" :value="old('access')" required autofocus />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
