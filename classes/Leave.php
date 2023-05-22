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
            leave_status
        )
        VALUES(
            :request,
            :start_date,
            :end_date,
            :count,
            :unit,
            :employee_id,
            :note,
            :status
        )";

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
        $sql = "SELECT
            *
        FROM
            tbl_leaves l
        INNER JOIN tbl_employees e ON
            l.employee_id = e.employee_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function readOne($id)
    {
        $sql = "SELECT
            *
        FROM
            tbl_leaves l
        INNER JOIN tbl_employees e ON
            l.employee_id = e.employee_id
        WHERE
            l.leave_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function update($id, $request, $start_date, $end_date, $count, $unit, $note)
    {
        $sql = "UPDATE tbl_leaves SET request = :request, start_date = :start_date, end_date = :end_date, count = :count, unit = :unit, note = :note WHERE leave_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'request' => $request,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'count' => $count,
            'unit' => $unit,
            'note' => $note,
            'id' => $id
        ]);
        return true;
    }

    public function delete($id)
    {
        $sql = "DELETE
        FROM
            tbl_leaves
        WHERE
            leave_id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        return true;
    }
}
