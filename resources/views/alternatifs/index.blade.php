<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Menu Alternatif') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <a href="{{ route('alternatifs.create') }}">
                        <x-button class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Tambah Alternatif') }}
                        </x-button>
                    </a>

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Alternatif
                                </th>
                                <th colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $data )

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $data->nama_alternatif }}
                                </td>
                                <td>
                                <a href="{{ route('alternatifs.edit', $data->id) }}">
                                        <x-button>
                                            {{ __('Edit') }}
                                        </x-button>
                                    </a>

                                    <form class="inline-block" method="POST" action="{{ url('alternatifs', $data->id ) }}">
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
