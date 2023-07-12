@extends('layouts.app')

@section('titulo')
    Agregar Factura
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')

<!-- Container -->
<div class="bg-pink-100 flex items-center justify-center flex-col min-h-screen">
<br>
<br>
<br>
    <!-- Login component -->
    <div class="flex shadow-md">
        <!-- Login form -->
        <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 32rem">
            <div class="w-72">
                <!-- Heading -->
                <h1 class="text-xl font-semibold">Registro de la factura</h1>
                <small class="text-gray-400">Por favor ingresa los datos!</small>

                <!-- Form -->
                <form action="{{ route('factura.store') }}" method="POST" novalidate>
                    @csrf
                    <!--Genera un token que genera el registro -->
                    <!--Verificar la sesión-->
                    @if (session('mensaje'))
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ session('mensaje') }}
                        </p>
                    @endif

                    <div class="mb-5">
                        <!--Obtener -->
                        <label for="empresa" class="mb-2 block  text-gray-500 font-bold">Empresa emisora</label>
                        <select name="emisora" class="border p-3 w-full rounded-lg">
                            @if (count($emisora) > 0)
                                <option value="">Seleccione una empresa emisora</option>
                                @foreach ($emisora as $x)
                                    <option value="{{ $x->id }}">{{ $x->razon_social }}</option>
                                @endforeach
                            @else
                                <option value="">No hay empresas emisoras</option>
                            @endif
                        </select>
                        <!--Mostrar el mensaje de error-->
                        @error('emisora')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <!--Usuario-->
                        <label for="empresa" class="mb-2 block  text-gray-500 font-bold">Empresa Receptora</label>
                        <select name="receptora"
                        class="border p-3 w-full rounded-lg">
                            @if (count($receptora) > 0)
                                <option value="">Seleccione una empresa receptora</option>
                                @foreach ($receptora as $x)
                                    <option value="{{ $x->id }}">{{ $x->nombre }}</option>
                                @endforeach
                            @else
                                <option value="">No hay empresas emisoras</option>
                            @endif
                        </select>
                        <!--Mostrar el mensaje de error-->
                        @error('receptora')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <input name="pdf" type="hidden" value="{{ old('pdf') }}">
                        @error('pdf')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <input name="xml" type="hidden" value="{{ old('xml') }}">
                        @error('xml')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <!--Usuario-->
                        <label for="folio" class="mb-2 block uppercase text-gray-500 font-bold">Folio</label>
                        <input id="folio" name="folio" type="text" placeholder="Ingresa el RFC de la empresa"
                            class="border p-3 w-full rounded-lg @error('folio') border-red-500 @enderror"
                            value="{{ old('folio') }}">
                            <!--Mostrar el mensaje de error-->
                        @error('folio')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                    </div>

                    <input type="submit" value="Registrar"
                        class="bg-pink-300 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
            </div>
        </div>

        <!-- Cargar los archivo (Dropzone) -->
        <div class="flex flex-wrap content-center justify-center bg-white" style="width: 32rem">
            <div class="w-72">
                <label for="dropzonepdf" class="mb-2 block text-gray-500 font-bold">Factura en pdf</label>
                <div class="md:w-1/2 px-10">
                    <form action="{{ route('factura.pdf') }}" method="POST" enctype="multipart/form-data"
                        id="dropzonePdf"
                        class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <!-- Cargar los archivo (Dropzone)-->
        <div class="flex flex-wrap content-center justify-center bg-white" style="width: 32rem">
            <div class="w-72">
                <label for="dropzonexml" class="mb-2 block text-gray-500 font-bold">Factura en xml</label>
                <div class="md:w-1/2 px-10">
                    <form action="{{ route('factura.xml') }}" method="POST" enctype="multipart/form-data"
                        id="dropzoneXml"
                        class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
</div>
<br>
@endsection
