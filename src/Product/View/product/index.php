<h1>produtos</h1>   
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
            <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16490b52989%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16490b52989%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.18333435058594%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <?php  ?>
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
    