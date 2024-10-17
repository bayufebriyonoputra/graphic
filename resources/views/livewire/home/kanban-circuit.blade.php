<div>
    <div class="flex justify-center items-center">
        <div class="px-4 w-full max-w-lg">
            <label for="options" class="block mb-2 text-sm font-medium text-gray-700">Choose a location:</label>
            <select wire:model="lokasi" wire:change="change"  id="options" name="options"
                class="block px-4 py-2 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:bg-gray-50">
                <option value="">Select an option</option>
                <option value="SAI T">SAI T</option>
                <option value="SAI B">SAI B</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-6 justify-center p-4">
        <!-- Card 1 -->
        <div class="p-4 bg-white rounded-lg shadow-lg dark:border dark:bg-gray-800 dark:border-gray-700">
            {{-- <h2 class="mb-2 text-xl font-semibold dark:text-white"></h2> --}}
            <p class="mb-4 text-gray-600 dark:text-white">Summary Jumlah No Control Kanban</p>
            <canvas id="chart1" class="w-full h-full"></canvas>
        </div>

        <!-- Card 2 -->
        <div class="p-4 bg-white rounded-lg shadow-lg dark:border dark:bg-gray-800 dark:border-gray-700">
            {{-- <h2 class="mb-2 text-xl font-semibold dark:text-white">Card 2</h2> --}}
            <p class="mb-4 text-gray-600 dark:text-white">Summary Jumlah Issue Kanban</p>
            <canvas id="chart2" class="w-full h-full"></canvas>
        </div>

        <!-- Card 3 -->
        <div class="p-4 bg-white rounded-lg shadow-lg dark:border dark:bg-gray-800 dark:border-gray-700">
            {{-- <h2 class="mb-2 text-xl font-semibold dark:text-white">Card 3</h2> --}}
            <p class="mb-4 text-gray-600 dark:text-white">Summary Jumlah WIP Kanban Circuit</p>
            <canvas id="chart3" class="w-full h-full"></canvas>
        </div>

        {{-- <!-- Card 4 -->
        <div class="p-4 bg-white rounded-lg shadow-lg dark:border dark:bg-gray-800 dark:border-gray-700">
            <h2 class="mb-2 text-xl font-semibold dark:text-white">Card 4</h2>
            <p class="mb-4 text-gray-600 dark:text-white">Incididunt ut labore et dolore.</p>
            <canvas id="chart4" class="w-full h-full"></canvas>
        </div> --}}
    </div>


</div>
@script
    <script>
        // Runs immediately after Livewire has finished initializing on the page...
        $wire.on('circuitUpdated', () => {
            // Chart 1 - Bar Chart
            var ctx1 = document.getElementById('chart1').getContext('2d');
            var chart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: {!! $bulan !!}, // JSON encode to safely pass the data
                    datasets: [{
                        label: 'Series 1',
                        data: {!! $noControl !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart 2 - Line Chart
            var ctx2 = document.getElementById('chart2').getContext('2d');
            var chart2 = new Chart(ctx2, {
                type: 'bar', // Changed to 'line'
                data: {
                    labels: {!! $bulan !!},
                    datasets: [{
                        label: 'Series 2',
                        data: {!! $issue !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart 3 - Area Chart
            var ctx3 = document.getElementById('chart3').getContext('2d');
            var chart3 = new Chart(ctx3, {
                type: 'bar', // Changed to 'line'
                data: {
                    labels: {!! $bulan !!},
                    datasets: [{
                        label: 'Series 3',
                        data: {!! $wip !!},
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    responsive: true
                }
            });
            // Setiap kali filter diperbarui, perbarui chart
            Livewire.on('updateCircuit', (data) => {
                console.log(data);
                chart1.data.datasets[0].data = data.noControl;
                chart1.data.labels = data.month;
                chart1.update();

                chart2.data.datasets[0].data = data.issue;
                chart2.data.labels = data.month;
                chart2.update();

                chart3.data.datasets[0].data = data.wip;
                chart3.data.labels = data.month;
                chart3.update();
                // Update chart dengan data baru
            });
        });
    </script>
@endscript
