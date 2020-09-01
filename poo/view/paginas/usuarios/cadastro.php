<?php
    /*
    * View cadastro
    * View desenvolvida durante aulas do curso técnico em informática
    * @author Daniela daniela-rseolino@educar.rs.gov.br
    * @version 0.1
    * @ access public
    * @copyright GPL 2020, Info63
    * @since 09/07/2020
    *
    */
    $mensagem='';
    /**
     * Verificacao do post
     */
    if (!empty($_POST)){
        $email=addslashes($_POST['email']);
        $senha=addslashes($_POST['senha']);
        $senha2=addslashes($_POST['senha2']);

        $dados = fopen("dados.txt", "a");
        if($senha==$senha2){
            fwrite($dados, $email.md5($senha).';');
            header("Location: "."login.php");
        }
        else{
            echo 'Senhas não conferem!';
        }

    }
?>
<main>
     <div id="formulario" class="w-50 p-3" style="background-color: #eee;">
        <form  method="post">
            <div id="criar_conta">Crie sua conta:</div>
            <div id="barra_email_cadastro_externo">
                <input id="barra_email_cadastro" name="email" type="email" placeholder="E-mail">
            </div>
            <div id="barra_senha_cadastro_externo">
                <input id="barra_senha_cadastro" name="senha" type="password" placeholder="Senha">
            </div>
            <div id="barra_senha2_cadastro_externo">
                <input id="barra_senha2_cadastro" name="senha2" type="password" placeholder="Confirme a senha">
            </div> 
            <div id="barra_enviar_cadastro_externo">    
                <input id="barra_enviar_cadastro" name="submit" type="submit">
            </div>    
        </form>
        

    </div>
    
    </div>
</main>