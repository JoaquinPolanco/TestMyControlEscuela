<?php
include_once "app/models/escuela.php"; 

class EscuelamapaController extends Controller {
    private $escuela;
    public function __construct($parametro) {
        $this->escuela=new escuelas();
        parent::__construct("escuelamapa",$parametro,true);
    }

    public function getEscuelasMapa() {
        $records=$this->escuela->getEscuelasMapa($_GET);  
        $alum=$this->escuela->getAlumnosescuMapa($_GET);
        $url_imagen = isset($_GET['url_imagen']) ? $_GET['url_imagen'] : "";
        $info=array('success'=>true, 'records'=>$records, 'url_imagen' => $url_imagen, 'alum'=>$alum,);
        echo json_encode($info);
    }

}
 