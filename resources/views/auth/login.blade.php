@extends('layouts.app')

@section('titulo')
    Iniciar Sesión
@endsection
@section('contenido')
<!-- Container -->
<div class="bg-pink-100 flex items-center justify-center flex-col min-h-screen">
  <br>
    <!-- Login component -->
    <div class="flex shadow-md">
        <br>
        <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
            <br>
            <div class="w-72">
            <!-- Heading -->
            <h1 class="text-xl font-semibold">Bienvenidos</h1>
            <small class="text-gray-400">Por favor ingresa tus datos!</small>
    
            <!-- Form -->
            <form action="{{route('login')}}" method="POST" novalidate>
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
                        <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                        <input id="email" name="email" type="text" placeholder="tu email" class="border p-3 w-full rounded-lg
                        @error('email') border-red-500  @enderror"
                        value="{{old('email')}}">
                    </div>

                    <div  class="mb-5">
                        <!--Contraseña-->
                        <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                        <input id="password" name="password" type="password" placeholder="tu contraseña" class="border p-3 w-full rounded-lg">
                    </div>

                    <input type="submit" value="Login" class="bg-pink-300 hover:bg-pink-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"> 
                </form>
            
            </div>
        </div>
  
      <!-- Login banner -->
      <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
        <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="https://i.pinimg.com/564x/e7/3d/a6/e73da648296d55a3cd3aafbd0efd6148.jpg">
      </div>
  
    </div>
  
<br>
</div>
@endsection