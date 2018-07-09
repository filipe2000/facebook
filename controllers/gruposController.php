<?php
class gruposController extends controller {
	public function __construct() {
        parent::__construct();
        $u=new Usuarios();
        $u->verificarLogin();
    }

    public function abrir($id) {
    	$u=new Usuarios();
        $g= new Grupos();
        $dados = array('usuario_nome'=>'');
        $idu=$_SESSION['lgsocial'];        
        $dados['usuario_nome']=$u->getNome($idu);
        $dados['info']=$g->getInfo($id);
        $dados['member']=$g->isMember($id);
        $dados['qtd_membros']=$g->getMembros($id);
        $this->loadTemplate('grupo', $dados);
    }
}


?>