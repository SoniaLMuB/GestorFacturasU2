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
        <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 32rem">
            <div class="w-72">
            <!-- Heading -->
            <h1 class="text-xl font-semibold">Registro de la empresa Receptora</h1>
            <small class="text-gray-400">Por favor ingresa los datos!</small>
    
            <!-- Form -->
            <form action="{{route('receptora.store')}}" method="POST" novalidate>
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
                        <label for="nombre" class="mb-2 block  text-gray-500 font-bold">Nombre</label>
                        <input id="nombre" name="nombre" type="text" placeholder="ingresa el nombre de la empresa" class="border p-3 w-full rounded-lg
                        @error('nombre') border-red-500  @enderror"
                        value="{{old('nombre')}}">
                        <!--Mostrar el mensaje de error-->
                        @error('nombre')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div  class="mb-5">
                        <!--Usuario-->
                        <label for="direccion" class="mb-2 block  text-gray-500 font-bold">Dirección</label>
                        <input id="direccion" name="direccion" type="text" placeholder="ingresa direccion de la empresa" class="border p-3 w-full rounded-lg
                        @error('direccion') border-red-500  @enderror"
                        value="{{old('direccion')}}">
                        <!--Mostrar el mensaje de error-->
                        @error('direccion')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                    
                    <div  class="mb-5">
                        <!--Usuario-->
                        <label for="rfc" class="mb-2 block uppercase text-gray-500 font-bold">RFC</label>
                        <input id="rfc" name="rfc" type="text" placeholder="Ingresa el RFC de la empresa" class="border p-3 w-full rounded-lg
                        @error('rfc') border-red-500  @enderror"
                        value="{{old('rfc')}}">
                        <!--Mostrar el mensaje de error-->
                        @error('rfc')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div  class="mb-5">
                        <!--Usuario-->
                        <label for="contacto" class="mb-2 block uppercase text-gray-500 font-bold">Contacto</label>
                        <input id="contacto" name="contacto" type="text" placeholder="Ingresa el contacto de la empresa" class="border p-3 w-full rounded-lg
                        @error('contacto') border-red-500  @enderror"
                        value="{{old('contacto')}}">
                        <!--Mostrar el mensaje de error-->
                        @error('contacto')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div  class="mb-5">
                        <!--Usuario-->
                        <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo eléctronico</label>
                        <input id="email" name="email" type="text" placeholder="tu correo eléctronico" class="border p-3 w-full rounded-lg
                        @error('email') border-red-500  @enderror"
                        value="{{old('email')}}">
                        <!--Mostrar el mensaje de error-->
                        @error('email')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    
                    
                    

                    <input type="submit" value="Registrar" class="bg-pink-300 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"> 
                </form>
            <br>
            </div>
        </div>
  
      
  
    </div>
  

</div>
<br>
@endsection