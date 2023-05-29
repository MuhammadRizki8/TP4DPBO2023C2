<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Prodi.class.php");
include_once("views/Members.view.php");

class MembersController {
    private $Members;
    private $Prodi;

    function __construct(){
        $this->Members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->Prodi = new Prodi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->Members->open();
        $this->Members->getMembersJoin();
        $data = array();
        while($row = $this->Members->getResult()){
            array_push($data, $row);
        }
        $this->Members->close();
        
        $view = new MembersView();
        $view->render($data);
    }
    
    public function PrepareAdd() {
        $this->Prodi->open();
        $this->Prodi->getProdi();
        $data = array();
        while($row = $this->Prodi->getResult()){
            array_push($data, $row);
        }
        $this->Prodi->close();

        $view = new MembersView();
        $view->FormMemberAdd($data);
    }

    public function PrepareUpdate($id) {
        $this->Members->open();
        $this->Prodi->open();
        $this->Members->getMembersJoinByID($id);
        $this->Prodi->getProdi();
        $data = array(
            'Members' => array(),
            'Prodi' => array(),
        );
        while($row = $this->Members->getResult()){
            array_push($data['Members'], $row);
        }
        while($row = $this->Prodi->getResult()){
            array_push($data['Prodi'], $row);
        }
        $this->Members->close();
        $this->Prodi->close();
        $view = new MembersView();
        $view->FormMemberUpdate($data);
    }

    // add
    function add($data){
        $this->Members->open();
        $this->Members->add($data);
        $this->Members->close();
        
        header("location:index.php");
    }

    // edt
    function edit($id){
        $this->Members->open();
        $this->Members->edit($id); // Menggunakan $data sebagai argumen kedua
        $this->Members->close();
        
        header("location:index.php");
    }

    // delete
    function delete($id){
        $this->Members->open();
        $this->Members->delete($id);
        $this->Members->close();
        
        header("location:index.php");
    }
}