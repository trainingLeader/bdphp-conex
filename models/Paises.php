<?php
    namespace Models;
    class Paises{
        protected static $conn;
        protected static $columnsTbl=['id_pais','nombre_pais'];
        private $id_pais;
        private $nombre_pais;
        public function __construct($args = []){
            $this->id_pais = $args['id_pais'] ?? '';
            $this->nombre_pais = $args['nombre_pais'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $cols = $delimiter . join(',:',array_keys($dataBd));
            $sql = "INSERT INTO pais (nombre_pais) VALUES (:nombre_pais)";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute($dataBd);
        }
        public static function setConn($connBd){
            self::$conn = $connBd;
        }
        public function atributos(){
            $atributos = [];
            foreach (self::$columnsTbl as $columna){
                if($columna === 'id') continue;
                $atributos [$columna]=$this->$columna;
             }
             return $atributos;
        }
        public function sanitizarAttributos(){
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$conn->quote($value);
            }
            return $sanitizado;
        }
    }
?>