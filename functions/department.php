<?php

require_once '../classes/Department.php';
require_once '../classes/Employee.php';
require_once '../classes/Leave.php';
require_once '../classes/Util.php';

$dep = new Department();
$emp = new Employee();
$req = new Leave();
$util = new Util();

if (isset($_POST['add'])) {
    $full_name = $util->testInput($_POST['department_name']);
    $sort_name = $util->testInput($_POST['sort_name']);

    if ($dep->insert($full_name, $sort_name)) {
        echo $util->showMessage("success", "Department inserted successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong.");
    }
}

if (isset($_GET['read'])) {
    $deps = $dep->read();
    $output = '';
    if ($deps) {
        foreach ($deps as $row) {
            if ($row['department_id'] > 0) {
                $output .= "<tr>
                <td>" . $dep->memberCount($row['department_id']) . "</td>
                <td>" . $row['department_name'] . "</td>
                <td>" . $row['dep_name'] . "</td>
                <td>
                    <a href='#' id='" . $row['department_id'] . "' class='btn btn-success btn-sm rounded py-0 editlink' data-bs-toggle='modal' data-bs-target='#formDepartmentModal'>Edit</a>
                    <a href='#' id='" . $row['department_id'] . "' class='btn btn-danger btn-sm rounded py-0 deletelink'>Delete</a>
                </td>
                </tr>";
            }
        }
        echo $output;
    } else {
        echo "<tr>
            <td colspan='6'>No Department found in the Database</td>
        </tr>";
    }
}

if (isset($_GET['set'])) {
    $deps = $dep->read();
    $output = '';
    if ($deps) {
        foreach ($deps as $row) {
            if ($row['department_id'] > 0) {
                $output .= "<option value=" . $row['department_id'] . ">" . $row['department_name'] . "</option>";
            }
        }
        echo $output;
    } else {
        echo "<tr>
            <td colspan='6'>No Database</td>
        </tr>";
    }
}


if (isset($_GET['edit'])) {
    $id = $_GET['id'];
    $deps = $dep->readOne($id);
    echo json_encode($deps);
}

if (isset($_POST['update'])) {
    $department_id = $util->testInput($_POST['department_id']);
    $department_name = $util->testInput($_POST['department_name']);
    $sort_name = $util->testInput($_POST['sort_name']);

    if ($dep->update($department_id, $department_name, $sort_name)) {
        echo $util->showMessage("success", "Department updated successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong!");
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $result_emp = $dep->readByForeignKey($id);
    foreach ($result_emp as $row) {
        $emp->nullDep($row['employee_id']);
    }

    if ($dep->delete($id)) {
        echo $util->showMessage("success", "Department Delete successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong!");
    }
}
