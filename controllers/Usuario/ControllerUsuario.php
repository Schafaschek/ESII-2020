<?php 
namespace controller;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'];

require_once($root.'/esii-prospect/DAO/DAOUsuario.php');

use DAO\DAOUsuario;

/** 
 * Esta classe serve para tratar as regras de negócio pertinentes à
 * classe Usuário
 * Seu escopo limita-se às funções da entidade Usuário
 * 
 * @author Bruno Schafaschek 
 */
    
class ControllerUsuario{
     /**
      * Recebe os dados de login, faz o devido tratamento e envia para o DAO executar
      * no banco de dados
      * @param string $login login do usuário
      * @param string $senha senha do usuário
      * @return Usuario
      */
      public function fazerLogin($login, $senha) {
            $daoUsuario = new DAOUsuario();
        try{
            $usuario = $daoUsuario->logar($login, $senha);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }

            unset($daoUsuario);
            return $usuario;
      }

      /**  
       * Recebe e trata os dados do usuário e envia para a DAO
       * gravar no banco de dados
       * 
       * @param string $nome Nome do Usuario
       * @param string $email Email do Usuario
       * @param string $celular Celular do Usuario
       * @param string $login Login do Usuario
       * @param string $senha Senha do Usuario
       * @return TRUE|Exception Retorna TRUE caso a inclusão tenha sido bem sucedida
       * ou uma Exception caso contrário
       */

       public function salvarUsuario($nome, $email, $celular, $login, $senha){
            $daoUsuario = new DAOUsuario();

            try{
                $retorno = $daoUsuario->incluirUsuario($nome, $email, $celular, $login, $senha);
            }catch(\Exception $e){
                throw new \Exception($e->getMessage());
            }

            return $retorno;
       }
 }

?>