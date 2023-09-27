<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Generator Tank') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:max-w-md sm:px-6 lg:px-8 grid md:grid-cols-3 gap-4 lg:p">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-3">
                <div class="py-12 px-10 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold pb-10">{{ __("Create Generator Tank") }}</h1>
                    <form action="{{ route('generator.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100" for="name">
                                {{ __("Name of Generator") }}
                              </label>
                              <input 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-100  dark:placeholder-white" 
                                type="text" 
                                placeholder="Enter Generator Name" 
                                name="name"
                                value="{{ old('name') }}"
                                required
                            >
                            <span class="text-gray-500 text-xs mt-2">You can use the name of your vehicle to make it easier to identify</span>
                            <br>
                            <span class="text-red-500 text-xs mt-2">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100" for="capacity">
                                {{ __("Capacity (in Litres)") }}
                              </label>
                              <input 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-100  dark:placeholder-white" 
                                type="nummber" 
                                step="0.01"
                                placeholder="Enter Capacity (Litres)"
                                name="capacity"
                                value="{{ old('capacity') }}"
                                required
                            >
                            <span class="text-gray-500 text-xs mt-2">This is the total capacity of the generator tank</span>
                            <br>
                            <span class="text-red-500 text-xs mt-2">{{ $errors->first('capacity') }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-100" for="current_level">
                                Current Level (in Litres)
                              </label>
                              <input 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-gray-100  dark:placeholder-white" 
                                type="nummber"
                                step="0.01"
                                placeholder="Enter Current Level (Litres)"
                                name="current_level"
                                value="{{ old('current_level') }}"
                                required
                            >
                            <span class="text-gray-500 text-xs mt-2">This is the current level of the generator tank</span>
                            <br>
                            <span class="text-red-500 text-xs mt-2">{{ $errors->first('current_level') }}</span>
                        </div>
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 focus:outline-none focus:shadow-outline">
                            {{ __("Create Generator Tank") }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>