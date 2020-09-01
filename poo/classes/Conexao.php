<?php
    class Conexao{
        /*
        * Classe Conexao
        * Classe desenvolvida durante aulas do curso técnico em informática
        * @author Daniela daniela-rseolino@educar.rs.gov.br
        * @version 0.1
        * @ access public
        * @copyright GPL 2020, Info63
        * @since 09/07/2020
        *
        */
        protected $db;
        public function  __construct(){
            $this->db = new PDO("mysql:dbname=".dbname.";host=".host,dbuser,dbpass);
        }
    }
?>