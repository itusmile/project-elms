<?php

require_once 'Config.php';
require_once 'Employee.php';

class Department extends Config
{
    public function insert($full_name, $sort_name)
    {
        $sql = "INSERT INTO tbl_departments(
            department_name,
            dep_name
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

    public function readOne($id)
    {
        $sql = "SELECT * FROM tbl_departments WHERE department_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function readByForeignKey($fk_id)
    {
        $sql = "SELECT * FROM tbl_employees WHERE department_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $fk_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update($id, $full_name, $sort_name)
    {
        $sql = "UPDATE tbl_departments SET department_name = :full_name, dep_name = :sort_name WHERE department_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'full_name' => $full_name,
            'sort_name' => $sort_name,
            'id' => $id
        ]);
        return true;
    }

    public function delete($id)
    {
        $sql_d = "DELETE FROM tbl_departments WHERE department_id = :id";
        $stmt = $this->conn->prepare($sql_d);
        $stmt->execute([
            'id' => $id
        ]);
        return true;
    }
}
