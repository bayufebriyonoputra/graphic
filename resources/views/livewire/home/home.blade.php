<div>

    <div class="flex justify-end p-8">
        <a href="{{ url('/login') }}" class="px-4 py-2 text-white bg-blue-400 rounded-md hover:bg-blue-700">Login</a>
    </div>
    <div class="flex justify-center items-center">
        <div class="w-full max-w-none">
            <p class="text-2xl font-bold text-center dark:text-white">Graphic <span x-text="$wire.menu"></span></p>
            <div class="flex gap-3 justify-center mt-5">
                <button wire:click="setMenu('Kanban Circuit')"
                    class="px-4 py-2 text-white bg-sky-400 rounded-md hover:bg-sky-700">Kanban Circuit</button>
                <button wire:click="setMenu('Kanban Material FA')"
                    class="px-4 py-2 text-white bg-sky-400 rounded-md hover:bg-sky-700">Kanban Material FA</button>
                <button wire:click="setMenu('Kanban Material PA')"
                    class="px-4 py-2 text-white bg-sky-400 rounded-md hover:bg-sky-700">Kanban Material PA</button>
            </div>
            <div class="flex gap-3 justify-center my-4">
                {{-- <div class="px-4 w-full">
                        <label for="options" class="block mb-2 text-sm font-medium text-gray-700">Choose a month:</label>
                        <select id="options" name="options"
                            class="block px-4 py-2 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:bg-gray-50">
                            <option>---Choose a Month---</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">July</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div> --}}

            </div>



            {{-- Content Graphic --}}
            <div wire:loading.remove>
                @if ($menu == 'Kanban Circuit')
                    <livewire:home.kanban-circuit />
                @elseif ($menu == 'Kanban Material FA')
                    <livewire:home.kanban-material-fa />
                @elseif ($menu == 'Kanban Material PA')
                    <livewire:home.kanban-material-pa />
                @endif
            </div>

        </div>

    </div>





</div>
