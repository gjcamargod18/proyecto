@section('title')
    Usuarios Registrados
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.semanticui.min.css">
@endsection
<x-app-layout>
    @if (session('status'))
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
            <a href="#"
            class="block max-w-sm p-6 bg-red-500 border border-red-200 rounded-lg shadow">
            <p class="font-normal text-white dark:text-white">{{ session('status') }}</p>
        </a>
        </div>
    </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
            <div class=" overflow-hidden  sm:rounded-lg">
                <div class="">
                    <table id="users" class="w-full text-sm text-left text-gray-700 dark:text-gray-700">
                        <thead class="text-xs text-white uppercase shadow bg-lime-500 bg-lime-500 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nombres
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tipo de documento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Documento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Rol de usuario
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                                    <td class="px-6 py-4">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->tipo_documento }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->documento }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->rol }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('actualizar', ['user'=>$user])}}"
                                            class="block text-white bg-lime-500 hover:bg-lime-600 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-lime-600 dark:hover:bg-lime-600 dark:focus:ring-lime-200"
                                            type="button">
                                            <i class="bi bi-pencil-square"></i>
                                    </a>

                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{route('borrar', $user)}}" method="POST">
                                            @method('DELETE')
                                            <x-delete-button></x-delete-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-5 px-2 py-9">
                <a href="{{route('register')}}"
                class="block text-white bg-lime-300 hover:bg-lime-600 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-3 py-2.5 pr-5 no-underline  text-center dark:bg-lime-600 dark:hover:bg-lime-600 dark:focus:ring-lime-200"
                >
                Crear Usuario
            </a>
            </div>
        </div>
    </div>

    </div>
    @section('js')
        @livewireScripts()
        <script type="module" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="module" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script type="module" src="https://cdn.datatables.net/1.13.4/js/dataTables.semanticui.min.js"></script>
        <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
        <script type="module">
        $(document).ready(function () {
            $('#users').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Mostrando del _START_ al _END_ de un total de _TOTAL_ entradas",
                    "infoEmpty": "mostrando 0 de 0 de un total de 0 entradas",
                    "infoFiltered": "(filtrado de un total de _MAX_ entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ entradas",
                    "loadingRecords": "cargando...",
                    "processing": "",
                    "search": "Buscar: ",
                    "zeroRecords": "No se encontraron registros",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": active para ordenar la columna en orden ascendente",
                        "sortDescending": ": active para ordenar la columna en orden descendente"
                    }
                }
            });
        });
    </script>
    @endsection
</x-app-layout>
