<x-app-layout>
    <section class="text-center mt-9 pt-7">
        <img class="h-auto max-w-lg mx-auto mb-6 " src="{{ asset('storage/img/umb.png') }}" alt="" width="70px">
        <h1
            class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-5xl dark:text-white">
            Diagram Hasil Pemilihan Pasangan Calon</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            Presiden dan Wakil Presiden Mahasiswa Universitas Muhammadiyah Bulukumba
        </p>
    </section>

    <section class="text-center mt-9 pt-7">

        <figure class="highcharts-figure py-5">
            <div id="container"></div>
        </figure>

        <script>
            // Menyimpan data untuk grafik di variabel global
            var dataSeries = [

                @foreach ($namapaslon as $key => $value)
                    {
                        name: '{{ $value }}',
                        y: {{ $count[$key] }},
                    },
                @endforeach
            ];

            window.dataSeries = dataSeries; // Menyimpan ke window untuk diakses di app.js
        </script>
    </section>
    <section
        class="text-center mx-9 pb-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-center">
        <div
            class="block p-7 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah Pemilih dalam</p>
            <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Daftar Pemilih Tetap (DPT)</p>

            <h2 class="inline text-7xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $penggunahakpilih }}
            </h2>
            <p class="inline text-gray-700 dark:text-gray-400 font-bold text-2xl">Pemilih</p>
        </div>

        <div
            class="block p-7 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah Pengguna Hak Pilih</p>
            <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Dalam DPT</p>

            <h2 class="inline text-7xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $penggunahakpilih }}
            </h2>
            <p class="inline text-gray-700 dark:text-gray-400 font-bold text-2xl">Pemilih</p>
        </div>

        @foreach ($namapaslon as $key => $value)
            <div
                class="block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <p class="font-normal text-gray-700 dark:text-gray-400">Paslon No. {{ $norut[$key] }}</p>
                <p class="font-normal text-gray-700 dark:text-gray-400 mb-3"> {{ $value }}</p>

                <h2 class="inline text-7xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $count[$key] }}
                </h2>
                <p class="inline text-gray-700 dark:text-gray-400 font-bold text-2xl">Suara</p>
            </div>
        @endforeach
    </section>

</x-app-layout>
