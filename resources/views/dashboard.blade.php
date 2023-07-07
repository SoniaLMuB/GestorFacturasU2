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
    
    
    

@endsection