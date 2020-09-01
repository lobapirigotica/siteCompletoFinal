<main>
<div class = "row">
    <div class="col-md-1">
        <a class="btn btn-primary btn-sm" href="<?php echo HOME_URI;?>?path=usuario/criar">Criar</a>
	</div>
    <div class="col-md-1">
        <a class="btn btn-primary btn-sm" href="<?php echo HOME_URI;?>?path=usuario/redefinir">Redefinir</a>
	</div>

</div>

<table class="table">
<thead>
    <tr><td>#</td><td>Nome</td><td>Email</td><td>Ação</td></tr>
</thead>
    
    <?php if(count($dados) > 0): ?>
        <?php foreach($dados as $usuario) : ?>
            <tr><td><?php echo $usuario['id']; ?></td><td><?php echo $usuario['nome']; ?></td><td><?php echo $usuario['email']; ?></td>
            <td><a href =" <?php echo HOME_URI.'usuario/excluir/'.$usuario['id'] ?>" onclick="return confirm('Tem Certeza?')" >Excluir</a> </td></tr>
        <?php endforeach;?>         
    <?php endif; ?>


</table>
</main>