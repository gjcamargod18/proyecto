@section('title')
    Usuarios Registrados
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
                    {{$user->name}}
                </h1>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="mt-6 px-5 mb-4 leading-relaxed">
                                <form class="space-y-6" method="POST" action="{{ route('editar') }}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="">
                                        <x-label for="name" value="{{ __('Nombre Completo') }}" />
                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                            value="{{$user->name}}" required autofocus/>
                                    </div>
                                    <div class="mt-4">
                                        <x-select-td></x-select-td>
                                    </div>
                                    <div class="mt-4">
                                        <input type="hidden" value="{{$user->id}}" name="id" id="id">
                                        <x-label for="documento" value="{{ __('Documento') }}" />
                                        <x-input id="documento" value="{{$user->documento}}"  class="block mt-1 w-full" type="text" name="documento"
                                             required autofocus/>
                                    </div>
                                    <x-button class="ml-4">
                                        {{ __('Guardar') }}
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
