<h1><?=$data['edit'] ? 'Editar' : 'Novo'?> Produto</h1>   
<div class="row">
    <div class="col-8">
        <form enctype="multipart/form-data" action="<?=__BASEURL__?>admin/produto/<?=$data['edit'] ? 'editar/' : ''?>" method="POST" style="background: #f5f5f5;padding: 15px;border: 1px solid #a1a1a1;border-radius: 10px;">
            <input type="hidden" name="id" id="id" value="<?=$data['produto']->id ?? ''?>" />
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Nome</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" required name="name" value="<?=$data['produto']->name ?? ''?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="photo" class="col-sm-4 col-form-label">Foto</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="photo" name="photo" value="<?=$data['produto']->photo ?? ''?>"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="value" class="col-sm-4 col-form-label">Valor</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control money" id="value" name="value" value="<?=$data['produto']->value ?? ''?>" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="value" class="col-sm-4 col-form-label">Valor Promocional</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control money" id="promotion_value" name="promotion_value" value="<?=$data['produto']->promotion_value ?? ''?>"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="promotion_start" class="col-sm-4 col-form-label">Inicio da Promoção</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control date" id="promotion_start" name="promotion_start" value="<?=$data['produto']->promotion_start ?? ''?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="promotion_end" class="col-sm-4 col-form-label">Fim da Promoção</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control date" id="promotion_end" name="promotion_end" value="<?=$data['produto']->promotion_end ?? ''?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="weight" class="col-sm-4 col-form-label">Peso</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control weight" id="weight" name="weight" value="<?=$data['produto']->weight ?? ''?>" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="height" class="col-sm-4 col-form-label">Altura</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control measures" id="height" name="height" value="<?=$data['produto']->height ?? ''?>" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="width" class="col-sm-4 col-form-label">Largura</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control measures" id="width" name="width" value="<?=$data['produto']->width ?? ''?>" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="length" class="col-sm-4 col-form-label">Comprimento</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control measures" id="length" name="length" value="<?=$data['produto']->length ?? ''?>" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-12 col-form-label">Descrição</label>
                <div class="col-sm-12">
                    <textarea class="form-control" id="description" name="description" required><?=$data['produto']->description ?? ''?></textarea>
                </div>
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-success" value="Salvar" />
            </div>
        </form>
    </div>            
</div>
    