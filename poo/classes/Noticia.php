<?php
/*
* Classe Noticia
* Classe desenvolvida durante aulas do curso técnico em informática
* @author Daniela daniela-rseolino@educar.rs.gov.br
* @version 0.1
* @ access public
* @copyright GPL 2020, Info63
* @since 09/07/2020
*
*/
class Noticia extends Conexao{ 
    /**
     *  @access private
     * @name id
     */
    private $id;
    /**
     *  @access private
     * @name titulo
     */
    private $titulo;
    /**
     *  @access private
     * @name descricao
     */
    private $descricao;
    /**
     *  @access private
     * @name comentarios
     */
    private $comentarios;
    /**
     *  @access private
     * @name data
     */
    private $data;
    /**
     *  @access private
     * @name usuario
     */
    private $usuario;

    /**
     * Método responsáel por carregar a página inicial
     * @access public
     * @since 09/07/2020
     */
    
    public function index(){
        $this->listar();
    }

    /**
     * @access public
     * @param int
     */
    public function setId($id){
        $this->id=$id;
    }

    /**
     * @access public
     * @param String
     */
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }

    /**
     * @access public
     * @param String
     */
    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }

    /**
     * @access public
     * @param String
     */
    public function setData($data){
        $this->data=$data;
    }

    /**
     * @access public
     * @param String
     */
    public function setUsuario($usuario){
        $this->usuario=$usuario;
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
    public function getTitulo(){
        return $this->titulo;
    }
     /**
     * @access public
     * @return string
     */
    public function getDescricao(){
        return $this->descricao;
    }
     /**
     * @access public
     * @return string
     */
    public function getUsuario(){
        return $this->usuario;
    }
    /**
     * Metódo responsável por listar notícias
     * @access public
     * @since 10/07/2020
     */
    public function listar(){
        $dados = array();
        $sql="SELECT id, noticia, titulo, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM noticias";
        $sql=$this->db->query($sql);
        if($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
        }
        include HOME_DIR."view/paginas/noticia.php";

        
       
    }
    /**
     * Metódo responsável por criar noticia
     * @access public
     * @since 10/07/2020
     */
    public function criar(){

        if(!isset($_SESSION['tipo'])) {
            $msg['msg']="Voce precisa estar logado";
            $msg['class']="danger";
            $_SESSION['msg'][]=$msg;
            header("location:".HOME_URI."noticia");
        }
        include HOME_DIR."view/paginas/criarnoticia.php";

    }
    /**
     * Metódo responsável por salvar noticia
     * @access public
     * @since 17/07/2020
     */
    public function salvar(){
        if(isset($_POST['enviar'])){
            $sql = "INSERT INTO noticias SET noticia = '".$_POST['noticia']."', titulo = '".$_POST['titulo']."', iduser = ".$_SESSION['id']; 
            $sql=$this->db->query($sql);
        }

        header("location:".HOME_URI."noticia");
    } 
    
    public function getData(){
        return $this->date_default_timezone_get;
    }
    /**
     * Metódo responsável por excluir notícia
     * @access public
     * @since 23/07/2020
     */
    public function excluirNoticia($id){
        if(isset($_SESSION['tipo'])) {
            
            if($_SESSION['tipo'] == 'U'){
                $sql="SELECT * from noticias WHERE id = $id";
                $sql=$this->db->query($sql);
                if($sql->rowCount() > 0) {
                    $noticia = $sql->fetch();
                    $iduser = $noticia['iduser'];
                }
            }
            if($_SESSION['tipo'] == 'A' || $iduser == $_SESSION['id']){
                $sql="DELETE FROM noticias WHERE id = $id";
                $sql=$this->db->query($sql);
                $sql="DELETE FROM comentarios WHERE idnoticia = $id";
                $sql=$this->db->query($sql);
            }else{
                $msg['msg']="Voce nao tem permissao para excluir essa noticia";
                            $msg['class']="danger";
                            $_SESSION['msg'][]=$msg;
                            
            }
        }else{
            $msg['msg']="Voce nao esta logado";
                            $msg['class']="danger";
                            $_SESSION['msg'][]=$msg;
        }



        header("location:".HOME_URI."noticia");


    }
    /**
     * Metódo responsável por excluir comentarios
     * @access public
     * @since 17/08/2020
     */
    public function excluirComentario($id) {
        if(isset($_SESSION['tipo'])) {
            
            if($_SESSION['tipo'] == 'U'){
                $sql="SELECT * from comentarios WHERE id = $id";
                $sql=$this->db->query($sql);
                if($sql->rowCount() > 0) {
                    $comentario = $sql->fetch();
                    $iduser = $comentario['iduser'];
                }
            }
            if($_SESSION['tipo'] == 'A' || $iduser == $_SESSION['id']){
                $sql="DELETE FROM comentarios WHERE id = $id";
                $sql=$this->db->query($sql);
            }else{
                $msg['msg']="Voce nao tem permissao para excluir esse comentario";
                            $msg['class']="danger";
                            $_SESSION['msg'][]=$msg;
                            
            }
        }else{
            $msg['msg']="Voce nao esta logado";
                            $msg['class']="danger";
                            $_SESSION['msg'][]=$msg;
        }



        header("location:".HOME_URI."noticia");
    }

}


?>