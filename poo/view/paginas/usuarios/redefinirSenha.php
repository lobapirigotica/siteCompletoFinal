<?php
    /*
    * View redefinir senha
    * @author Daniela daniela-rseolino@educar.rs.gov.br
    * @version 0.1
    * @ access public
    * @copyright GPL 2020, Info63
    * @since 31/07/2020
    *
    */
    $mensagem='';
    /**
     * verificacao do post
     */
    if (!empty($_POST)){
        $senha1=addslashes($_POST['senha1']);
        $senha2=addslashes($_POST['senha2']);
        $id = $_SESSION['id'];
        if($senha1 == $senha2){
            $sql="UPDATE usuarios SET senha = md5('$senha1') WHERE id = $id";
            $sql=$this->db->query($sql);
                header("location:".HOME_URI);
        }else{
            $mensagem='Senhas nao sao iguais';
        }
    }   
   


    

    ?>
    <main>
        <div class = "row"> 
            <div class = "col-md-4"><p class="h2">Alterar Senha  </p></div>
        </div>
        <br>

        <form  method="post">
            <div class = "row"> 
                <div class = "col-md-4">
                    <label for="senha1">Nova Senha : </label> 
                    <input id="senha1" name="senha1" type="password">
                </div>
                <div class = "col-md-4">
                    <label for="senha2">Repita a  Senha : </label> 
                    <input id="senha" name="senha2" type="password" >
                </div>
            </div>
            <br>
            <div class = "row">
                <div class = "col-md-1">
                <input id="enviar" name="submit" type="submit" class="btn btn-primary btn-md btn-block active">
                </div>
            </div>
                
        </form>
</main>
