<?php

class Comentario{
    /*
    * Classe Comentario
    * Classe desenvolvida durante aulas do curso técnico em informática
    * @author Daniela daniela-rseolino@educar.rs.gov.br
    * @version 0.1
    * @ access public
    * @copyright GPL 2020, Info63
    * @since 02/08/2020
    *
    */
    /**
     *  @access private
     * @name id
     */
    private $id;
    /**
     *  @access private
     * @name comentario
     */
    private $comentario;
    /**
     *  @access private
     * @name data
     */
    private $data;
    /**
     *  @access private
     * @name noticia
     */
    private $noticia;
    /**
     *  @access private
     * @name usuario
     */
    private $usuario;
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
    public function setComentario($comentario){
        $this->comentario=$comentario;
    }
    /**
     * @access public
     * @param date
     */
    public function setData($data){
        $this->data=$data;
    }
    /**
     * @access public
     * @param string
     */
    public function setNoticia($noticia){
        $this->noticia=$noticia;
    }
    /**
     * @access public
     * @param string
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
    public function getComentario(){
        return $this->comentario;
    }
    /**
     * @access public
     * @return date
     */
    public function getData(){
        return $this->data;
    }
    /**
     * @access public
     * @return string
     */
    public function getNoticia(){
        return $this->noticia;
    }
    /**
     * @access public
     * @return string
     */
    public function getUsuario(){
        return $this->usuario;
    }
    /**
     * Metódo responsável por salvar comentario
     * @access public
     * @since 10/08/2020
     */
    public function salvar($id, $comentario, $noticia_id, $usuario_nome){
        $conexao=Conexao::getConexao();
        if(empty($id)){
            $dql="INSERT INTO comentario
            VALUES
            ('"".$comentario."',".$noticcia_id.",'".$usuario_nome."')";
        }else{
            $sql="";
        }
        if($conexao->query())
    }
    /**
     * @access public
     * @return date
     */
    public function getData(){
        return $this->date_default_timezone_get;
    }



}