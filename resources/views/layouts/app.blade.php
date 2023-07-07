<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{--<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
    <!--link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> 
     --}}
    @stack('styles')
    @vite('resources/js/app.js')
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

    </style>
    @vite ('resources/css/app.css')

</head>
<body class="bg-gray-100 antialiased">

    <!--ENCABEZADO DE LA PAGINA -->
    <header class="p-3 border-b  bg-pink-300 shadow">
        <div class="container mx-auto flex justify-between items-center">
            
            {{-- <a  class="text-3xl font-black">
                Devstagram
            </a> --}}
            <!--Aplicar Helper para verificar si esta autenticado-->
            @auth
                <a href="{{route('post.index')}}" class="text-xl text-gray-600 font-bold">Gestor de Facturas</a> 
                <!--Vinculo botón de publicar Post-->
                
                <!--BOTONES DEL MENÚ PARA INTERACCION DEL USUARIO-->
                <nav class="flex items-center justify-center font-bold ">
                    <a href="{{route('post.index')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer  hover:text-pink-500  hover:bg-pink-300 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{route('emisora.show')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer  hover:text-pink-500  hover:bg-pink-300  transition-colors" >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M4 16.5v-13h-.25a.75.75 0 010-1.5h12.5a.75.75 0 010 1.5H16v13h.25a.75.75 0 010 1.5h-3.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 00-.75-.75h-2.5a.75.75 0 00-.75.75v2.5a.75.75 0 01-.75.75h-3.5a.75.75 0 010-1.5H4zm3-11a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zM7.5 9a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM11 5.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zm.5 3.5a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1z" clip-rule="evenodd" />
                        </svg> 
                        Empresa Emisora
                    </a>
                    <a href="{{route('receptora.show')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer  hover:text-pink-500  hover:bg-pink-300 transition-colors" >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M1 2.75A.75.75 0 011.75 2h10.5a.75.75 0 010 1.5H12v13.75a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 00-.75-.75h-2.5a.75.75 0 00-.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 010-1.5H2v-13h-.25A.75.75 0 011 2.75zM4 5.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zM4.5 9a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM8 5.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zM8.5 9a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM14.25 6a.75.75 0 00-.75.75V17a1 1 0 001 1h3.75a.75.75 0 000-1.5H18v-9h.25a.75.75 0 000-1.5h-4zm.5 3.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zm.5 3.5a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1z" clip-rule="evenodd" />
                        </svg>
                        Empresa Receptora
                    </a>
                    <a href="{{route('factura.show')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer  hover:text-pink-500  hover:bg-pink-300 transition-colors" >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M17.663 3.118c.225.015.45.032.673.05C19.876 3.298 21 4.604 21 6.109v9.642a3 3 0 01-3 3V16.5c0-5.922-4.576-10.775-10.384-11.217.324-1.132 1.3-2.01 2.548-2.114.224-.019.448-.036.673-.051A3 3 0 0113.5 1.5H15a3 3 0 012.663 1.618zM12 4.5A1.5 1.5 0 0113.5 3H15a1.5 1.5 0 011.5 1.5H12z" clip-rule="evenodd" />
                            <path d="M3 8.625c0-1.036.84-1.875 1.875-1.875h.375A3.75 3.75 0 019 10.5v1.875c0 1.036.84 1.875 1.875 1.875h1.875A3.75 3.75 0 0116.5 18v2.625c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625v-12z" />
                            <path d="M10.5 10.5a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963 5.23 5.23 0 00-3.434-1.279h-1.875a.375.375 0 01-.375-.375V10.5z" />
                        </svg>
                          
                          
                        Facturas
                    </a>
                    <a href="{{route('logout')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer  hover:text-pink-500  hover:bg-pink-300 transition-colors" >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-4.28 9.22a.75.75 0 000 1.06l3 3a.75.75 0 101.06-1.06l-1.72-1.72h5.69a.75.75 0 000-1.5h-5.69l1.72-1.72a.75.75 0 00-1.06-1.06l-3 3z" clip-rule="evenodd" />
                        </svg>
                        Cerrar Sesión
                    </a>
                    {{-- <form method="POST"action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="link-style flex items-center gap-2 p-2 text-gray-600 text-lg  font-font-bold cursor-pointer hover:text-pink-500  hover:bg-pink-300 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M1 2.75A.75.75 0 011.75 2h10.5a.75.75 0 010 1.5H12v13.75a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 00-.75-.75h-2.5a.75.75 0 00-.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 010-1.5H2v-13h-.25A.75.75 0 011 2.75zM4 5.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zM4.5 9a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM8 5.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zM8.5 9a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM14.25 6a.75.75 0 00-.75.75V17a1 1 0 001 1h3.75a.75.75 0 000-1.5H18v-9h.25a.75.75 0 000-1.5h-4zm.5 3.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zm.5 3.5a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1z" clip-rule="evenodd" />
                            </svg> Cerrar Sesión
                        </button>
                    </form> --}}
                </nav>
            @endauth 
            <!--Determinar que -->
            @guest
                <a href="#" class="text-3xl font-black">Gestor de Facturas</a>
                <!--Navegacion -->
                <nav class="flex gap-2 item-ceter">
                    <a class="font-bold uppercase text-gray-900 text-sm" href="{{route('login')}}">Login</a>
                    {{--<a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear cuenta</a> --}}
                </nav>
            @endguest

        </div>
    </header>
    <!--Contenido para cada una de las vistas-->
    <main class="container mx-auto ">
        <h2 class="font-black text-center text-3xl  bg-pink-100">
            @yield('titulo')
        </h2>
        <div class="bg-pink-100">
            @yield('contenido')
        </div>
       
    </main>
    <!--Pie de pagina -->
    <footer class="text-center bg-pink-300 p-3 text-gray-500 font-bold ">
        Sonia Lizbeth Muñoz Barrientos Gestor de facturas - Todos los derechos reservados {{now()->year}}
    </footer>       
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

    <script>
        //Se inicializan las funciones para exportar los archivos PDF y Excel de las tablas
            function exportToPDF(tipo) {
                var maintable = document.getElementById('table1');
                var pdfout = document.getElementById('pdfout');
                var doc = new jsPDF('p', 'pt', 'letter');
                var margin = 20;
                var scale = (doc.internal.pageSize.width - margin * 2) / document.body.clientWidth;
                var scale_mobile = (doc.internal.pageSize.width - margin * 2) / document.body.getBoundingClientRect();
                //Se obtiene el tipo de dispositivo en donde esta el navegador
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    //Se agregan los componentes a la tabla del PDF
                    doc.html(maintable, {
                        x: margin,
                        y: margin,
                        html2canvas: {
                            scale: scale,
                            ignoreElements: function (element) {
                                return element.classList.contains('exclude-column');
                            }
                        },
                        callback: function (doc) {
                            doc.save(tipo + '.pdf');
                        }
                    });
                } else {
                    doc.html(maintable, {
                        x: margin,
                        y: margin,
                        html2canvas: {
                            scale: scale,
                            ignoreElements: function (element) {
                                return element.classList.contains('exclude-column');
                            }
                        },
                        callback: function (doc) {
                            doc.save(tipo + '.pdf');
                        }
                    });
                }
            }
        //Funcion para exportar el xlsx
        function exportarXLSX(tipo) {
            // Obtén la tabla que deseas exportar
            const table = document.getElementById('table1');

            // Crea un nuevo libro de trabajo de Excel
            const workbook = XLSX.utils.table_to_book(table);

            // Genera un archivo de Excel a partir del libro de trabajo
            const excelBuffer = XLSX.write(workbook, {
                bookType: 'xlsx',
                type: 'array'
            });

            // Crea un blob a partir del buffer de Excel
            const blob = new Blob([excelBuffer], {
                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            });

            // Crea un enlace de descarga para el archivo de Excel
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = tipo+'.xlsx';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    </script>