<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Fuel History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:max-w-lg sm:px-6 lg:px-8 grid md:grid-cols-3 gap-4 lg:p">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-3">
                <div class="py-12 px-10 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold pb-10">{{ __("Create Fuel History") }}</h1>
                    <form action="{{ route('fuel-histories.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100" for="amount">
                                {{ __("Amount of Fuel (in Litres)") }}
                              </label>
                              <input 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:placeholder-white dark:text-gray-100"
                                type="number"
                                step="0.01"
                                placeholder="Enter Amount of Fuel (Litres)"
                                name="amount"
                                value="{{ old('amount') }}"
                                required
                            >
                            <span class="text-gray-500 text-xs mt-2">This is the amount of fuel consumed/added</span>
                            <br>
                            <span class="text-red-500 text-xs mt-2">{{ $errors->first('amount') }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100" for="type">
                                {{ __("Type of History") }}
                              </label>
                              <select 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-100" 
                                name="type"
                                required
                            >
                              <option value="">Select Type of History</option>
                              @foreach ($types as $type)
                                <option value="{{ $type->value }}" @selected(old('capacity') == $type->value) @endselected>{{ $type->label() }}</option>
                              @endforeach
                            </select>
                            <span class="text-gray-500 text-xs mt-2">Choose between refilling or consumption</span>
                            <br>
                            <span class="text-red-500 text-xs mt-2">{{ $errors->first('type') }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100" for="history_date">
                                History Date
                              </label>
                              <input 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-100" 
                                type="datetime-local"
                                placeholder="Enter Current Level (Litres)"
                                name="history_date"
                                value="{{ old('history_date') }}"
                                required
                            >
                            <span class="text-gray-500 text-xs mt-2">This is the date you refilled or consumed fuel</span>
                            <br>
                            <span class="text-red-500 text-xs mt-2">{{ $errors->first('history_date') }}</span>
                        </div>
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 focus:outline-none focus:shadow-outline">
                            {{ __("Create Fuel History") }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>