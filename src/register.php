<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/api/v1/Users/isActive.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/head.php');
    ?>
</head>

<body class="bg-gray-600">
    <!-- ESCRIBIR CODIGO DEBAJO DE ESTE COMENTARIO-->
    <header class="w-full bg-gray-800 h-20 flex items-center px-3 shadow-xl mb-10">

        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
        </svg>

        <h1 class="text-white font-bold"><a href="/proyecto/src/index.php">REPORTER APP</a></h1>
    </header>

    <div class="w-full flex justify-center h-auto">
        <div class="bg-gray-800 text-white w-2/12text-center flex flex-col gap-3 items-center p-5 rounded-xl py-16">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                </svg>
                <h1 class="text-xl">Login</h1>
            </div>
            <form action="" class="flex flex-col gap-1  w-[300px]" id="registerForm">
                <span>Nombre:</span>
                <input class="border-2 bg-gray-800 text-white border-gray-400 outline-none rounded-lg" type="text" name="name" id="name">
                <span>Primer Apellido:</span>
                <input class="border-2 bg-gray-800 text-white border-gray-400 outline-none rounded-lg" type="text" name="lastname1" id="lastname1">
                <span>Segundo Apellido:</span>
                <input class="border-2 bg-gray-800 text-white border-gray-400 outline-none rounded-lg" type="text" name="lastname2" id="lastname2">
                <span>Email:</span>
                <input class="border-2 bg-gray-800 text-white border-gray-400 outline-none rounded-lg" type="text" name="email" id="email">
                <span>Nacimiento:</span>
                <input class="border-2 bg-gray-800 text-white border-gray-400 outline-none rounded-lg" type="date" name="birth" id="birth">
                <span>Contraseña:</span>
                <input class="border-2 bg-gray-800 text-white border-gray-400 outline-none rounded-lg" type="password" name="password" id="password">
                <input class="border-3 text-white bg-blue-500 p-1 rounded-lg mt-3" type="submit" value="REGISTER">
                <input class="border-3 text-white bg-blue-500 p-1 rounded-lg mt-3" type="button" value="LOGIN" id="btn">
            </form>
        </div>
    </div>


    <!-- NO ESCRIBIR CODIGO DEBAJO DE ESTO -->
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/proyecto/components/templates/registerFooter.php'); ?>
    <!-- NO ESCRIBIR CODIGO DEBAJO DE ESTO -->
</body>

</html>