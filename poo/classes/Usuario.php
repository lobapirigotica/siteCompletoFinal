<?php
class Usuario extends conexao {
    /*
    * Classe usuario
    * Classe desenvolvida durante aulas do curso técnico em informática
    * @author Daniela daniela-rseolino@educar.rs.gov.br
    * @version 0.1
    * @ access public
    * @copyright GPL 2020, Info63
    * @since 09/07/2020
    *
    */
    /**
     *  @access private
     * @name id
     */
    private $id;
    /**
     *  @access private
     * @name nome
     */
    private $nome;
    /**
     *  @access private
     * @name email
     */
    private $email;
    /**
     *  @access private
     * @name senha
     */
    private $senha;

    /**
     * @access public
     * @param int
     */
    public function setId($id){
        $this->id=$id;
    }
    /**
     * @access public
     * @param string
     */
    public function setNome($nome){
        $this->nome=$nome;
    }
    /**
     * @access public
     * @param string
     */
    public function setEmail($email){
        $this->email=$email;
    }
    /**
     * @access public
     * @param string
     */
    public function setSenha($email){
        $this->senha=$senha;
    }


    /**
     * @access public
     * @return int
     */
    public function getId(){
        return $this->id;
    }
    /**
     * @access public
     * @return string
     */
    public function getNome(){
        return $this->nome;
    }
    /**
     * @access public
     * @return string
     */
    public function getEmail(){
        return $this->email;
    }
    /**
     * @access public
     * @return string
     */
    public function getSenha(){
        return $this->senha;
    }


    
    /**
     * Método responsáel por carregar a página inicial
     * @access public
     * @since 09/07/2020
     */
    public function index(){
        
        
        if(!isset($_SESSION['nome']) || (isset($_SESSION['nome']) && empty($_SESSION['nome']))) {
            $this->login();
        }
        else{
            $this->listar();
        }
    }
    /**
     * Método responsáel por listar os usuarios
     * @access public
     * @since 09/07/2020
     */
    public function listar(){
        
        $dados = '';
        $sql="SELECT * FROM usuarios";
        $sql=$this->db->query($sql);
        if($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
        }

        include HOME_DIR."view/paginas/usuarios/listar.php";
    }
    /**
     * Método responsáel por criar os usuarios
     * @access public
     * @since 13/07/2020
     */
    public function criar(){
        include HOME_DIR."view/paginas/usuarios/form_usuario.php";
    }
    /**
     * Método responsáel por criar os usuarios
     * @access public
     * @since 13/07/2020
     */
    public function salvar(){
        echo 'Pronto pra salvar';
        /* setar os dados do usuario */
        if(isset($_POST['enviar'])){
            if(empty($_POST['id'])){
               
                $sql="INSERT INTO usuarios SET nome ='".$_POST['nome']."', email = '".$_POST['email']."', senha = '".MD5(DEFAULT_PASS)."'";
                $sql=$this->db->query($sql);

            }else{
                $sql="UPDATE usuario SET nome=".$_POST["nome"].", ".$_POST["email"];
            }
            header("location:".HOME_URI."usuario");
        
        }
        $this->index();
    }
    /**
     * Método responsáel por exibir os usuarios
     * @access public
     * @since 13/07/2020
     */
    public function exibir($id){
        echo "O id do usuario é".$id;
    }
    /**
     * Método responsáel por criar os usuarios
     * @access public
     * @since 13/07/2020
     */
    public function excluir($id){
        if(!isset($_SESSION['tipo']) || (isset($_SESSION['tipo']) && ($_SESSION['tipo'] != 'A'))) {
            header("location:".HOME_URI."usuario");
            $msg['msg']="Usuário não logado ou sem permissao";
            $msg['class']="danger";
            $_SESSION['msg'][]=$msg;

        }else{ 
            $sql="DELETE FROM usuarios WHERE id = $id";  
            $sql=$this->db->query($sql);
        }
        header("location:".HOME_URI."usuario");
        
    }
    /**
     * Método responsáel por carregar a pagina de login
     * @access public
     * @since 09/07/2020
     */
    public function login(){   
        include HOME_DIR."view/paginas/usuarios/login.php";
    }
    /**
     * Método responsáel por carregar a pagina de logout
     * @access public
     * @since 09/07/2020
     */
    public function logout(){
        unset($_SESSION['nome']);
        unset($_SESSION['id']);
        unset($_SESSION['tipo']);
        header("location:".HOME_URI);
    }
    /**
     * Método responsáel por carregar a pagina redefinir a senha
     * @access public
     * @since 09/07/2020
     */
    public function redefinir(){

       
        include HOME_DIR."view/paginas/usuarios/redefinirSenha.php";
        
    }
}