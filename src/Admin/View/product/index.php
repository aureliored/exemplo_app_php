<h1>Produtos <a href="<?=__BASEURL__ . 'admin/produto/novo/';?>" class="btn btn-success">Novo</a></h1>   
<?php if(!empty($data['message'])):?>
<div class="alert alert-dark" role="alert">
  <?=$data['message'];?>
</div>
<?php endif;?>
<div class='row'>
    <div class='col-12'>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Valor Promocional</th>
                    <th scope="col">Inicio Promocional</th>
                    <th scope="col">Final Promocional</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($data['produtos'] as $produto): 
                            $class = '';
                            if (isset($produto->promotion_value)){ 
                                $class = 'promotion-active'; 
                            }
                    ?>
                    <tr>
                        <td><?=$produto->id?></td>
                        <td><?=$produto->name?></td>
                        <td><?=$produto->value?></td>
                        <td><?=$produto->promotion_value ?? '-'?></td>
                        <td><?=$produto->promotion_start ?? '-'?></td>
                        <td><?=$produto->promotion_end ?? '-'?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a  href="<?=__BASEURL__?>admin/produto/?id=<?=$produto->id?>" class="btn btn-primary">Editar</a>
                                <a  href="<?=__BASEURL__?>admin/produto/deletar/?id=<?=$produto->id?>" class="btn btn-danger">Remover</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    
    </div>
</div>
    