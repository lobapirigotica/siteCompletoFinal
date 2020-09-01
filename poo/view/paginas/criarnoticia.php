<main>
    <div class = "row"> 
        <div class = "col-md-4"><p class="h2">Incluir Noticia</p></div>
    </div>
    <br>
    <form action="<?php echo HOME_URI;?>noticia/salvar" method="POST">
        <fieldset>
        <div class = "row"> 
            <div class = "col-md-12">
                <label for="titulo">Titulo: </label>
                <br>
                <input type='text' name='titulo' />
            </div>
        </div>
        <br>
        <div class = "row">
            <div class = "col-md-12">
                <label for="noticia">Noticia : </label> 
                <br>
                <textarea name="noticia" rows="10" cols="60"></textarea>
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
