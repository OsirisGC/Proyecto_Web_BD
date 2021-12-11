<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/head.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/mapbox.php');
    ?>
</head>

<body class="bg-gray-600">
    <header class="w-full bg-gray-800 h-20 flex items-center px-3 shadow-xl">

        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
        </svg>

        <h1 class="text-white font-bold"><a href="/proyecto/src/index.php">REPORTER APP</a></h1>

        <button id="btn" class="ml-auto border-3 h-10 text-white bg-blue-500 p-1 rounded-lg mt-3">Iniciar Sesion</button>
    </header>
    <div class="mt-0">
        <div id='map' style='width: 100%; height: 300px;' class='rounded-b-lg'></div>
    </div>

    <div class="w-full text-white p-10">
        <div class="bg-gray-800 border-2 border-gray-500 h-auto p-3 rounded-lg m-2 overflow-hidden w-full">
            <h2 id="__titulo" class="w-full bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500"></h2>
            <div class=" my-4 w-full bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500">
                <span>Descripcion:</span><br>
                <p id="__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, aspernatur?</p>
            </div>
            <div class="w-full flex flex-wrap">
                <h3 class="w-auto m-0 flex bg-blue-300 gap-2 px-3 py-1 text-blue-600 rounded-lg border-2 border-blue-500"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span id="__ubi">ubicacion</span>
                </h3>
                <span id="__date" class="ml-auto bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500">01/01/2021</span>
            </div>
            <div class="flex mt-5">
                <div class="bg-blue-300 px-3 py-1 text-blue-600 rounded-lg border-2 border-blue-500 ">
                    <h4 id="__status">Status: enviado</h4>
                </div>
                <div class="ml-auto bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500">
                    <h4 id="__danger">4/10</h4>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/footermap.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/get_report.php');
    ?>
    <script src="/proyecto/src/js/details.js"></script>
</body>

</html>