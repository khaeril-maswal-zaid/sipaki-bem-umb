<x-app-layout>
    <section class="text-center mt-9 pt-7">
        <img class="h-auto max-w-lg mx-auto mb-6 " src="{{ asset('storage/img/umb.png') }}" alt="" width="70px">
        <h1
            class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-5xl dark:text-white">
            Diagram Hasil Pemilihan Pasangan Calon</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            Presiden dan Wakil Presiden Mahasiswa Universitas Muhammadiyah Bulukumba
        </p>

        <figure class="highcharts-figure py-7">
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

</x-app-layout>
