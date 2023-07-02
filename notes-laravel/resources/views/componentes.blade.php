
{{-- todo lo que esta en @component se renderiza en {{$slot}} --}}
@component('components.layout') {{-- trae la vista resources/views/components/layout --}}

  <h3>Directiva component</h3>
    
@endcomponent


{{-- blade tambien tiene etiquetas de componentes --}}

{{-- la etiqueta asume la carpeta resources/views/components/ con el "x-" --}}
{{-- solo se le debe especificar el archivo --}}
  <x-layout
    :suma="1+1"  {{-- con los dos puntos evalua el tipo de dato --}}
  > 
    {{-- todo lo que este dentro de esta etiqueta <x-layout> se renderiza donde esta el slot --}}


    {{-- a traves de name="" se coneta con una propiedad del componente --}}
    <x-slot name="titulo" > titulo de prueba </x-slot> {{-- se puede hacer esto mismo con: <x-layout titulo="titulo de prueba" > --}}


    <h3>Etiqueta component</h3>

  </x-layout>

