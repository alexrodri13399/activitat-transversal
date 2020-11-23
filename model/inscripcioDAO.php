<?php
require_once 'inscripcio.php';

class InscripcioDAO{
    private $pdo;

    public function __construct(){
        include '../controller/conexion.php';
        $this->pdo=$pdo;
    }

    public function inscripcio(){
        try {
            $this->pdo->beginTransaction();
            $query = "SELECT * FROM `tbl_participant` WHERE `dni_participant` = ? ";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$_POST['dni']);
            $sentencia->execute();
            $numRow=$sentencia->rowCount();
            if ($numRow==0) {
                //Crear usuario.
                $query = "INSERT INTO `tbl_participant` (`dni_participant`, `nom_participant`, `cognom1_participant`, `cognom2_participant`, `email_participant`, `data_naix_participant`, `sexe_participant`, `discapacitat_particiopant`) VALUES (?,?,?,?,?,?,?,?);";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$_POST['dni']);
                $sentencia->bindParam(2,$_POST['nom']);
                $sentencia->bindParam(3,$_POST['cognom1']);
                $sentencia->bindParam(4,$_POST['cognom2']);
                $sentencia->bindParam(5,$_POST['email']);
                $sentencia->bindParam(6,$_POST['data']);
                $sentencia->bindParam(7,$_POST['sexe']);
                $sentencia->bindParam(8,$_POST['disc']);
                $sentencia->execute();
                
                //Revisar categoria.
                $sexe=$_POST['sexe'];
                $disc=$_POST['disc'];
                $tiempo = strtotime($_POST['data']); 
                $ahora = time(); 
                $edad = ($ahora-$tiempo)/(60*60*24*365.25); 
                $edad = floor($edad);
                $cat=0;
                if ($edad >=8 && $edad <=13) {
                    $cat=1;
                }
                if ($edad >=14 && $edad <=17) {
                    if ($sexe=='Home') {
                        $cat=2;
                    } else {
                        $cat=3;
                    }
                }
                if ($edad >=18 && $edad <=34) {
                    if ($sexe=='Home') {
                        $cat=4;
                    } else {
                        $cat=5;
                    }
                }
                if ($edad >=35 && $edad <=44) {
                    if ($sexe=='Home') {
                        $cat=6;
                    } else {
                        $cat=7;
                    }
                }
                if ($edad >=45 && $edad <=54) {
                    if ($sexe=='Home') {
                        $cat=8;
                    } else {
                        $cat=9;
                    }
                }
                if ($edad >=55 && $edad <=64) {
                    if ($sexe=='Home') {
                        $cat=10;
                    } else {
                        $cat=11;
                    }
                }
                if ($edad >=65 ) {
                    if ($sexe=='Home') {
                        $cat=12;
                    } else {
                        $cat=13;
                    }
                }
                if ($disc == 'Si') {
                    if ($sexe=='Home') {
                        $cat=14;
                    } else {
                        $cat=15;
                    }
                }
               
                //Crear inscripcion.
                $query = "INSERT INTO `tbl_inscripcio` (`dorsal_inscripcio`, `pagada_inscripcio`, `id_cursa`, `dni_participant`, `id_categoria`) VALUES (NULL, NULL, 1,?,?);";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$_POST['dni']);
                $sentencia->bindParam(2,$cat);
                $sentencia->execute();
                //Info de que se ha inscrito correctamente
                header('Location: ../view/inscripcions.php?dni='.$_POST['dni']);

            } else {
                //comprobar si esta inscrito en la cursa.
                $query = "SELECT * FROM `tbl_inscripcio` WHERE `dni_participant` = ? ";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$_POST['dni']);
                $sentencia->execute();
                $numRow=$sentencia->rowCount();
                if ($numRow==0) {
                    //Revisar categoria.
                    $sexe=$_POST['sexe'];
                    $disc=$_POST['disc'];
                    $tiempo = strtotime($_POST['data']); 
                    $ahora = time(); 
                    $edad = ($ahora-$tiempo)/(60*60*24*365.25); 
                    $edad = floor($edad);
                    $cat=0;
                    if ($edad >=8 && $edad <=13) {
                        $cat=1;
                    }
                    if ($edad >=14 && $edad <=17) {
                        if ($sexe=='Home') {
                            $cat=2;
                        } else {
                            $cat=3;
                        }
                    }
                    if ($edad >=18 && $edad <=34) {
                        if ($sexe=='Home') {
                            $cat=4;
                        } else {
                            $cat=5;
                        }
                    }
                    if ($edad >=35 && $edad <=44) {
                        if ($sexe=='Home') {
                            $cat=6;
                        } else {
                            $cat=7;
                        }
                    }
                    if ($edad >=45 && $edad <=54) {
                        if ($sexe=='Home') {
                            $cat=8;
                        } else {
                            $cat=9;
                        }
                    }
                    if ($edad >=55 && $edad <=64) {
                        if ($sexe=='Home') {
                            $cat=10;
                        } else {
                            $cat=11;
                        }
                    }
                    if ($edad >=65 ) {
                        if ($sexe=='Home') {
                            $cat=12;
                        } else {
                            $cat=13;
                        }
                    }
                    if ($disc == 'Si') {
                        if ($sexe=='Home') {
                            $cat=14;
                        } else {
                            $cat=15;
                        }
                    }
                
                    //Crear inscripcion.
                    $query = "INSERT INTO `tbl_inscripcio` (`dorsal_inscripcio`, `pagada_inscripcio`, `id_cursa`, `dni_participant`, `id_categoria`) VALUES (NULL, NULL, 1,?,?);";
                    $sentencia=$this->pdo->prepare($query);
                    $sentencia->bindParam(1,$_POST['dni']);
                    $sentencia->bindParam(2,$cat);
                    $sentencia->execute();
                    //Info de que se ha inscrito correctamente
                    header('Location: ../view/inscripcions.php?dni='.$_POST['dni']);
                } else {
                    //Decir que ya esta inscrito
                    header('Location: ../view/inscripcions.php?ins=');
                }
            }
            $this->pdo->commit();
        }
        catch (Exception $ex) {
            header('Location: ../view/inscripcions.php?err=');
            $this->pdo->rollback();
            //echo $ex->getMessage();
        }  

    }
}
?>