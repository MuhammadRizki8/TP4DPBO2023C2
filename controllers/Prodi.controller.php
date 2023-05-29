<?php
include_once("conf.php");
include_once("models/Prodi.class.php");
include_once("views/Prodi.view.php");

class ProdiController {
    private $Prodi;

    public function __construct() {
        $this->Prodi = new Prodi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->Prodi->open();
        $this->Prodi->getProdi();
        $data = array();
        while ($row = $this->Prodi->getResult()) {
            array_push($data, $row);
        }
        $this->Prodi->close();
        $view = new ProdiView();
        $view->render($data);
    }

    public function add($data) {
        $this->Prodi->open();
        $this->Prodi->add($data);
        $this->Prodi->close();
        header("location:prodi.php");
    }

    public function edit($id, $data) {
        $this->Prodi->open();
        $this->Prodi->edit($id, $data);
        $this->Prodi->close();
        header("location:prodi.php");
    }

    public function delete($id) {
        $this->Prodi->open();
        $this->Prodi->delete($id);
        $this->Prodi->close();
        header("location:prodi.php");
    }

    public function prepAdd() {
        $view = new ProdiView();
        $view->formProdiAdd();
    }

    public function prepUpdate($id) {
        $this->Prodi->open();
        $this->Prodi->getProdiById($id);
        $data = array();
        while ($row = $this->Prodi->getResult()) {
            array_push($data, $row);
        }
        $this->Prodi->close();
        $view = new ProdiView();
        $view->formProdiUpdate($data);
    }
}