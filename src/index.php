<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/head.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/mapbox.php');
    ?>
</head>

<body class="bg-gray-600">

    <!-- ESTE CODIGO GENERA LAS CLASES NECESARIAS DE TAILWIND NO ELIMINAR -->
    <div class="hidden sm:mx-3 bg-gray-800 border-2 border-gray-500 h-auto p-3 rounded-xl mx-3 mb-2 overflow-hidden w-full "></div>
    <div class="hidden w-full bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500"></div>
    <div class="hidden cursor-pointer mx-auto my-4 w-full bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500"></div>
    <div class="hidden w-auto m-0 bg-blue-300 px-3 py-1 text-blue-600 rounded-lg border-2 border-blue-500"></div>
    <div class="hidden ml-auto bg-gray-800 px-3 py-1 text-white rounded-lg border-2 border-gray-500"></div>
    <div class="hidden bg-blue-300 px-3 flex-wrap py-1 text-blue-600 rounded-lg border-2 border-blue-500 w-5 h-auto"></div>
    <!-- ESTE CODIGO GENERA LAS CLASES NECESARIAS DE TAILWIND NO ELIMINAR -->

    <header class="w-full bg-gray-800 h-20 flex items-center px-3 shadow-xl mb-10">

        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
        </svg>

        <h1 class="text-white font-bold"><a href="/proyecto/src/index.php">REPORTER APP</a></h1>

        <button id="btn" class="ml-auto border-3 h-10 text-white bg-blue-500 p-1 rounded-lg mt-3">Iniciar Sesion</button>
    </header>

    <div class="flex flex-col-reverse sm:flex-row w-full p-2">
        <div id="contenedor-principal" class="w-full text-center sm:text-justify sm:w-2/3">
        </div>
        <aside class="w-full sm:w-1/3 px-5 justify-self-start sm:justify-self-end">
            <div class="bg-gray-800 border-2 text-white border-gray-500 rounded-xl p-4 w-full h-auto flex flex-col items-center">
                <div id="top" class="">
                    <h2>HERRAMIENTAS</h2>
                </div>
                <hr class="w-full">
                <div id="" class="flex flex-col items-center w-full mt-10">
                    <h2>REPORTES</h2>
                    <form action="" class="flex flex-col w-10/12 gap-1">
                        <span>Titulo:</span>
                        <input class="border-2 bg-gray-800  border-gray-400 outline-none rounded-lg" type="text" name="title" id="title">
                        <span>descripcion:</span>
                        <input class="border-2 bg-gray-800 border-gray-400 outline-none rounded-lg" type="text" name="description" id="description">
                        <span>fecha y hora:</span>
                        <input class="border-2 bg-gray-800 border-gray-400 outline-none rounded-lg" type="date" name="date" id="date">
                        <span>ubicacion:</span>
                        <input class="border-2 bg-gray-800 border-gray-400 outline-none rounded-lg" type="text" name="location" id="location">
                        <span>peligro:</span>
                        <input class="border-2 bg-gray-800 border-gray-400 outline-none rounded-lg" type="number" name="danger" id="danger">
                        <input class="border-3 text-white bg-blue-500 p-1 rounded-lg mt-3" type="submit" value="Enviar" id="sendbtn">
                    </form>
                </div>
                <hr class="w-full my-3">
                <div id="" class="w-10/12 ">
                    <h2 class="text-center my-3">ACTUALIZAR USUARIO</h2>
                    <form action="" id="updateUser" class="flex flex-col w-auto">
                        <span class="">id de usuario</span>
                        <input class="border-2 bg-gray-800 border-gray-400 outline-none rounded-lg" type="number" name="id_user" id="id_user">
                        <span class="">cuenta</span>
                        <select class="border-2 bg-gray-800 border-gray-400 outline-none rounded-lg mb-10" name="tipo_cuenta" id="tipo_cuenta">
                            <option value="verified">verified</option>
                            <option value="admin">admin</option>
                        </select>
                        <input class="border-3 text-white bg-blue-500 p-1 rounded-lg" type="submit" value="Enviar" id="">
                    </form>
                </div>
                <hr class="w-full my-3">
                <div id="" class="w-10/12">
                    <h2 class="text-center my-3">ACTUALIZAR REPORTE</h2>
                    <form action="" id="updateReport" class="flex flex-col gap-1 w-auto">
                        <span class="">id de reporte</span>
                        <input class="border-2 bg-gray-800 border-gray-400 outline-none rounded-lg" type="number" name="id_report" id="id_report">
                        <span class="">status</span>
                        <select class="border-2 bg-gray-800 border-gray-400 outline-none rounded-lg" name="tipo_reporte" id="tipo_reporte">
                            <option value="aceptado">aceptado</option>
                            <option value="rechazado">rechazado</option>
                            <option value="atendiendo">atendiendo</option>
                            <option value="solucionado">solucionado</option>
                        </select>
                        <input class="border-3 text-white bg-blue-500 p-1 rounded-lg" type="submit" value="Enviar" id="">
                    </form>
                </div>
            </div>

        </aside>
    </div>



    <div></div>

    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/footerreport.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/get_report.php');
    ?>
</body>

</html>