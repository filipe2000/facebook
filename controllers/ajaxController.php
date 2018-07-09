<?php
class ajaxController extends controller {

	public function __construct() {
        parent::__construct();
        $u=new Usuarios();
        $u->verificarLogin();
    }

    public function index() { }
    
    public function addFriend() { 
        if(isset($_POST['id'])){
            $id=addslashes($_POST['id']);
            $r= new Relacionamento();
            $r->addFriend($_SESSION['lgsocial'], $id);
            
        }
    }

    public function aceitarFriend() { 
        if(isset($_POST['id'])){
            $id=addslashes($_POST['id']);
            $r= new Relacionamento();
            $r->aceitarFriend($_SESSION['lgsocial'], $id);
            header("Refresh:0");
        }
    }

    public function recusarFriend() { 
        if(isset($_POST['id'])){
            $id=addslashes($_POST['id']);
            $r= new Relacionamento();
            $r->recusarFriend($_SESSION['lgsocial'], $id);
            header("Refresh:0");
        }
    }

    public function curtir(){   
        
        if(isset($_POST['id'])){           
            $id=addslashes($_POST['id']);
            $id_usuario=$_SESSION['lgsocial'];            
            $p= new Post();
            if($p->addLike($id,$id_usuario)){
            header("Refresh:0");    
            }
            
        }
    }
    public function descurtir(){       
        if(isset($_POST['id'])){
            $id=addslashes($_POST['id']);
            $id_usuario=$_SESSION['lgsocial'];            
            $p= new Post();  
            $p->remLike($id,$id_usuario);
            header("Refresh:0");
        }
    }

    public function comentar(){
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id=addslashes($_POST['id']);
            $id_usuario=$_SESSION['lgsocial'];
            $txt=addslashes($_POST['txt']);
            $p=new Post();

            if(!empty($txt)){
                $p->addComentario($id,$id_usuario,$txt);
            }
            
        }
    }

}