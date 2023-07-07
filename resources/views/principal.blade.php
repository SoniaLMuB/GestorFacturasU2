@extends('layouts.app')

@section('titulo')
    Registro de empresa
@endsection
@section('contenido')

<!-- Container -->
<div class="bg-pink-100 flex items-center justify-center flex-col min-h-screen">
  
    <!-- Login component -->
    <div class="flex shadow-md">
      <!-- Login form -->
        <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 30rem; height: 32rem;">
            <div class="w-72">
            <!-- Heading -->
            <h1 class="text-xl font-semibold">Busca tu factura</h1>
            <small class="text-gray-400">Por favor ingresa los datos!</small>
    
            <!-- Form -->
            <form action="{{route('factura.buscar')}}" method="POST" novalidate>
                    @csrf
                    <!--Genera un token que genera el registro -->
                    <!--Verificar la sesión-->
                    @if (session('mensaje'))
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{session('mensaje')}}
                        </p>
                    @endif 

                    <div class="mb-5">
                        <label for="empresa" class="mb-2 block  text-gray-500 font-bold">Empresa emisora</label>
                        <select name="emisora"
                        class="border p-3 w-full rounded-lg">
                            <option value="">Seleccione una empresa receptora</option>
                            @foreach ($emisoras as $x)
                                <option value="{{ $x->id }}">{{ $x->razon_social }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="mb-5">
                        <label for="empresa" class="mb-2 block  text-gray-500 font-bold">Empresa emisora</label>
                        <select name="receptora"
                        class="border p-3 w-full rounded-lg">
                            <option value="">Seleccione una empresa receptora</option>
                            @foreach ($receptoras as $x)
                                <option value="{{ $x->id }}">{{ $x->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div  class="mb-5">
                        <!--Usuario-->
                        <label for="folio" class="mb-2 block  text-gray-500 font-bold">Folio</label>
                        <input id="folio" name="folio" type="text" placeholder="Ingresa la Razón Social" class="border p-3 w-full rounded-lg
                        @error('folio') border-red-500  @enderror"
                        value="{{old('folio')}}">
                    </div>


                    
                    

                    <input type="submit" value="Registrar" class="bg-pink-300 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"> 
                </form>
            
            </div>
        </div>
  
      
  
    </div>
  

</div>
@endsection