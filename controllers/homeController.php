<?php
class homeController extends controller {

	public function __construct() {
        parent::__construct();
        $u=new Usuarios();
        $u->verificarLogin();
    }

    public function index() {
        $u=new Usuarios();
        $r= new Relacionamento();
        $p=new Post();
        $g= new Grupos();
        $ft=array();
        $dados = array(
        	'usuario_nome'=>''
        	);
        

        $foto=array();
         if(isset($_POST['post']) && !empty($_POST['post'])){
         $postmsg=addslashes($_POST['post']);
         $foto=array();
             if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])){
             $foto=$_FILES['foto'];
            }
         
         $p->addPost($postmsg,$foto);
        }
        if(isset($_POST['grupo']) && !empty($_POST['grupo'])){
            $grupo=addslashes($_POST['grupo']);
            $id_grupo=$g->criar($grupo);
            $array=array();
            $array['id_grupo']=$id_grupo;
            $array['status']=1;
            header("Location:".BASE_URL."grupos/abrir/".$array);
        }
        $dados['usuario_loged']=$u->getNome($_SESSION['lgsocial']);
        $dados['sugestoes']=$u->getSugestoes(3);
        $dados['requisicoes']=$r->getRequisicoes();
        $dados['totalAmigos']=$r->getTotalAmigos($_SESSION['lgsocial']);
        $dados['feed']=$p->getFeed();                        
        $dados['foto']=$u->getFotoPerfil($_SESSION['lgsocial']);
        $dados['grupos']=$g->getGrupos(); 
        $dados['friends']=$u->getFriends($_SESSION['lgsocial']);
       
       // $dados['myFriends']=$u->getFriends($_SESSION['lgsocial']);
        $this->loadTemplate('home', $dados);
    }

}