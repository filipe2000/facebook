<?php
class Grupos extends model{
	public function index(){

	}
	public function getGrupos(){
		$array=array();
		$sql="select id, titulo from tb_grupo";
		$sql=$this->db->query($sql);		
		$array=$sql->fetchAll();
		return $array;
	}
	public function getMyGrupos($id){
		$array=array();		
		$sql="select * from tb_grupo
		where id_usuario='$id'";
		$sql=$this->db->query($sql);		
		$array=$sql->fetchAll();
		return $array;	
	}
	public function criar($grupo){
		$usuario=$_SESSION['lgsocial'];		
		$sql="insert into tb_grupo 
		set id_usuario='$usuario', titulo='$grupo'";
		$sql=$this->db->query($sql);
		$idg=$this->db->lastInsertId();
		$lastId=$idg;
		$sql2="insert into usuario_grupo 
		set id_usuario='$usuario', 
		id_grupo='$idg', 
		status='1', 
		nivel='1'";
		$this->db->query($sql2);
		return $lastId;
	}

	public function getInfo($id){
		$array=array();
		$sql="select * from tb_grupo where id='$id'";
		$sql=$this->db->query($sql);		
		$array=$sql->fetchAll();
		return $array;	
	}
	public function isMember($id){		
		$iduser=$_SESSION['lgsocial'];
		$sql="select ug.id_usuario 
		from tb_grupo g join usuario_grupo ug
		on g.id=ug.id_grupo 
		where ug.id_grupo='$id' and ug.id_usuario='$iduser'";
		$sql=$this->db->query($sql);
		$member=$sql->fetch();
		if(!empty($member)){
			return true;			
		}else{
			 return false;	
		}
		
	}
	public function getMembros($id){
		
		$sql="select count(*) as c from usuario_grupo where id_grupo='$id'";
		$sql=$this->db->query($sql);		
		$sql=$sql->fetch();
		return $sql['c'];	
	}
}