<?php

require_once 'Config.php';

class Department extends Config
{
    public function insert($full_name, $sort_name)
    {
        $sql = "INSERT INTO tbl_departments(
            full_name,
            sort_name
        )
        VALUES(:full_name, :sort_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'full_name' => $full_name,
            'sort_name' => $sort_name,
        ]);
        return true;
    }

    public function read()
    {
        $sql = "SELECT * FROM tbl_departments ORDER BY department_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
