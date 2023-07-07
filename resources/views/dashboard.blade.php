@extends('layouts.app')

@section('titulo')
    Bienvenido a tu sitio oficial de gestor de facturas
@endsection
@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #9147B2; }
        .cta-btn { color: #924DB0; }
        .upgrade-btn { background: #924DB0; }
        .upgrade-btn:hover { background: #924DB0; }
        .active-nav-link { background: #924DB0; }
        .nav-item:hover { background: #872DAF; }
        .account-link:hover { background: #924DB0; }
        section {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <!-- Gogole Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200&display=swap"
        rel="stylesheet" />

    <!-- AlpineJS -->
    <script
        defer
        src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind -->
    <script src="https://cdn-tailwindcss.vercel.app/"></script>

@endpush

@section('contenido')
    {{-- <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w8/12 lg:w-6/12 px-5">
                <img src="{{asset('imgs/facturas.jpg')}}" alt="Imagen de usuario">
            </div>
            
        </div>
    </div> --}}
    <!-- component -->
    <div class="flex justify-center  " >
        <br>
        <section x-data="xData()" class="bg-pinkS-100 py-10 px-12 ">
            <!-- Card Grid -->
            <div
                class="grid grid-flow-row gap-8 text-neutral-600 justify-center items-center sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                <template x-for="post in posts">
                    <!-- Card Item -->
                    <div
                        class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-pink-200 bg-white dark:bg-pink-100 duration-300 hover:-translate-y-1"
                        x-for="(post, index) in posts">
                        <!-- Clickable Area -->
                        <a :href="post.link" class="cursor-pointer">
                            <figure>
                                <!-- Image -->
                                <img
                                    :src="post.image + '?auto=format&fit=crop&w=400&q=50'"
                                    class="rounded-t h-72 w-full object-cover" />
    
                                <figcaption class="p-4">
                                    <!-- Title -->
                                    <p
                                        class="text-lg mb-4 font-bold leading-relaxed text-center text-gray-900 dark:text-gray-900"
                                        x-text="post.title">
                                        <!-- Post Title -->
                                    </p>
    
                                    {{-- <!-- Description -->
                                    <small
                                        class="leading-5 text-gray-500 dark:text-gray-400"
                                        x-text="post.description">
                                        <!-- Post Description -->
                                    </small> --}}
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                </template>
            <br>
            
        </section>
    </div>
    <!-- Card List Section -->
    
    <script>
        function xData() {
            // Definición de un arreglo de objetos 'posts'
            const posts = [
                {
                    // Propiedad 'image' con la ruta de una imagen para la empresa emisora
                    image: "{{asset('imgs/emisora.jpg')}}",
                    // Propiedad 'title' con el título para la empresa emisora
                    title: "Empresa emisora",
                    // Propiedad 'link' con la ruta para mostrar la empresa emisora
                    link: "{{ route('emisora.show')}}"
                },
                {
                    // Propiedad 'image' con la ruta de una imagen para las facturas
                    image: "{{asset('imgs/facturasVer.jpg')}}",
                    // Propiedad 'title' con el título para las facturas
                    title: "Facturas",
                    // Propiedad 'link' con la ruta para mostrar las facturas
                    link: "{{ route('factura.show')}}"
                },
                {
                    // Propiedad 'image' con la ruta de una imagen para la empresa receptora
                    image: "{{asset('imgs/receptora.jpg')}}",
                    // Propiedad 'title' con el título para la empresa receptora
                    title: "Empresa Receptora",
                    // Propiedad 'link' con la ruta para mostrar la empresa receptora
                    link: "{{ route('receptora.show')}}"
                }
            ];
    
            // Se retorna un objeto con una propiedad 'posts' que contiene el arreglo de objetos 'posts'
            return {
                posts: posts
            };
        }
    </script>
    
    

@endsection