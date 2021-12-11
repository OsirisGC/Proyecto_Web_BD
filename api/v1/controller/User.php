<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/proyecto/api/v1/controller/Controller.php");

class User extends Controller
{
    function __construct($jsonResponse = "true")
    {
        parent::__construct($jsonResponse);
    }

    function isloggedIn()
    {
        return isset($_SESSION["user"]);
    }


    function logout()
    {
        $response = [];
        try {
            session_destroy();
            $response = [
                "message" => "Se ha cerrado las sesion correctamente",
            ];
        } catch (Exception $e) {
            $response = [
                "message" => "Ha ocurrido un error inesperado. Intente nuevamente",
                "details" => $e->getMessage(),
            ];
            $this->code = 500;
        }
        return $response;
    }

    function getReport(){
        $response = [];

        $report = $this->db->get("SELECT * FROM reportes");

        if($report){

            $response = [
                "data" => $report,
                "message" => "todo funciono con exito",
            ]; 
        }else{
            $this -> code = 404;
            $response = [
                "message" => "No existen reportes en la base de datos",
            ];
        }

        return $response;
    }

    function updateReport()
    {
        $response = [];

        if ($this->isloggedIn()) {
            $user = $_SESSION["user"];
            $cuenta = $this->db->get("SELECT tipo_cuenta FROM usuarios WHERE id = '$user'");
            if ($cuenta) {
                if ($cuenta[0]->tipo_cuenta === "verified") {
                    $this->code = 403;
                    $response = [
                        "message" => "Su cuenta no cuenta con los permisos suficientes",
                    ];
                } else {
                    if (isset($_POST["id_report"]) && isset($_POST["tipo_reporte"])) {

                        $id_report = $_POST["id_report"];
                        $tipo_reporte = $_POST["tipo_reporte"];
                        $isIn = $this->db->get("SELECT id FROM usuarios WHERE id = '$id_report'");
                        if($isIn){
                            $update = $this->db->post("call sp_update_estatus_reportes('$id_report','$tipo_reporte')");
                            if ($update) {
                                $response = [
                                    "message" => "Se actualizo la informacion correctamente",
                                ];
                            } else {
                                $this->code = 500;
                                $response = [
                                    "message" => "ocurrio un error Inesperado",
                                ];
                            }
                        }else {
                            $response = [
                                "message" => "Error - No se encuentra ese reporte",
                            ];
                        }
                    } else {
                        $response = [
                            "message" => "no se ingresaron datos"
                        ];
                    }
                }
            } else {
                $response = [
                    "message" => "Ha ocurrido un error inesperado. Intente nuevamente",
                ];
                $this->code = 500;
            }
        } else {
            $this->code = 401;
            $response = [
                "message" => "Error - usted no esta logueado",
            ];
        }

        return $response;
    }

    function updateUser()
    {
        $response = [];
        if ($this->isloggedIn()) {
            $user = $_SESSION["user"];
            $cuenta = $this->db->get("SELECT tipo_cuenta FROM usuarios WHERE id = '$user'");
            if ($cuenta) {
                if ($cuenta[0]->tipo_cuenta === "verified") {
                    $this->code = 403;
                    $response = [
                        "message" => "Su cuenta no cuenta con los permisos suficientes",
                    ];
                } else {
                    if (isset($_POST["id_user"]) && isset($_POST["tipo_cuenta"])) {
                        $id_user = $_POST["id_user"];
                        $tipo_cuenta = $_POST["tipo_cuenta"];
                        $isIn = $this->db->get("SELECT id FROM usuarios WHERE id = '$id_user'");
                        if ($isIn) {
                            $update = $this->db->post("CALL sp_update_estatus_usuario('$id_user','$tipo_cuenta')");
                            if ($update) {
                                $response = [
                                    "message" => "Se actualizo la informacion correctamente",
                                ];
                            } else {
                                $this->code = 500;
                                $response = [
                                    "message" => "ocurrio un error Inesperado",
                                ];
                            }
                        } else {
                            $response = [
                                "message" => "Error - No se encuentra ese usuario",
                            ];
                        }
                    } else {
                        $response = [
                            "message" => "no se ingresaron datos"
                        ];
                    }
                }
            } else {
                $response = [
                    "message" => "Ha ocurrido un error inesperado. Intente nuevamente",
                ];
                $this->code = 500;
            }
        } else {
            $this->code = 401;
            $response = [
                "message" => "Error - usted no esta logueado",
            ];
        }

        return $response;
    }

    function reportar()
    {
        $response = [];
        if ($this->isloggedIn()) {

            if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['date']) && isset($_POST['location']) && isset($_POST['danger'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $date = $_POST['date'];
                $location = $_POST['location'];
                $danger = $_POST['danger'];

                $report = $this->db->post("call sp_llenar_reporte('$title','$description','$date','$location','$danger')");

                if ($report) {
                    $response = [
                        "message" => "Se ah enviado el reporte correctamente"
                    ];
                } else {
                    $response = [
                        "message" => "Ha ocurrido un error inesperado. Intente nuevamente",
                    ];
                    $this->code = 500;
                }
            } else {
                $this->code = 400;
                $response = [
                    "message" => "Ha ocurrido un error - No completo el formulario",
                ];
            }
        } else {
            $this->code = 401;
            $response = [
                "message" => "Error - usted no esta logueado",
            ];
        }
        return $response;
    }

    function register()
    {
        $response = [];
        if ($this->isloggedIn()) {
            $this->logout();
        }
        if (isset($_POST['name']) && isset($_POST['lastname1']) && isset($_POST['lastname2']) && isset($_POST['email']) && isset($_POST['birth']) && isset($_POST['password'])) {
            $name = $_POST['name'];
            $lastname1 = $_POST['lastname1'];
            $lastname2 = $_POST['lastname2'];
            $email = $_POST['email'];
            $birth = $_POST['birth'];
            $password = $_POST['password'];

            $user = $this->db->get("SELECT * FROM usuarios WHERE email = '$email'");
            if (count($user) > 0) {
                $response = [
                    "message" => "Error - Ese email ya esta en uso",
                ];
            } else {
                $register = $this->db->post("CALL sp_registrar_usuario('$name','$lastname1','$lastname2','$email','$birth','$password')");

                if ($register) {
                    $response = [
                        "message" => "Registrado Correctamente",
                    ];
                } else {
                    $this->code = 400;
                    $response = [
                        "message" => "Error en el registro"
                    ];
                }
            }
        } else {
            $this->code = 400;
            $response = [
                "message" => "No se completaron todos los parametros del formulario"
            ];
        }
        return $response;
    }

    function login()
    {
        $response = [];

        if (false) {
        } else if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $user = $this->db->get("SELECT * FROM usuarios WHERE email = '$email' AND passkey = '$password'");
            if (count($user) > 0) {
                $_SESSION["user"] = $user[0]->id;
                $response = [
                    "data" => $user[0],
                    "message" => "Haz Iniciado Sesion",
                ];
            } else {
                $this->code = 401;
                $response = [
                    "message" => "Correo electronico y/o contraseña incorrecta."
                ];
            }
        } else {
            $this->code = 400;
            $response = [
                "message" => "No se solicito correctamente el servicio, falta [email] y [password]."
            ];
        }
        return $response;
    }
}
