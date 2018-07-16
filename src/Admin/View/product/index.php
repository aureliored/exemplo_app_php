<h1>produtos</h1>   
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
                                <button type="button" class="btn btn-primary">Editar</button>
                                <button type="button" class="btn btn-danger">Remover</button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    
    </div>
</div>
    