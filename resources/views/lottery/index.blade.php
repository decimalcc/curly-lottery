<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @isset($prize)
                    <div class="py-8">
                        <h2 class="text-2xl flex justify-center font-semibold">{{__('You win')}}:</h2>
                        <h3 class="text-xl flex justify-center">{{ $prize->getTypeName() }}</h3>
                        <h3 class="text-xl text-green-500 flex justify-center">
                            <span>+ </span>
                            <span>{{ $prize->getValue() }}</span>
                        </h3>
                    </div>
                @endisset
                <div class=" flex justify-center py-8">
                    <form method="GET">
                        @csrf
                        <button
                            class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                            {{ __('Play') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
