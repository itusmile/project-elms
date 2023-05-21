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
            PASSWORD
        )
        VALUES(:fname, :lname, :nname, :email, :phone, :department_id, :quota, :username, :password)";
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
        ]);
        return true;
    }

    public function read()
    {
        $sql = "SELECT * FROM tbl_employees e INNER JOIN tbl_departments d ON e.department_id = d.department_id ORDER BY d.department_name";
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

    public function checkUsername($username)
    {
        $sql = "SELECT * FROM tbl_employees WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch();
        return $result;
    }

    public function update($id, $fname, $lname, $email, $phone)
    {
        $sql = "UPDATE tbl_employees SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone,
            'id' => $id
        ]);
        return true;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tbl_employees WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        return true;
    }
}
