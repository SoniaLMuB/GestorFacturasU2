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
    <header class="p-3 border-b   shadow">
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
                    <a href="{{route('post.index')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer   transition-colors">
                        
                        Dashboard
                    </a>
                    <a href="{{route('emisora.show')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer    transition-colors" >
                        
                        Empresa Emisora
                    </a>
                    <a href="{{route('receptora.show')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer  transition-colors" >
                        
                        Empresa Receptora
                    </a>
                    <a href="{{route('facturas.show')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer     transition-colors" >
                        
                          
                          
                        Facturas
                    </a>
                    <a href="{{route('logout')}}" class="w-25 flex items-center gap-2  p-2 text-gray-600 rounded text-lg  font-font-bold cursor-pointer  transition-colors" >
                        
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
        <h2 class="font-black text-center text-3xl ">
            @yield('titulo')
        </h2>
        <div class="">
            @yield('contenido')
        </div>
       
    </main>
    <!--Pie de pagina -->
    <footer class="text-center  p-3 text-gray-500 font-bold ">
        Gestor de facturas - Todos los derechos reservados {{now()->year}}
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