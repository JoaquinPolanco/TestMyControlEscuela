<?php
include_once "app/models/escuela.php"; 

class EscuelamapaController extends Controller {

    public function __construct($parametro) {
        parent::__construct("escuelamapa",$parametro,true);
    }

}
