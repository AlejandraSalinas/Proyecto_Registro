<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';

class AccesoriosDispositivoModel
{
    private $id_tipo_accesorio;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_tipo_accesorio;
    }

    public function getById($id_tipo_accesorio)
    {
        $datos_accesorios = [];

        try {
            $sql = "SELECT * FROM tipo_accesorios WHERE id_tipo_accesorio = :id_tipo_accesorio";
            $query  = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_tipo_accesorio' => $id_tipo_accesorio
            ]);

            while ($row = $query->fetch()) {
                $item                          = new AccesoriosDispositivoModel();
                $item->id_tipo_accesorio  = $row['id_tipo_accesorio'];
                $item->nombre                  = $row['nombre'];

                array_push($datos_accesorios, $item);
            }

            return $datos_accesorios;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $array = [];

        try {
            $sql = 'SELECT id_tipo_accesorio, nombre
            FROM id_tipo_accesorio
            ORDER BY id_accesorio ASC';
                        $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new AccesoriosDispositivoModel();
                $datos->id_tipo_accesorio = $row['id_tipo_accesorio'];
                $datos->nombre                 = $row['nombre'];

                array_push($array, $datos);
            }

            return $array;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function store($datos)
    {
        try {

            $sql = 'INSERT INTO tipo_accesorios(nombre) VALUES(:nombre)';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'nombre'    => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function update($datos)
    {
        try {
            $sql = 'UPDATE tipo_accesorios SET tipo_accesorios= :tipo_accesorios WHERE id_tipo_accesorio = :id_tipo_accesorio';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_tipo_accesorio' => $datos['id_tipo_accesorio'],
                'nombre'     => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_tipo_accesorio)
    {
        try {
            $sql = 'DELETE FROM tipo_accesorios WHERE id_tipo_accesorio = :id_tipo_accesorio';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_tipo_accesorio' => $id_tipo_accesorio,
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    // GETTER Y SETTER
    public function getTipoAccesorios()
    {
        return $this->nombre;
    }
    public function setTipoAccesorios($nombre)
    {
        $this->nombre = $nombre ;
    }
}