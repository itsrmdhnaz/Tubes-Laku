<div>
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"
            integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            var chartData = JSON.parse('<?php echo $orderData; ?>');
            console.log(chartData);
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Total order ',
                        data: chartData.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
    <div class="flex flex-col gap-10 px-4">
        <div class="flex justify-between">
            <h1 class="pt-2 text-3xl font-bold">Dashboard</h1>


            {{-- <button id="dropdownHoverButton" wire:click="$toggle('dropdownHover')" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-white bg-[#3AB86D] hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Bulan
            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>

<!-- Dropdown menu -->
<div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
        <li>
          <button type="button" wire:click="$set('bulan', 0)" class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All</button>
        </li>
        @for ($i = 1; $i <= 12; $i++)
        <li>
          <button type="button" wire:click="$set('bulan', {{ $i }})" class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            {{ date('F', mktime(0, 0, 0, $i, 1)) }}
          </button>
        </li>
        @endfor
      </ul>
</div> --}}

        </div>
        <div class="overflow-y-auto max-h-[700px] flex flex-col gap-6">
        <div class="flex flex-col gap-4">
            <h1 class="font-bold">Jumlah total pesanan</h1>
            <div class="bg-[#BBE6CD] flex justify-center items-center w-full py-6 rounded-[10px]">
                <h1><span class="font-bold">{{ $totalOrderDate }}</span> Jumlah pesanan</h1>
            </div>
        </div>

        <div class="flex flex-col gap-4">
            <h1 class="font-bold">Pesanan terbaru</h1>
            <div class="relative mb-6 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No pesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Pelanggan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total pesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->order_id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->nama_pelanggan }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp.{{ $user->total_price }}
                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class="bg-[#42BB73] w-[50%] text-center text-white rounded-lg text-xs px-4 py-1">
                                        {{ $user->jumlah_pesanan }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    Rp.{{ $user->jumlah_total }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <h1 class="font-bold">Grafik total pesanan</h1>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

</div>
