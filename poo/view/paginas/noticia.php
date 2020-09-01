<?php
    /*
    * View noticia
    * Classe desenvolvida durante aulas do curso técnico em informática
    * @author Daniela daniela-rseolino@educar.rs.gov.br
    * @version 0.1
    * @ access public
    * @copyright GPL 2020, Info63
    * @since 23/07/2020
    *
    */
    /**
     * verificacao do post
     */
if (!empty($_POST)){
        $c=addslashes($_POST['comentario']);
        $noticiaid = addslashes($_POST['noticiaid']);
        if(isset($_SESSION['id'])) {
            $iduser = $_SESSION['id'];
        }else{
            $iduser = 0;
        }
        $sql="INSERT INTO comentarios SET idnoticia = $noticiaid, iduser = $iduser, comentario = '$c'";
        
        $sql=$this->db->query($sql);
    
 
}
?>




<html>
<main>
<div class = "row">
    <div class="col-md-1">
        <a class="btn btn-primary btn-sm" href="<?php echo HOME_URI;?>noticia/criar">Nova Noticia</a>
	</div>
</div>
<br>


<?php if(count($dados) > 0): ?>
        <?php foreach($dados as $noticia) : ?>
            <div class="panel panel-primary">
                <div class="panel-heading"><h1><?php echo $noticia['titulo']; ?> </h1></div>
            </div>
            <p class="text"><?php echo $noticia['noticia']; ?> </p>
            <div class='data'><span class="label label-primary"><?php echo $noticia['data']; ?></span> 
                <a class="btn btn-danger btn-sm" href="<?php echo HOME_URI;?>noticia/excluirnoticia/<?php echo $noticia['id']?>">Excluir Noticia</a>
            </div>
            <div class="col-md-1">
                
	        </div>

            <?php
                $comentarios = '';
                $idnoticia = $noticia['id'];
                $sql="SELECT * FROM comentarios WHERE idnoticia = $idnoticia";
                $sql=$this->db->query($sql);
                if($sql->rowCount() > 0) : ?>
                    <?php
                        $comentarios = $sql->fetchAll(); ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h5 class="panel-title">Comentarios</h5>
                            </div>
                        </div>
                        <?php foreach($comentarios as $comentario) : ?>
                            <div class="coments">
                                <?php 
                                    $user = $comentario['iduser'];
                                    $nome = 'anonimo';
                                    if ( $user > 0) {
                                        $sql= "SELECT * FROM usuarios WHERE id = $user";
                                        $sql=$this->db->query($sql);
                                        if($sql->rowCount() > 0) {
                                            $user = $sql->fetch();
                                            $nome = $user['nome'];
                                        }
                                    }

                                ?>
                                <p class="nome-user"><?php echo $nome.'  '; ?><a class="btn btn-danger btn-sm" href="<?php echo HOME_URI;?>noticia/excluircomentario/<?php echo $comentario['id']?>">Excluir</a> </p>
                                <p class="coment-user"><?php echo $comentario['comentario']; ?></p>
                            </div>
                        <?php endforeach; ?>
                <?php endif; ?>
            <form method="post" class="form">  
                <div class="form-group">
                    <input id="comentario" name="comentario" type="text" class="form-control" placeholder="Adicione um comentário">
                    <input id="noticiaid" name="noticiaid" type="hidden" value="<?php echo $noticia['id'] ?>">
                </div>
                <div class="input-form">
                    <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                    </div>
                </div>      
            
            </form>
        <?php endforeach;?>         
<?php endif; ?>


</main>
</html>