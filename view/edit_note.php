<?php

$id = $title = $content ="";

if(isset($dataToView["data"]["id"]))
$id = $dataToView["data"]["id"];

if(isset($dataToView["data"]["title"]))
$title = $dataToView["data"]["title"];

if(isset($dataToView["data"]["content"]))
$content = $dataToView["data"]["content"];
?>


<div class="row">
    <?php
    if(isset($_GET["response"]) and $_GET["response"] === true){
        ?>
     <div class="alert alert-success">
        Operacion Realizada Correctamente. <a href="index.php?controller=note&action=list">Volver al Listado</a>
    </div>   
    <?php }  ?>

<!--    creacion del Formulario -->

    <form action="index.php?controller=note&action=save" class="form" method="POST">
    
        <input type="hidden" name="id" value="<?php echo $id; ?>" >

        <div class="form-group">
            <label>Titulo</label>
            <input type="text" name="title" class="form-control" value="<?php echo $title;?>"/>
        </div>

        <div class="form-group">
            <label>Contenido</label>
            <textarea name="content" cols="30" rows="10" class="form-control"> <?php echo $content; ?></textarea>
        </div>

        <input type="submit" value="Guardar" class="btn btn-danger">
        <a href="index.php?controller=note&action=list" class="btn btn-outline-success">Cancelar
        </a>
    </form>
</div>