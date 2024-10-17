<div>
        <h1 class="text-3xl font-bold">Selamat Datang</h1>
        <p class="text-slate-400">Di menu ini anda akan mengatur data untuk ditampilkan pada display kanban</p>


        <form wire:submit="save">
            <div class="space-y-12">
                <div class="pb-12 border-b border-gray-900/10">

                    <div class="grid grid-cols-2 gap-x-6 gap-y-8 mt-10">

                        <div>
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Choose
                                Month</label>
                            <div class="mt-2">
                                <select wire:model="form.month"  id="country" name="country" autocomplete="country-name"
                                    class="block py-1.5 w-full text-gray-900 rounded-md border-0 ring-1 ring-inset ring-gray-300 shadow-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-none sm:text-sm sm:leading-6">
                                    <option>---Choose a Month---</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </div>
                        </div>
                        {{-- Lokasi --}}
                        <div>
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Choose
                                Lokasi</label>
                            <div class="mt-2">
                                <select wire:model="form.lokasi"  id="country" name="country" autocomplete="country-name"
                                    class="block py-1.5 w-full text-gray-900 rounded-md border-0 ring-1 ring-inset ring-gray-300 shadow-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-none sm:text-sm sm:leading-6">
                                    <option>---Choose a Location---</option>
                                    <option value="SAI T">SAI T</option>
                                    <option value="SAI B">SAI B</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="pb-12 border-b border-gray-900/10">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Infographics input</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Input Angka infographic yang ingin ditampilkan</p>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 mt-10 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Jumlah No Control</label>
                            <div class="mt-2">
                                <input wire:model="form.no_control" type="text" name="first-name" id="first-name" autocomplete="given-name"
                                    class="block py-1.5 w-full text-gray-900 rounded-md border-0 ring-1 ring-inset ring-gray-300 shadow-sm placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Jumlah Issue</label>
                            <div class="mt-2">
                                <input wire:model="form.issue" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                    class="block py-1.5 w-full text-gray-900 rounded-md border-0 ring-1 ring-inset ring-gray-300 shadow-sm placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Jumlah WIP</label>
                            <div class="mt-2">
                                <input wire:model="form.wip" type="text" name="last-name" id="last-name" autocomplete="family-name"
                                    class="block py-1.5 w-full text-gray-900 rounded-md border-0 ring-1 ring-inset ring-gray-300 shadow-sm placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="flex gap-x-6 justify-end items-center mt-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit"
                    class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>



        {{-- <table wire:ignore.self id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th >Month</th>
                    <th>Lokasi</th>
                    <th>Jumlah No Kontrol</th>
                    <th>Jumlah Issue</th>
                    <th>Jumlah WIP</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>July</td>
                    <td>SAI T</td>
                    <td>62</td>
                    <td>100</td>
                    <td>99</td>
                    <td>
                        <div class="flex gap-3">

                            <a href="" class="px-4 py-2 bg-yellow-400 rounded-md hover:bg-yellow-700">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="" class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-900">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table> --}}


        <livewire:kanban-circuit-table/>

        {{-- <x-slot:script>
            <script src="{{ asset('js/jquery.js') }}"></script>
            <script src="{{ asset('js/datatables.js') }}"></script>
            <script src="{{ asset('js/datatables-tailwind.js') }}"></script>
            <script>
                new DataTable('#example');
            </script>
            <script>
                feather.replace();
            </script>
        </x-slot:script> --}}

</div>
