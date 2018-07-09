<?php
class Usuarios extends model{
	public function verificarLogin(){
	if(!isset($_SESSION['lgsocial']) || (isset($_SESSION['lgsocial']) && empty($_SESSION['lgsocial']))){
		header("Location:".BASE_URL."login");
		exit;
		}
		
	}
	public function logar($email,$senha){
		$sql="select * from tb_usuario where email='$email' and senha= '$senha'";
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			$sql=$sql->fetch();
			$_SESSION['lgsocial']=$sql['id'];			
			header("Location:".BASE_URL);
			exit;
		}else{
			return "E-mail ou senha errado!";
		}

	}
	public function cadastrar($nome,$email,$senha,$sexo){
		$sql="select * from tb_usuario where email='$email'";
		$sql=$this->db->query($sql);
		if($sql->rowCount()==0){
			$sql="insert into tb_usuario set nome='$nome', email='$email', senha='$senha', sexo=$sexo";
			if($this->db->query($sql)){
				$id=$this->db->lastInsertId();
				$_SESSION['lgsocial']=$id;
				header("Location:". BASE_URL);
			}else{
				return 'Dados incorretos!';
			}
		}else{
			return "Este e-mail já está cadastrado";
		}
	}
	public function getNome($id){
		$sql="select nome from tb_usuario where id='$id'";
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			$sql=$sql->fetch();
			return $sql['nome'];
		}else{
			return '';
		}

	}
	public function getUsuario($id){
		$array = array();
		$sql="select * from tb_usuario where id='$id'";
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			$array=$sql->fetch();
		}

		return $array;
	}
	public function updatePerfil($array= array()){
		if(count($array)>0){
			$nome=$array['nome'];
			$bio=$array['bio'];			
			$id=$_SESSION['lgsocial'];
			$foto=$array['foto'];
			$sql="update tb_usuario	set nome='$nome',bio='$bio'";

			//foto
			if(isset($foto) && !empty($foto)){
			$tipos=array('image/jpg','image/jpeg','image/png');
			
			//if(in_array($foto['type'], $tipos)){//no array $foto se existir algum item do $tipos
				//$tipo='foto';
				$url=md5(time().rand(0,999));// url é nome criptogradado com tempo e numero até 1000
				switch ($foto['type']) {
					case 'image/jpg':
					case 'image/jpeg':
						$url.=".jpg";
						break;
					case 'image/png':
						$url.=".png";
						break;
					
				}
				move_uploaded_file($foto['tmp_name'],'assets/images/usuario/perfil/'.$url);
				$sql.=",foto='$url'";
			//}
			}
			if(!empty($array['senha']) || $array['senha']!=""){
				$s=md5($array['senha']);
				$sql.=",senha='$s'";
			}
			$sql.=" where id='$id'";			
			$this->db->query($sql);			
		}
		
	}
	public function getSugestoes($limit=3){
		$array = array();
		$a=array();
		$myid=$_SESSION['lgsocial'];
		$r= new Relacionamento();		
		$ids=$r->getIdsFriends($myid);///id meus amigos 
		if(count($ids)==0){
			$ids[]=$myid;
		}
		$req=$r->getRequisicoes();//id quem me fez requisição 
		if(count($req)==0){
			$req[]=$myid;
		}else{
			foreach ($req as $re) {
				$ids[]=$re['id'];//adiciona só os id			
			}
		}// id sugestão já requisitada, usuario_destino
		$sr=$r->getSug_Req();
		if(count($sr)==0){
			$sr[]=$myid;
		}else{
			foreach ($sr as $s) {
				$ids[]=$s['id'];//adiciona só os id	
			}

		}

		//u.id != '$myid' and     limit $limit
		$sql="select u.id, u.nome from tb_usuario u 
		where 		
		u.id not in (".implode(',', $ids).")
		order by rand() ";		
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			$array=$sql->fetchAll();
		}

		return $array;
	}
	/* não exibir sugestão Y ao usuario X, onde Y = origem e X = destino*/

	public function getFriends($id){
		$array = array();
		$r=new Relacionamento();
		$ids=$r->getIdsFriends($id);
		$sql="select u.id, u.nome, u.foto from tb_usuario u 
		where u.id != '$id' and 
		u.id in (".implode(',', $ids).")";
		
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			$array=$sql->fetchAll();
		}

		return $array;
	}
	public function getId(){
		$array = array();
		$r=new Relacionamento();
		$ids=$r->getIdsFriends($id);
		$sql="select u.id, u.nome from tb_usuario u 
		where u.id != '$id' and 
		u.id in (".implode(',', $ids).")";
		
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			$array=$sql->fetchAll();
		}

		return $array;
	}
	public function getFotoPerfil($id){
		$sql="select foto from tb_usuario where id='$id'";
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			$sql=$sql->fetch();
			return $sql['foto'];
		}
	}

	
}
?>	