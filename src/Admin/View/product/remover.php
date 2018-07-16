<h1>Remover Produto</h1>   
<div class="row">
    <div class="col-8">
        <form action="<?=__BASEURL__?>admin/produto/remove/" method="POST" style="background: #f5f5f5;padding: 15px;border: 1px solid #a1a1a1;border-radius: 10px;">
            <input type="hidden" name="id" id="id" value="<?=$data['produto']->id ?? ''?>" />

            <div class="col-12">Você precisa confirmar a remoção do produto <?=$data['produto']->name ?? ''?>.</div>
            <div class="col-12">
                <a href="<?=__BASEURL__?>admin/" class="btn btn-default">Cancelar</a>
                <input type="submit" class="btn btn-danger" value="Confirmar" />
            </div>
        </form>
    </div>            
</div>
    