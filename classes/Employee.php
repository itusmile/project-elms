<?php

require_once 'Config.php';

class Employee extends Config
{
    public function insert($fname, $lname, $nname, $email, $phone, $department_id, $quota, $username, $password)
    {
        $sql = "INSERT INTO tbl_employees(
            first_name,
            last_name,
            nick_name,
            email,
            phone,
            department_id,
            quota,
            username,
            PASSWORD,
            status
        )
        VALUES(:fname, :lname, :nname, :email, :phone, :department_id, :quota, :username, :password, :status)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'nname' => $nname,
            'email' => $email,
            'phone' => $phone,
            'department_id' => $department_id,
            'quota' => $quota,
            'username' => $username,
            'password' => $password,
            'status' => 'active',
        ]);
        return true;
    }

    public function read()
    {
        $sql = "SELECT * FROM tbl_employees e INNER JOIN tbl_departments d ON e.department_id = d.department_id ORDER BY e.status, d.department_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function readOne($id)
    {
        $sql = "SELECT * FROM tbl_employees e INNER JOIN tbl_departments d ON e.department_id = d.department_id WHERE e.employee_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function readByForeignKey($fk_id)
    {
        $sql = "SELECT * FROM tbl_leaves WHERE employee_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $fk_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function checkUsername($username)
    {
        $sql = "SELECT * FROM tbl_employees WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch();
        return $result;
    }

    public function update($id, $fname, $lname, $nname, $email, $phone, $department_id, $quota)
    {
        $sql = "UPDATE tbl_employees SET first_name = :fname, last_name = :lname, nick_name = :nname, email = :email, phone = :phone, department_id = :department_id, quota = :quota WHERE employee_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'nname' => $nname,
            'email' => $email,
            'phone' => $phone,
            'department_id' => $department_id,
            'quota' => $quota,
            'id' => $id
        ]);
        return true;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tbl_employees WHERE employee_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        return true;
    }

    public function nullDep($id)
    {
        $sql = "UPDATE tbl_employees SET department_id = :department_id WHERE employee_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'department_id' => '0',
            'id' => $id
        ]);
        return true;
    }

    public function leaveCount($employee_id)
    {
        $sql = "SELECT count(*) FROM tbl_leaves WHERE employee_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $employee_id
        ]);
        $result = $stmt->fetchColumn(0);
        return $result;
    }

    public function disabled($employee_id)
    {
        $sql = "UPDATE tbl_employees SET status = :status WHERE employee_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'status' => 'disabled',
            'id' => $employee_id,
        ]);
        return true;
    }
}
