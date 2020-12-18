<?php
namespace test;

require_once('../uteis/vendor/autoload.php');
require_once('../models/Usuario.php');
require_once('../controllers/Usuario/ControllerUsuario.php');

use PHPUnit\Framework\TestCase;
use models\Usuario;
use controller\ControllerUsuario;

class ControllerUsuarioTest extends TestCase{
    /** @test */
    public function testLogar(){
        $ctrlUsuario = new ControllerUsuario();
        $usuario = new Usuario();

        try{
            $usuario->addUsuario("vitor", "Victor", "vitao@gmail.com", "(47)97645-1122", TRUE);
            $this->assertEquals(
               $usuario,
               $ctrlUsuario->fazerLogin('vitor', '334')
            );
         }
         catch(\Exception $e){
            $this->fail($e->getMessage());
         }
         unset($usuario);
         unset($daoUsuario);
      }
    }

    public function testIncluirUsuario(){
        $ctrlUsuario = new ControllerUsuario();

        try{
            $this->assertEquals(
                TRUE,
                $ctrlUsuario->salvarUsuario("Leonardo", "leo@gmail.com", "(93) 98982-2334", "leo", "234");
            );
        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }
}

?>