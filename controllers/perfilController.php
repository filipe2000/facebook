<?php
class perfilController extends controller {

	public function __construct() {
        parent::__construct();
        $u=new Usuarios();
        $u->verificarLogin();
    }
    public function index(){}

    public function exibir($id) {
        $dados = array();
        $u=new Usuarios();  
        $r=new Relacionamento(); 
        $p=new Post();   
        $g=new Grupos();
        $dados=$u->getUsuario($id);
        $dados['usuario_nome']=$u->getNome($id);//usuario do perfil exibido
        $dados['usuario_loged']=$u->getNome($_SESSION['lgsocial']);//nome a exibir no topo, logado. 
        $dados['foto']=$u->getFotoPerfil($id);        
        $dados['totalAmigos']=$r->getTotalAmigos($id);
        $dados['myFeed']=$p->getMyFeed($id);  
        $dados['myGrupos']=$g->getMyGrupos($id);
        $dados['friends']=$u->getFriends($id); 
         $this->loadTemplate('perfil',$dados);
    }

    public function edit() {
        $dados = array(
        	'usuario_nome'=>''
        	);        
       $dados=array('msg'=>'');
        $u=new Usuarios();
        $foto=array();
        $senha="";
        if(isset($_POST['nome']) && !empty($_POST['nome'])){           /*senha igual confirmação*/            
            if(!empty($_POST['senha1']) && !empty($_POST['senha2']) && /*senha postada e não vazia*/
                      $_POST['senha1']==$_POST['senha2']){
                $senha=addslashes($_POST['senha1']);
            }
            $array= array('nome'=>addslashes($_POST['nome']), 
                        'bio'=>addslashes($_POST['bio']), 
                        'senha'=>$senha);

            //verificar foto do perfil 
             if(isset($_FILES['foto_perfil']) && !empty($_FILES['foto_perfil']['tmp_name'])){              
             $array['foto']=$_FILES['foto_perfil'];
            }else{
                $array['foto']="";
            }
            
            $u->updatePerfil($array);
        }
         $dados['usuario_loged']=$u->getNome($_SESSION['lgsocial']);//nome a exibir no topo, logado.  
        $dados['usuario_nome']=$u->getNome($_SESSION['lgsocial']);
        $dados['info']=$u->getUsuario($_SESSION['lgsocial']);
        $this->loadTemplate('edit_perfil', $dados);
    }

}