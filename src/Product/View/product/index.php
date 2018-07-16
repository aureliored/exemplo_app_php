<h1>Produtos</h1>   
<div class='row'>
    <?php 
        foreach($data['produtos'] as $produto): 
            $class = '';
            if (isset($produto->promotion_value)){ 
                $class = 'promotion-active'; 
            }
            ?>
    <div class='col-3'>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"  style="height: 180px; width: 100%; display: block;" src="<?=$produto->photo ??  __BASEURL__ . "/public/img/product/no-image.jpeg"?>">
            <div class="card-body <?=$class?>">
                <h5 class="card-title"><?=$produto->name?></h5>
                <p class="card-text product-value"><?=$produto->value?></p>
                <p class="card-text promotion-value"><?=$produto->promotion_value ?? ''?></p>
                <a href="#" class="btn btn-success">Comprar</a>
                <a href="<?=__BASEURL__ . 'details/?id=' . $produto->id?>" class="btn btn-primary">Detalhes</a>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>
    