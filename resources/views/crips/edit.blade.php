<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Edit Crips') }}
            </h2>
        </div>
    </x-slot>

<div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

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

                            <form action="{{ route('crips.update',$crips->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="grid lg:grid-cols-2 gap-4">
                                    <!-- Emp ID -->
                                    <div>
                                        <x-label for="nama_crips" :value="__('Nama Kriteria')" />

                                        <x-input id="nama_crips" class="block mt-1 w-full" type="text" name="nama_crips" value="{{ $crips->nama_crips }}" required />
                                    </div>

                                    <!-- Position -->
                                    <div class="mt-4">
                                        <x-label for="bobot" :value="__('Bobot')" />
                                        <x-input id="bobot" class="block mt-1 w-full" type="text" name="bobot" value="{{ $crips->bobot }}" required />
                                    </div>

                                </div>

                                <div class="text-right">
                                    <x-button class="mt-4 ">
                                     {{ __('Update') }}
                                 </x-button>
                                 </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>