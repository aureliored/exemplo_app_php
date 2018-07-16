<h1>produtos</h1>   
<div class='row'>
    <div class='col-8'>
        <div class="card">

            <img class="card-img-top" style=" width: 100%; display: block;" src="<?=$produto->photo ??  __BASEURL__ . "/public/img/product/no-image.jpeg"?>" />
            <div class="card-body">
                <h5 class="card-title"><?=$data['produto']->name?></h5>
                <p class="card-title"><?=$data['produto']->description?></p>
            </div>
        </div>
    </div>
    <div class='col-4'>
        <div class="card">
            <div class="card-body <?=empty($data['produto']->promotion_value) ? '' : 'promotion-active'?>">
                <p class="card-text product-value">Valor: <?=$data['produto']->value?></p>
                <p class="card-text promotion-value"><?=$data['produto']->promotion_value ?? ''?></p>
                <p class="card-text frete"></p>
                <p class="card-text prazo"></p>
                <form id="frete-form" action="<?=__BASEURL__ . 'frete';?>" target="_blank" method="post">
                    <input type="hidden" name="weight" value="<?=$data['produto']->weight ?? ''?>" />
                    <input type="hidden" name="length" value="<?=$data['produto']->length ?? ''?>" />
                    <input type="hidden" name="height" value="<?=$data['produto']->height ?? ''?>" />
                    <input type="hidden" name="width" value="<?=$data['produto']->width ?? ''?>" />
                    <input type="hidden" name="value" value="<?=$data['produto']->value_clear ?? ''?>" />
                    <div class="form-group row">
                        <div class='col-12'>
                            <select name='method' id="method" class="form-control">
                                <option value=''>Selecione o envio</option>
                                <?php foreach($data['shipmentMethod'] as $method => $code) : ?>
                                <option value='<?=$code?>'><?=$method?></option>
                                <?php endforeach; ?>
                            </select><br/>
                        </div>
                        <div class='col-6'>
                            <input type="text" value='' class="form-control cep" name='postcode' /><br/>
                        </div>
                        <div class='col-5'>
                            <input type="submit" value="Calcular" class="btn btn-default"/>
                        </div>
                    </div>
                </form>
                <!-- Modal HTML embedded directly into document -->
                <div id="comprar" class="modal">
                    <p>Obrigado pela preferencia, insira as informações a baixo e entraremos em contato</p>
                    <form enctype="multipart/form-data" id="comprar" action="<?=__BASEURL__?>produto/comprar/" method="POST" style="background: #f5f5f5;padding: 15px;border: 1px solid #a1a1a1;border-radius: 10px;">
                        <input type="hidden" name="id" id="id" value="<?=$data['produto']->id ?? ''?>" />
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nome</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" required name="name" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">E-mail</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <a href="#" class="btn btn-danger" rel="modal:close">Cancelar</a>
                                <input type="submit" class="btn btn-success"  value="Confirmar"/>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Link to open the modal -->
                <p><a href="#comprar" class="btn btn-success" rel="modal:open">Comprar</a></p>
            </div>
        </div>
    </div>
</div>
<script>
(function($){
    $("#frete-form").submit(function(e) {
        $.ajax({
            type: "POST",
            url: '<?=__BASEURL__ . 'frete';?>',
            data: $("#frete-form").serialize(),
            success: function(data)
            {
                var response = $(data)
                var valor = response.find('Valor')[0].innerHTML;
                var prazo = response.find('PrazoEntrega')[0].innerHTML;
                
                $('.frete').html($('#method option:selected').html() + ': R$ ' + valor);
                $('.prazo').html(prazo + ' dias uteis.');
            }
        });

        e.preventDefault();
    });
    $("#comprar").submit(function(e) {
        $.ajax({
            type: "POST",
            url: '<?=__BASEURL__ . 'produto/comprar/';?>',
            data: $("#comprar").serialize(),
            success: function(data)
            {
               if(data){
                   alert('Compra realizada com sucesso.');
                   window.location = '<?=__BASEURL__;?>';
                }else{
                    alert('Infelizmente não conseguimos computar sua compra. Tente novamente mais tarde.');
               }
            }
        });

        e.preventDefault();
    });
})(jQuery)
</script>
    