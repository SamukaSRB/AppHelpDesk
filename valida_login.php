<?php
session_start();

$acesso = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(1 =>'Administrativo',2 => 'Usuário');

$usuario_app = array(

array('id' =>1, 'Email'=>'samuka-srb@live.com','Senha'=>'201232',perfil_id => 1),
array('id' =>2, 'Email'=>'leidianemota@gmail.com','Senha'=>'12345',perfil_id => 1),
array('id' =>3, 'Email'=>'joaomota@gmail.com','Senha'=>'12345',perfil_id => 2),
array('id' =>4, 'Email'=>'paulosergio@gmail.com','Senha'=>'12345',perfil_id => 2),

);



foreach($usuario_app as $user){
	
if($user['Email'] == $_POST['email'] && $user['Senha'] == $_POST['senha']){
     $acesso = true;
     $usuario_id = $user['id'];
	$usuario_perfil_id = $user['perfil_id'];
	}
}

if($acesso){
	echo 'Usuario autenticado com sucesso';

	$_SESSION['autenticado'] = 'SIM';
	$_SESSION['id'] = $usuario_id;
	$_SESSION['perfil_id'] = $usuario_perfil_id;
	header('Location:home.php');

}else{
	$_SESSION['autenticado']='NAO';
	header('Location:index.php?login=erro');
}


?>


