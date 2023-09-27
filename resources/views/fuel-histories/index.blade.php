<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('⛽️ Fuel History') }}
            </h2>
            <a href="{{ route('fuel-histories.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __("Add Fuel History") }}
            </a>
        </div>
    </x-slot>

    @if($fuelHistories->count() > 0)
    <div class="py-8">
        <section class="container px-4 mx-auto">
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                                            Amount (Litres)
                                        </th>
                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                                            Type of History
                                        </th>
        
                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                                            History Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($fuelHistories as $history)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap text-center">
                                            <div>
                                                <h2 class="font-medium text-gray-800 dark:text-white ">{{ $history->amount }} Litres</h2>
                                            </div>
                                        </td>
                                        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap text-center">
                                            <div 
                                            class="
                                                inline px-3 py-1 text-sm font-normal rounded-full text-{{$history->type->color()}}-500 gap-x-2 
                                                bg-{{$history->type->color()}}-400/60 dark:bg-{{$history->type->color()}}-800 border 
                                                border-{{$history->type->color()}}-500 dark:border-{{$history->type->color()}}-500
                                                dark:text-white
                                            ">
                                                {{ $history->type->label() }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap text-center">
                                            <div>
                                                <h4 class="text-gray-700 dark:text-gray-200">{{ $history->history_at->format('d M Y H:i') }}</h4>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
        
                        </div>
                    </div>
                </div>
            </div>
            <br>
            {{ $fuelHistories->links() }}
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-3">
                <div class="p-20 text-gray-900 dark:text-gray-100 text-center grid gap-4 place-content-center">
                    <h1 class="text-2xl font-bold pb-2">{{ __("No Fuel History") }}</h1>
                    <p class="text-md">{{ __("You don't have a fuel history yet. Create one now!") }}</p>
                    <a href="{{ route('fuel-histories.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                        {{ __("Add Fuel History") }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>