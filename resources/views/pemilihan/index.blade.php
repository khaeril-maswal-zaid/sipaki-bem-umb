<x-app-layout>
    <section class="text-center my-9 pt-7 p-3">
        <img class="h-auto max-w-lg mx-auto mb-6 " src="{{ asset('storage/img/umb.png') }}" alt="" width="70px">
        <h1
            class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-5xl dark:text-white">
            Terima Kasih, {{ Auth::user()->name }} Telah Memilih</h1>
        <p class="mb-3 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            Pasangan Calon Presiden dan Wakil Presiden Mahasiswa Universitas Muhammadiyah Bulukumba</p>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            Ingat! Kita Mahasiswa BUKAN BUDAK PENGUASA
        </p>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                {{ __('Log Out') }}
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </button>
        </form>
    </section>

</x-app-layout>
