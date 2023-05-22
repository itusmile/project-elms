<?php

require_once 'Config.php';

class Leave extends Config
{
    public function insert($request, $start_date, $end_date, $count, $unit, $employee_id, $note, $status = "Progress")
    {
        $sql = "INSERT INTO tbl_leaves(
            request,
            start_date,
            end_date,
            count,
            unit,
            employee_id,
            note,
            status
        )
        VALUES(:request, :start_date, :end_date, :count, :unit, :employee_id, :note, :status)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'request' => $request,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'count' => $count,
            'unit' => $unit,
            'employee_id' => $employee_id,
            'note' => $note,
            'status' => $status,
        ]);
        return true;
    }

    public function read()
    {
        $sql = "SELECT * FROM tbl_leaves l INNER JOIN tbl_employees e ON l.employee_id = e.employee_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // public function readOne($id)
    // {
    //     $sql = "SELECT * FROM users WHERE id = :id";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['id' => $id]);
    //     $result = $stmt->fetch();
    //     return $result;
    // }

    // public function update($id, $fname, $lname, $email, $phone)
    // {
    //     $sql = "UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([
    //         'fname' => $fname,
    //         'lname' => $lname,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'id' => $id
    //     ]);
    //     return true;
    // }

    public function delete($id)
    {
        $sql = "DELETE FROM tbl_leaves WHERE leave_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        return true;
    }
}
