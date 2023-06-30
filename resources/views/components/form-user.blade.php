<div>
    <x-label for="name" value="{{ __('Nombre Completo') }}" />
    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
        :value="old('name')" required autofocus/>
</div>
<div class="mt-4">
    <x-select-td></x-select-td>
</div>
<div class="mt-4">
    <x-label for="documento" value="{{ __('Documento') }}" />
    <x-input id="documento" class="block mt-1 w-full" type="text" name="documento"
        :value="old('documento')" required autofocus/>
</div>
