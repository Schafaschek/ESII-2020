<?php
    namespace DAO;
    mysqli_report(MYSQLY_REPORT_STRICT);
    require_once('../model/Usuario.php');
    use model\Usuario;

    /** 
       * Esta classe é responsável por fazer a comunicação com o banco de dados,
       * Promovendo as funções de logar e incluir novo Usuário.
       * @author Bruno Schafaschek
    */

    class DAOUsuario{

        /** 
        * Função para logar no sistema, validando os dados fornecidos pelo usuário
        * @param string $login Login do usuario
        * @param string $senha senha do usuario
        * @return Usuario|Exception 
        */
        public function logar($login, $senha){

            try{
                $connDB = $this->conectarBanco();
            }catch(\Exception $e){
                die($e->getMessage());
            }
            
            $usuario = new Usuario();
            $sql = $connDB->prepare('select login, nome, email, celular from usuario
                                    where 
                                    login = ?
                                    and
                                    senha = ?');
            $sql->bind_param('ss', $login, $senha);
            $sql->execute();
            if(!$sql->error){
                $resultado = $sql->get_result();

                if($resultado->num_rows == 0){
                    $usuario->addUsuario(null, null, null, null, FALSE);
                }else{
                    while($linha = $resultado->fetch_assoc()){
                    $usuario->addUsuario($linha['login'], $linha['nome'], $linha['email'], $linha['celular'], TRUE);
                    }
                }
            }else{
                throw new \Exception('Erro ao executar busca com os dados fornecidos');
            }

          
           $sql->close();
           $connDB->close();     
        }
        /**
         * Inclui um novo usuário no banco de dados
         * @param Usuario $usuario Objeto do tipo Usuario que deverá ser cadastrado
         * @return True|Exception True para inclusão bem sucedida ou Exception para inclusão mal sucedida
         */
        public function incluirUsuario($nome, $email, $login, $senha){
            try{
                $conexaoDB = $this->conectarBanco();
            }catch(\Exception $e){
                die($e->getMessage());
            }

            $sqlInsert->$conexaoDB->prepare('Insert into usuario
                                            (nome, email, login, senha)
                                            values
                                            (?,?,?,?)')
            $sqlInsert->bind_param('ssss', $nome, $email, $login, $senha);
            $sqlInsert->execute();
            if(!$sqlInsert->error){
                $retorno = TRUE;
            }else{
                throw new \Exception('Não foi possivel incluir novo usuário');
                die;
            }
            $conexaoDB->close();
            $sqlInsert->close();
            return $retorno;
        }

        private function conectarBanco(){
            
            if(!define('DS')){
                define('DS', DIRECTORY_SEPARATOR);
            }
            if(!define('BASE_DIR')){
                define('BASE_DIR', dirname(__FILE__).DS);
            }

            require_once(DS.'bd_config.php');

            try(){
            $conn = new \MySQLi($dbhost, $user, $password, $db);
            return $conn;
            }catch(mysqli_sql_exception $e){
                throw new \Exeception($e);
                die;
            }

        }


    }

?>