@extends('layouts.app')

@section('titulo')
    Busca tu factura
@endsection
@section('contenido')

<!-- Container -->
<div class="bg-pink-100 flex items-center justify-center flex-col min-h-screen">
    <br>
    <br>
    <!-- Login component -->
    <div class="flex shadow-md">
        <!-- Login form -->
        <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 30rem; ">
            <div class="w-72">
                <br>
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
                        <label for="empresa" class="mb-2 block  text-gray-500 font-bold">Empresa Emisora</label>
                        <select name="emisora"
                        class="border p-3 text-gray-500  w-full rounded-lg">
                            <option value="">Seleccione una empresa receptora</option>
                            @foreach ($emisoras as $x)
                                <option value="{{ $x->id }}">{{ $x->razon_social }}</option>
                            @endforeach
                            
                        </select>
                        <!--Mostrar el mensaje de error-->
                        @error('emisora')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="empresa" class="mb-2 block  text-gray-500 font-bold">Empresa Receptora</label>
                        <select name="receptora"
                        class="border p-3 w-full text-gray-500  rounded-lg">
                            <option value="">Seleccione una empresa receptora</option>
                            @foreach ($receptoras as $x)
                                <option value="{{ $x->id }}">{{ $x->nombre }}</option>
                            @endforeach
                        </select>
                        <!--Mostrar el mensaje de error-->
                        @error('receptora')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div  class="mb-5">
                        <!--rfc-->
                        <label for="rfc" class="mb-2 block  text-gray-500 font-bold">Rfc de la empresa Receptora</label>
                        <input id="rfc" name="rfc" type="text" placeholder="Ingresa el rfc de la empresa receptora" class="border p-3 w-full rounded-lg
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
                        <!--folio-->
                        <label for="folio" class="mb-2 block  text-gray-500 font-bold">Folio</label>
                        <input id="folio" name="folio" type="text" placeholder="Ingresa la Razón Social" class="border p-3 w-full rounded-lg
                        @error('folio') border-red-500  @enderror"
                        value="{{old('folio')}}">
                        <!--Mostrar el mensaje de error-->
                        @error('folio')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                    <input type="submit" value="Buscar" class="bg-pink-300 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"> 
                    <br>

                </form>
            
            </div>
        </div>
        <!-- Login banner -->
        <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 26rem;">
            <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="https://img.freepik.com/vector-premium/lupa-icono-documento-estilo-plano-ilustracion-vector-aprobacion-informe-sobre-fondo-aislado-concepto-negocio-signo-hoja-papel_157943-830.jpg">
        </div>
        <br>
    </div>
    <br>

</div>
@endsection