<div class="row">
    <form action="index.php?controller=note&action=delete" class="form" method="POST">
        <input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" >

        <div class="alert alert-warning">
            <b>¿Confirma que desea eliminar esta nota?:</b>
            <i><?php echo $dataToView["data"]["title"]; ?> </i>
        </div>
        <input type="submit" value="Eliminar" class="btn btn-danger">
        <a href="index.php?controller=note&action=list" class="btn btn-outline-success">Cancelar
        </a>
    </form>
</div>