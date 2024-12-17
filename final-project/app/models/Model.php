<?php 

namespace app\models;

use app\models\ModelException;
use \PDO;
use \PDOException;

abstract class Model {

    private static $conn = null;

    private $table_name = "";

    public function __construct($table_name) {
        $this->table_name = $table_name;
    }

    public function getTableName() {
        return $this->table_name;
    }

    public static function connect() {
        if (Model::$conn !== null) {
            // return Mode::$conn;
        }
        $driver = DBDRIVER;
        //$hostname = DBHOST;
        // $port = DBPORT;
        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        try {
            $con = new PDO($string, DBUSER, DBPASS);
            $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            Model::$conn = $con;
            return $con;
        }
        catch (PDOException $ex) {
            throw new ModelException($ex->getMessage());
        }
    }

    public static function disconnect() {
        Model::$conn = null;
    }

    public function save() {
        $table_name = $this->getTableName();
        $nvmap = $this->get_insert_name_value();
        $columns = array_keys($nvmap);
        $values = array_values($nvmap);
        $size = count($columns);
        $sql = "INSERT INTO $table_name (".implode(', ', $columns).") VALUES (".implode(", ", array_fill(0, $size, '?')).");";
        try {
            $conn = Model::connect();
            $stmt = $conn->prepare($sql);
            if ($stmt->execute($values)) {
                $id = $conn->lastInsertId();
                $this->set_inserted_id($id);
                return $this;
            }
        }
        catch (PDOException $ex) {
            throw new ModelException($ex->getMessage());
        }
    }

    public function getById($id) {
        return $this->fetchOneMatchAllCondition(['id' => $id]);
    }

    public function getByEmail($email) {
        return $this->fetchOneMatchAllCondition(['email' => $email]);
    }

    public function fetchOneMatchAllCondition($filter = []) {
        $table_name = $this->getTableName();
        $data = [];
        $sql = "SELECT * FROM $table_name";
        if ($filter && count($filter) > 0) {
            $where = implode(" and ", array_map(function($column, $value) {
                return "$column = ?";
            }, array_keys($filter), $filter));
            $sql .= " WHERE $where";
            $data = array_values($filter);
        }
        $sql .= " LIMIT 1;";
        $results = $this->query($sql, $data);
        if (count($results)) {
            return $results[0];
        }
        return null;
    }

    public function fetchAll() {
        $table_name = $this->getTableName();
        $sql = "SELECT * FROM $table_name";
        return $this->query($sql);
    }

    public function query($sql, $data = []) {
        try {
            $conn = Model::connect();
            $stmt = $conn->prepare($sql);
            if ($stmt->execute($data)) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (is_array($rows) && count($rows)) {
                    $results = array();
                    foreach ($rows as $row) {
                        $results[] = $this->create_model_from_result_array($row);
                    }
                    return $results;
                }
            }
        }
        catch (PDOException $ex) {
            throw new ModelException($ex->getMessage());
        }
        return [];
    }

    protected abstract function get_insert_name_value();

    protected abstract function set_inserted_id($id);

    protected abstract function create_model_from_result_array($result);

}