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
            <h1 class="text-xl font-semibold">Registro de la empresa emisora</h1>
            <small class="text-gray-400">Por favor ingresa los datos!</small>
    
            <!-- Form -->
            <form action="{{route('emisora.store')}}" method="POST" novalidate>
                    @csrf
                    <!--Genera un token que genera el registro -->
                    <!--Verificar la sesión-->
                    @if (session('mensaje'))
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{session('mensaje')}}
                        </p>
                    @endif 

                    <div  class="mb-5">
                        <!--Usuario-->
                        <label for="razon_social" class="mb-2 block  text-gray-500 font-bold">Razón Social</label>
                        <input id="razon_social" name="razon_social" type="text" placeholder="Ingresa la Razón Social" class="border p-3 w-full rounded-lg
                        @error('razon_social') border-red-500  @enderror"
                        value="{{old('razon_social')}}">
                    </div>

                    <div  class="mb-5">
                        <!--Usuario-->
                        <label for="email" class="mb-2 block  text-gray-500 font-bold">Correo eléctronico</label>
                        <input id="email" name="email" type="text" placeholder="Ingresa el  correo eléctronico" class="border p-3 w-full rounded-lg
                        @error('email') border-red-500  @enderror"
                        value="{{old('email')}}">
                    </div>

                    <div  class="mb-5">
                        <!--Usuario-->
                        <label for="rfc_emisora" class="mb-2 block text-gray-500 font-bold">RFC</label>
                        <input id="rfc_emisora" name="rfc_emisora" type="text" placeholder="Ingresa el Rfc de la empresa" class="border p-3 w-full rounded-lg
                        @error('rfc_emisora') border-red-500  @enderror"
                        value="{{old('rfc_emisora')}}">
                    </div>
                    
                    

                    <input type="submit" value="Registrar" class="bg-pink-300 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"> 
                </form>
            
            </div>
        </div>
  
      
  
    </div>
  

</div>
@endsection