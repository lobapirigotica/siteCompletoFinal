<?php
    /*
    * View usuarios
    * Classe desenvolvida durante aulas do curso técnico em informática
    * @author Daniela daniela-rseolino@educar.rs.gov.br
    * @version 0.1
    * @ access public
    * @copyright GPL 2020, Info63
    * @since 23/07/2020
    *
    */
    $mensagem='';
    /**
     * verificacao do post
     */
    if (!empty($_POST)){
        $email=addslashes($_POST['email']);
        $senha=addslashes($_POST['senha']);
        $dados = '';
        $sql="SELECT * FROM usuarios WHERE email = '$email' and senha = md5('$senha')";
        $sql=$this->db->query($sql);
        if($sql->rowCount() > 0) {
            $dados = $sql->fetch();
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['id'] = $dados['id'];
            $_SESSION['tipo'] = $dados['tipo'];
            if($senha == DEFAULT_PASS){
                header("Location: ".HOME_URI."usuario/redefinir");
                echo 'depois';
                exit;
            }
            header("location:".HOME_URI);
        }else{
            $mensagem='Usuário não encontrado!';

        }       

    }


    

?>
<main>
    <div class = "row"> 
        <div class = "col-md-4"><p class="h2">Faça seu Login </p></div>
    </div>
    <br>

    <form  method="post">
        <div class = "row"> 
            <div class = "col-md-4">
                <label for="email">Email : </label> 
                <input  id="email" name="email" type="email" class="form-control" />
            </div>
            <div class = "col-md-4">
                <label for="senha">Senha : </label>
                <input id="senha" name="senha" type="password" class="form-control"/>
            </div>
        </div>
        <br>
        <div class = "row"> 
            <div class = "col-md-1">
                <input id="enviar" name="submit" type="submit" class="btn btn-primary btn-md btn-block active" /> 
        </div> 
    </form>

    <div id="mensagem1">
        <?php
        if (!empty($mensagem))
        echo $mensagem;
        ?>
    </div>
</main>