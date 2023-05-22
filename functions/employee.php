<?php

require_once '../classes/Employee.php';
require_once '../classes/Util.php';

$emp = new Employee();
$util = new Util();

if (isset($_POST['add'])) {
    $username = $util->testInput($_POST['username']);
    $password = md5($util->testInput($_POST['password']));
    $fname = $util->testInput($_POST['fname']);
    $lname = $util->testInput($_POST['lname']);
    $nname = $util->testInput($_POST['nname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);
    $department_id = $util->testInput($_POST['department_id']);
    $leave = $util->testInput($_POST['leave']);
    $sick = $util->testInput($_POST['sick']);
    $vacation = $util->testInput($_POST['vacation']);

    $quota = implode(",", [$leave, $sick, $vacation]);

    if ($emp->insert($fname, $lname, $nname, $email, $phone, $department_id, $quota, $username, $password)) {
        echo $util->showMessage("success", "User inserted successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong.");
    }
}

if (isset($_GET['read'])) {
    $users = $emp->read();
    $output = '';
    if ($users) {
        foreach ($users as $row) {
            $quota = explode(",", $row['quota']);
            $output .= "<tr>
            <td>" . $emp->leaveCount($row['employee_id']) . "</td>
            <td>" . $row['first_name'] . " " . $row['last_name'] . " (" . $row['nick_name'] . ") </td>
            <td>" . $row['department_name'] . "</td>
            <td>Leave " . $quota[0] . ", Sick " . $quota[1] . ", Vacation " . $quota[2] . "</td>
            <td>" . $row['status'] . "</td>
            <td>
                <a href='#' id='" . $row['employee_id'] . "' class='btn btn-success btn-sm rounded py-0 editlink' data-bs-toggle='modal' data-bs-target='#formEmployeeModal'>Edit</a>
                <a href='#' id='" . $row['employee_id'] . "' class='btn btn-danger btn-sm rounded py-0 disabledlink'>Disable</a>
            </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<tr>
            <td colspan='6'>No Users found in the Database</td>
        </tr>";
    }
}

if (isset($_GET['set'])) {
    $users = $emp->read();
    $output = '';
    if ($users) {
        foreach ($users as $row) {
            $output .= "<option value=" . $row['employee_id'] . ">" . $row['first_name'] . ' ' . $row['last_name'] . "</option>";
        }
        echo $output;
    } else {
        echo "<option>No Database</option>";
    }
}

if (isset($_GET['check'])) {
    $users = $emp->checkUsername($_GET['username']);
    if ($users) {
        echo "Username is Already. Try again!";
    }
}

if (isset($_GET['edit'])) {
    $id = $_GET['id'];
    $user = $emp->readOne($id);
    echo json_encode($user);
}

if (isset($_POST['update'])) {
    $id = $util->testInput($_POST['employee_id']);
    $fname = $util->testInput($_POST['fname']);
    $lname = $util->testInput($_POST['lname']);
    $nname = $util->testInput($_POST['nname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);
    $department_id = $util->testInput($_POST['department_id']);
    $leave = $util->testInput($_POST['leave']);
    $sick = $util->testInput($_POST['sick']);
    $vacation = $util->testInput($_POST['vacation']);
    $quota = implode(",", [$leave, $sick, $vacation]);

    if ($emp->update($id, $fname, $lname, $nname, $email, $phone, $department_id, $quota)) {
        echo $util->showMessage("success", "User updated successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong!");
    }
}

if (isset($_GET['desabled'])) {
    $id = $_GET['id'];
    if ($emp->disabled($id)) {
        echo $util->showMessage("success", "User Delete successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong!");
    }
}

// if (isset($_GET['delete'])) {
//     $id = $_GET['id'];
//     if ($emp->delete($id)) {
//         echo $util->showMessage("success", "User Delete successfully!");
//     } else {
//         echo $util->showMessage("danger", "Something went wrong!");
//     }
// }
