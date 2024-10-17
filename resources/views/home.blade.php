<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   @vite('resources/css/app.css')

    <script src="{{ asset('js/chart.js') }}"></script>
    <title>Document</title>
</head>

<body class="bg-green-300 dark:bg-gray-900">
    <section class="">
        <div class="flex justify-end p-8">
            <a href="{{ url('/login') }}"
                class="px-4 py-2 text-white bg-blue-400 rounded-md hover:bg-blue-700">Login</a>
        </div>
        <div class="flex justify-center items-center">
            <div class="w-full max-w-none" x-data="{menu:'Kanban Circuit'}">
                <p class="text-2xl font-bold text-center dark:text-white">Graphic <span x-text="menu"></span></p>
                <div class="flex gap-3 justify-center mt-5">
                    <button @click="menu='Kanban Circuit'" class="px-4 py-2 text-white bg-sky-400 rounded-md hover:bg-sky-700">Kanban Circuit</button>
                    <button @click="menu='Kanban Materila FA'" class="px-4 py-2 text-white bg-sky-400 rounded-md hover:bg-sky-700">Kanban Material FA</button>
                    <button @click="menu='Kanban Material PA'" class="px-4 py-2 text-white bg-sky-400 rounded-md hover:bg-sky-700">Kanban Material PA</button>
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

                    <div class="px-4 w-full max-w-lg">
                        <label for="options" class="block mb-2 text-sm font-medium text-gray-700">Choose a location:</label>
                        <select id="options" name="options"
                            class="block px-4 py-2 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:bg-gray-50">
                            <option value="">Select an option</option>
                            <option value="option1">SAI T</option>
                            <option value="option2">SAI B</option>
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
                        <p class="mb-4 text-gray-600 dark:text-white">Summary Jumlah Kanban Circuit</p>
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

        </div>
    </section>


    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Chart 1 - Bar Chart
            var ctx1 = document.getElementById('chart1').getContext('2d');
            var chart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Series 1',
                        data: [10, 20, 15, 30, 25],
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
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Series 2',
                        data: [40, 30, 35, 50, 45],
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

            // Chart 3 - Area Chart (Using 'line' with fill option)
            var ctx3 = document.getElementById('chart3').getContext('2d');
            var chart3 = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Series 3',
                        data: [30, 40, 25, 50, 60],
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

            // Chart 4 - Pie Chart
            var ctx4 = document.getElementById('chart4').getContext('2d');
            var chart4 = new Chart(ctx4, {
                type: 'bar',
                data: {
                    labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
                    datasets: [{
                        label: 'Fruits',
                        data: [44, 55, 13, 43],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        });
    </script>
</body>

</html>
