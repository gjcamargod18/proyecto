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
                <a href="#" class="block max-w-sm p-6 bg-red-500 border border-red-200 rounded-lg shadow">
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
                <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                    Crear usuarios
                </h1>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="mt-6 px-5 mb-4 leading-relaxed">
                                <form class="space-y-6" method="POST" action="{{ route('create') }}">
                                    @csrf
                                    <x-form-user></x-form-user>
                                    <div class="mt-4">
                                        <x-component-input-select></x-component-input-select>
                                    </div>
                                    <x-button class="ml-4">
                                        {{ __('Crear usuario') }}
                                    </x-button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    </div>

</x-app-layout>
