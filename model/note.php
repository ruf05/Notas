<?php


class note{
    private $table='note';
    private $conection;

    //Constructor Vacio
    public function __construct()
    {
    }
    //obtenemos la coneccion
    public function getConection()
    {
        $dbObj = new Db();
        $this -> conection = $dbObj->conection;
    }//Cierre de coneccion

    //Obtenemos las Notas
    public function getNotes()
    {
        $this->getConection();
        $sql =" SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }//Fin de la funcion de obtener notas

    public function getNoteById($id)
    {
        if(is_null($id)) return false;

        $this->getConection();
        $sql = " SELECT * FROM " . $this->table . " WHERE id = ? ";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }//Fin de la funcion de obtener notas por id

    /** Funcion de guardar o save note */
    public function save($param)
    {
        $this->getConection();

        /* Establecemos valores por defecto */
        $title = "";
        $content = "";

        /*Revisar si existe*/
        $exists = false;
        if (isset($param["id"]) and $param["id"] != '' ) 
        {
            $actualNote = $this->getNoteById($param["id"]);
            if(isset($actualNote["id"]))
            {
                $exists=true;
                /*valores Actuales*/
                $id = $param["id"];
                $title = $actualNote["title"];
                $content = $actualNote["content"];
            } 
        }//fin si existe

        //Recibir valores
        if (isset($param["title"]))
            $title = $param["title"];

        if (isset($param["content"]))
            $content = $param["content"];

        /*Operacion en la bases de datos */
        if ($exists)
        {
            //Editar
            $sql = " UPDATE " . $this->table . " SET title=?,content=? WHERE id = ?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$title, $content, $id]);
        }
        else
        {
            //Registrar o insertar
            $sql=" INSERT INTO " . $this->table . "(title, content) Values(?,?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$title, $content]);
            $id = $this->conection->lastInsertId();
        }
        return $id;
    }//Cierre de llaves de mi funcion Guardar

    public function deleteNoteById($id)
    {
        $this->getConection();
        $sql = " DELETE FROM ". $this->table . " WHERE id = ? ";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }
}//Fin de la clase note

?>