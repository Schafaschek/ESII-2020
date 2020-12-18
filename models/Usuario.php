<?php

namespace models;

/** 
	* Classe Model de Usuário
	* @author Bruno Schafaschek
*/
class Usuario{

	/**  Login do Usuário, @var string */
	public $login;
	/**  Nome do Usuário, @var string */
	public $nome;
	/**  E-mail do Usuário, @var string */
	public $email;
	/**  Celular do Usário, @var string */
	public $celular;
	/**  Identifica se o Usuário está ou não logado, @var boolean */
	public $logado;


	/**  Carrega os atributos da Classe Usuário; 
		* @param string $login Login do Usuário
		* @param string $nome  Nome do Usuário
		* @param string $email E-mail do Usuário
		* @param string $celular Celular do Usuário
		* @param boolean $logado Identifica se o Usuário está logado ou não
		* @return void
	*/
	
	public function addUsuario($login, $nome, $email, $celular, $logado){
		$this->login = $login;
		$this->nome = $nome;
		$this->email = $email;
		$this->celular = $celular;
		$this->logado = $logado;
	}

}
