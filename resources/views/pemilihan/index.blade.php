<x-app-layout>
    <section class="text-center mt-9 pt-7">
        <img class="h-auto max-w-lg mx-auto mb-6 " src="{{ asset('storage/img/umb.png') }}" alt="" width="70px">
        <h1
            class="mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-5xl dark:text-white">
            Terima Kasih, {{ Auth::user()->name }} Telah Memilih</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            Pasangan Calon Presiden dan Wakil Presiden Mahasiswa Universitas Muhammadiyah Bulukumba <br>
            Ingat! Kita Mahasiswa BUKAN BUDAK PENGUASA
        </p>
    </section>

</x-app-layout>
