<?php
    /*
    * Classe Noticia
    * Classe desenvolvida durante aulas do curso técnico em informática
    * @author Daniela daniela-rseolino@educar.rs.gov.br
    * @version 0.1
    * @ access public
    * @copyright GPL 2020, Info63
    * @since 16/07/2020
    *
    */
    $class=null;
    $acao=null;
    $parametros=null;
    /* vericar se existe caminho definido */
    if(isset($_GET['path'])){
        $caminho=explode("/",$_GET['path'] );
        $class=$caminho[0];
    
        if(isset($caminho[1])){
            $acao=$caminho[1];
        }
        
        
        if(count($caminho)>2){
            for($i=2;$i<count($caminho);$i++){
                $parametros[]=$caminho[$i];
            }
        }
        
    
    }else{
        $class="Inicio";
    }
    
        /*Todos os caracteres em minusculo */
        $class= strtolower($class);
    
        /*primeirocaracter em maiusculo */
        $class=ucfirst($class);
        /**Verifca a existencia do arquivo com base no nome de classe passado */
        if(file_exists("./classes/".$class.".php")){
            include "./classes/".$class.".php";
            /*Verifica a existencia da classe */
            if(class_exists($class)){
               /**Instancia objeto */
                $class=new $class();
               /**VERIFICA SE TEM UMA AÇÃO */
                if($acao){
                    if(!isset($parametros[0])){
                        $class->$acao();
                    }else{
                        if(count($parametros)==1){
                            $class->$acao($parametros[0]);
                        }else if(count($parametros)==2){
                            $class->$acao($parametros[0],$parametros[1]);
                        }else if(count($parametros)==3){
                            $class->$acao($parametros[0],$parametros[1],$parametros[2]);
                        }
                    }
                    
                }else{
                    $class->index();
                }
    
            }else{
                include HOME_DIR."view/paginas/erro104.php";
            }
        }else{
            include HOME_DIR."view/paginas/erro104.php";
        }
        
