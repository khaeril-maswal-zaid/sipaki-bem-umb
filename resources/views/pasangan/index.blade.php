<x-app-layout>
    <section class="text-center mt-9 pt-7 p-3">
        <img class="h-auto max-w-lg mx-auto mb-6 " src="{{ asset('storage/img/umb.png') }}" alt="" width="70px">
        <h1
            class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-5xl dark:text-white">
            Pilihan {{ Auth::user()->name }} Sangat Krusial</h1>
        <p class="mb-3 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            Pastikan {{ Auth::user()->name }} memilih pasangan Presiden dan Wakil Presiden Mahasiswa yang tepat!
        </p>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            Ingat! Kita Mahasiswa BUKAN BUDAK PENGUASA
        </p>
    </section>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('kotak-suara.store') }}" method="post">
                @csrf

                <!-- Tambahkan flex di sini -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap gap-4 mb-5 p-7">
                    <!-- Card pertama -->
                    @foreach ($pasangans as $pasangan)
                        <label for="default-radio-{{ $pasangan->norut }}">
                            <div
                                class="mb-3 max-w-sm hover:bg-gray-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 transition-all duration-300 ease-in-out hover:border-red-500 hover:shadow-lg hover:scale-105 focus-within:border-red-600 focus-within:ring-4 focus-within:ring-red-300">

                                <img class="rounded-t-lg" src="{{ asset('storage/img/' . $pasangan->picture) }}"
                                    alt="" />
                                <div class="p-5">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        No. Urut {{ $pasangan->norut }}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        {{ $pasangan->pasangan_calon }}
                                    </p>
                                    <div class="flex justify-center items-center mt-7">
                                        <input id="default-radio-{{ $pasangan->norut }}" type="radio"
                                            name="pasangancalon" value="{{ $pasangan->id }}"
                                            class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <span class="pl-2 text-sm">Pilih</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>

                <div class="mx-3">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-full">Pilih
                        Sebagai Pasangan Calon Presiden & Wakil Presiden UMB</button>
                </div>
            </form>
        </div>
    </section>

</x-app-layout>
