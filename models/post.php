<?php
/**
* 
*/
class Post extends model
{
	public function addPost($msg, $foto){
		$usuario=$_SESSION['lgsocial'];
		$tipo="texto";
		$url="";
		if(isset($foto) && !empty($foto) && count($foto)>0){
			$tipos=array('image/jpg','image/jpeg','image/png');
			
			if(in_array($foto['type'], $tipos)){//no array $foto se existir algum item do $tipos
				$tipo='foto';
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
				move_uploaded_file($foto['tmp_name'],'assets/images/posts/'.$url);
			}
		}
		$sql="insert into tb_posts set id_usuario= '$usuario',dt_criado=NOW(), tipo='$tipo', texto='$msg', url='$url', id_grupo='0'";
		$this->db->query($sql);

	}
	public function getMyFeed($id){
		$r=new Relacionamento();		
		$posts=array();		
		$idlog=$_SESSION['lgsocial'];
		$sql="select *,
		(select u.nome from tb_usuario u where u.id=".$id.") as nome,
		(select u.foto from tb_usuario u where u.id=p.id_usuario) as ft,
		(select count(*) from tb_postslike pl where pl.id_post=p.id) as likes,
		(select count(*) from tb_postslike pl where pl.id_post=p.id and
		pl.id_usuario='".$idlog."') as liked
		from tb_posts p 
		where p.id_usuario=".$id." 
		order by p.dt_criado";

		$sql=$this->db->query($sql);
		if($sql->rowCount()>0)
		{
			$posts=$sql->fetchAll();									
			$coments=array();	
			$users=array();	

			for($p=0;$p<count($posts);$p++) 
			{				
			$id=$posts[$p]['id'];
			$q="select * from tb_comentarios where id_post='$id' order by dt_comentario desc";				
			$q=$this->db->query($q);
			$coments=$q->fetchAll();			

			$sql_nlk="select u.nome as n from tb_usuario u	where u.id in 
			(SELECT pl.id_usuario FROM tb_postslike pl WHERE pl.id_post='$id')";
			$sql_nlk=$this->db->query($sql_nlk);
			if($sql_nlk->rowCount()>0){	
				$nlk=$sql_nlk->fetchAll(); 
			}
	
			$l=count($nlk);			
			for($a=0;$a< $l;$a++) {				
				$posts[$p]['nlk'][$a]=$nlk[$a];				
			}

				if(!empty($coments)){
					for($i=0;$i< count($coments);$i++){				
						$idu=$coments[$i][2];				
						$u="select nome as user, foto from tb_usuario where id='$idu'";
						$u=$this->db->query($u);
						$users=$u->fetch();
						$coments[$i]['user']=$users['user'];
						$coments[$i]['foto']=$users['foto'];					
					}				
				}
				$posts[$p]['coments']=$coments;				
			}	
		}//if
		return $posts;
	}
	public function getFeed(){
		$r=new Relacionamento();
		$u=new Usuarios();
		$id=$_SESSION['lgsocial'];		
		$posts=array();
		$arrayId=array();
						
		$arrayId=$r->getIdsFriends($id);	
		
		$sql="select *,
		(select u.nome from tb_usuario u where u.id=p.id_usuario) as nome,
		(select u.foto from tb_usuario u where u.id=p.id_usuario) as ft,
		(select count(*) from tb_postslike pl where pl.id_post=p.id) as likes,
		(select count(*) from tb_postslike pl where pl.id_post=p.id and
		pl.id_usuario='".$id."') as liked
		from tb_posts p where p.id_usuario in (".implode(',',$arrayId).") 
		order by p.dt_criado desc";
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0)
		{
			$posts=$sql->fetchAll();									
			$coments=array();	
			$users=array();	
			$nlk=array();

			for($p=0;$p<count($posts);$p++){				
			$id=$posts[$p]['id'];//id post
			$q="select * from tb_comentarios where id_post='$id' order by dt_comentario";				
			$q=$this->db->query($q);
			$coments=$q->fetchAll();	
			
			$sql_nlk="select u.nome as n from tb_usuario u	where u.id in 
			(SELECT pl.id_usuario FROM tb_postslike pl WHERE pl.id_post='$id')";
			$sql_nlk=$this->db->query($sql_nlk);
			if($sql_nlk->rowCount()>0){	
				$nlk=$sql_nlk->fetchAll(); 
			}
	
			$l=count($nlk);			
			for($a=0;$a< $l;$a++) {				
				$posts[$p]['nlk'][$a]=$nlk[$a];				
			}
			//echo "<pre>";print_r($posts[$p]);echo "</pre>";exit;
				if(!empty($coments)){
					for($i=0;$i< count($coments);$i++){				
						$idu=$coments[$i][2];				
						$u="select nome as user, foto from tb_usuario where id='$idu'";						
						$u=$this->db->query($u);
						$users=$u->fetch();
						$coments[$i]['user']=$users['user'];
						$coments[$i]['foto']=$users['foto'];					
					}				
				}
				$posts[$p]['coments']=$coments;				
			}//for post	
		}//if
		return $posts;
	}
	public function getComentarios($id){
		$arrayc=array();
		$sql="select 				
		c.dt_comentario,
		c.texto,
		u.nome
		from tb_comentarios c join tb_usuario u on u.id=c.id_usuario
		where c.id_post='$id'
		order by c.dt_comentario desc";
		$sql=$this->db->query($sql);
		$arrayc=$sql->fetchAll();	
		
		return $arrayc;
	}
	public function isLiked($id,$id_u){
		$sql="select * from tb_postslike where id_post='$id' and id_usuario='$id_u'";
		$sql=$this->db->query($sql);
		if($sql->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}
	public function remLike($id,$id_u){
		$sql="delete from tb_postslike where id_post='$id' and id_usuario='$id_u'";
		$this->db->query($sql);		
	}
	public function addLike($id,$id_u){
		$sql="insert into tb_postslike set id_post='$id', id_usuario='$id_u'";
		$this->db->query($sql);

	}
	public function addComentario($id,$id_usuario,$txt){
		$sql="insert into tb_comentarios 
		set id_post='$id', 
		id_usuario='$id_usuario', 
		dt_comentario=NOW(), 
		texto='$txt'";
		$this->db->query($sql);
		header("Refresh:0");
	}
	
}