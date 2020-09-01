<main>
    <div class = "row"> 
        <div class = "col-md-4"><p class="h2">Cadastro de Usuários</p></div>
    </div>
    <br>
    <form action="<?php echo HOME_URI;?>usuario/salvar" method="POST">
        <fieldset>
        <div class = "row"> 
            <div class = "col-md-4">
                <label for="nome">Nome: </label>
                <input type='text' name='nome'/>
            </div>
            <div class = "col-md-4">
                <label for="email">Email : </label> 
                <input type='text' name='email' />
            </div>
        </div>
        <br>
        <div class="row">
            <div class = "col-md-1">
                <input type='submit' name='enviar' value="Enviar" class="btn btn-primary btn-md btn-block active" />
            </div>
        </div>
        </fieldset>
    </form>


</main>

