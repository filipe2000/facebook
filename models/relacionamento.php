<?php
class Relacionamento extends model
{
	public function addFriend($id1, $id2){
		$sql="insert into tb_relacionamento set usuario_origem='$id1', usuario_destino='$id2', status='0'";
		
		$this->db->query($sql);
	}
	public function getRequisicoes(){
		$array= array();
		$sql="select u.id, u.nome 
		from tb_relacionamento r left join tb_usuario u
		on u.id=r.usuario_origem 
		where
		r.usuario_destino= '".$_SESSION['lgsocial']."' and 
		r.status='0'";
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			$array= $sql->fetchAll();
		}
		return $array;
	}
	public function getSug_Req(){// id do usuario que já foi requisitado e não aceito
		$array= array();
		$sql="select u.id 
		from tb_relacionamento r left join tb_usuario u
		on u.id=r.usuario_destino 
		where
		r.usuario_origem= '".$_SESSION['lgsocial']."' and 
		r.status='0'";
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			$array= $sql->fetchAll();
		}
		return $array;
	}
	public function aceitarFriend($id1,$id2){
		$sql="update tb_relacionamento set status='1' where usuario_origem='$id2' and usuario_destino='$id1'";
		$this->db->query($sql);
	}
	public function recusarFriend($id1,$id2){
		$sql="delete from tb_relacionamento 
		where usuario_origem='$id2' and 
		usuario_destino='$id1' and 
		status='0'";
		$this->db->query($sql);
	}

	public function getTotalAmigos($id){
		$sql="select count(*) as c from tb_relacionamento 
		where (usuario_origem='$id' or usuario_destino='$id') and status='1'";
		$sql=$this->db->query($sql);
		$sql=$sql->fetch();
			return $sql['c'];
	}
	public function getIdsFriends($id){
		$array= array();
		$sql="select * from tb_relacionamento 
		where (usuario_origem='$id' or usuario_destino='$id') and status='1' ";
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			foreach ($sql->fetchAll() as $item) {
				$array[]=$item['usuario_origem'];
				$array[]=$item['usuario_destino'];
			}
		}else
		{
			$array[]=0;
		}
		return $array;
	}

	
}
?>