<div class="container">
	<h1>Perfil</h1>
	<form method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-2" >
			<?php  $f="";
			if(empty($info['foto'])){
			$f="default.png";			
			}else{
			$f="usuario/perfil/".$info['foto'];		
			}
			?>
			<div class="img_edit_perfil">
			<img src='<?php	echo BASE_URL."assets/images/".$f; ?>' >
			</div>
			<div class="file form-group">		
				<a href="#" class="upload">Foto
				<input type="file" name="foto_perfil" class="opacity"></input>	
				</a>	
			</div>
		</div>	
		<div class="col-sm-10">
			<div class="img_edit_perfil">
			<img src='<?php echo BASE_URL; ?>assets/images/default.png' class="img_edit_capa">
			</div>
			<div class="file form-group">		
				<a href="#" class="upload">Capa
				<input type="file" name="foto" class="opacity"></input>	
				</a>	
			</div>
		</div>
	</div>	
	<div class="form-group">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" class="form-control" id="nome" value="<?php echo $info['nome']; ?>"></input>
	</div>
	<div class="form-group">
		<label for="bio">Biografia:</label>
		<textarea  name="bio" id="bio" class="form-control"><?php echo $info['bio']; ?></textarea>
	</div>
	<div class="form-group">
		<label for="senha">Nova Senha:</label>
		<input type="password" name="senha1" class="form-control" id="senha1" ></input>
	</div>
	<div class="form-group">			
		<label for="senha">Confirmar:</label>
		<input type="password" name="senha2" class="form-control" id="senha2" ></input>
	</div>
	<div class="form-group">
		<label for="email">E-mail:</label><br/>
		<strong><?php echo $info['email']; ?></strong>
	</div>

	<strong>Sexo:</strong><br />
	<strong><?php 	echo ($info['sexo']==0)? 'Feminino':'Masculino';?></strong><br/><br/>
		
	<button type="submit" class="btn btn-default">Salvar</button>
	</form>
	<?php
	if(!empty($msg)): ?>
	<div class="alert alert-danger"><?php echo $msg; ?></div>
	<?php endif;	?>
</div>