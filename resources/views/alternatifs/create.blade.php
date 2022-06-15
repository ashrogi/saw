<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah Alternatif') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1"> 
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                


                    <div class="container mx-auto">
                        @if ($errors->any())

                            <div class="mb-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                              </div>
                        @endif

                            <form action="{{ route('alternatifs.store') }}" method="POST">
                                @csrf

                                <div class="grid lg:grid-cols-2 gap-4">
                                    <!-- Name -->
                                    <div>
                                        <x-label for="nama_alternatif" :value="__('Nama Alternatif')" />
                                        <x-input id="nama_alternatif" class="block mt-1 w-full" type="text" name="nama_alternatif" :value="old('nama_alternatif')" required />
                                    </div>
                                </div>
                                <div class="text-right">
                                   <x-button class="mt-4 ">
                                    {{ __('Save') }}
                                </x-button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>