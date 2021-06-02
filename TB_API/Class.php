<?php

class Conn
{
    public $pdo;
    public function conectar()
    {
        global $pdo;
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=map;charset=utf8','root','');
            return true;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function Salvar($saida, $destino, $lat_start, $long_start, $lat_end, $long_end){
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO coordenadas (SAIDA, CHEGADA, LATITUDE_SAIDA, LONGITUDE_SAIDA, LATITUDE_CHEGADA, LONGITUDE_CHEGADA) VALUES(:a, :b, :c, :d, :e, :f) ");
        $sql->bindValue(":a",$saida);
        $sql->bindValue(":b",$destino);
        $sql->bindValue(":c",$lat_start);
        $sql->bindValue(":d",$long_start);
        $sql->bindValue(":e",$lat_end);
        $sql->bindValue(":f",$long_end);
        $sql->execute();
    
    }
}
 