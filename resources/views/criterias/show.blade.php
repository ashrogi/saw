<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Menu Crips') }}
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

                            <form action="{{ route('crips.store') }}" method="POST">
                                @csrf
                            <input type="hidden" value="{{$criterias->id}}" name="kriteria_id">
                                <div class="grid lg:grid-cols-2 gap-4">
                                    <!-- Name -->
                                    <div>
                                        <x-label for="nama_crips" :value="__('Nama Crips')" />
                                        <x-input id="nama_crips" class="block mt-1 w-full" type="text" name="nama_crips" :value="old('nama_crips')" required />
                                    </div>

                                    <!-- Position -->
                                    <div class="mt-4">
                                        <x-label for="bobot" :value="__('Bobot')" />
                                        <x-input id="bobot" class="block mt-1 w-full" type="text" name="bobot" :value="old('bobot')" required />
                                    </div>
                                    <div class="text-right">
                                   <x-button class="mt-4 ">
                                    {{ __('Submit') }}
                                </x-button>
                                </div>
                            </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Crips
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Bobot
                                </th>
                                <th colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($crips as $data )

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $data->nama_crips }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $data->bobot }}
                                </td>
                                <td>
                                <a href="{{ route('crips.edit', $data->id) }}">
                                        <x-button>
                                            {{ __('Edit') }}
                                        </x-button>
                                    </a>

                                    <form class="inline-block" method="POST" action="{{ url('crips', $data->id ) }}">
                                        @csrf
                                        @method('DELETE')

                                        <x-button onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            {{ __('Delete') }}
                                        </x-button>

                                    </form>

                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
