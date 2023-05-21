const empForm = document.getElementById("employee-form");
const showAlert = document.getElementById("showAlert");
const addBtn = document.getElementById("btnAddNewEmployee");
const formModal = new bootstrap.Modal(
  document.getElementById("formEmployeeModal")
);
const formSubmitBtn = document.getElementById("form-submit-btn");
const tbody = document.querySelector("tbody");
// const updateForm = document.getElementById("edit-user-form");
// const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
const selectDepartment = document.getElementById("department_id");

addEventListener("DOMContentLoaded", async () => {
  const data = await fetch("../functions/department.php?set=1", {
    method: "GET",
  });
  document.getElementById("modal-title").innerHTML = "Add New Employee";
  const response = await data.text();
  selectDepartment.innerHTML = response;
});

const fetchAllEmployees = async () => {
  const data = await fetch("../functions/employee.php?read=1", {
    method: "GET",
  });
  const response = await data.text();
  tbody.innerHTML = response;
};

fetchAllEmployees();

addBtn.addEventListener("click", () => {
  document.getElementById("form-submit-btn").value = "Add Employee";
});

empForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(empForm);
  formData.append("add", 1);

  if (empForm.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    empForm.classList.add("was-validated");
    return false;
  } else {
    const username = document.getElementById("username").value;
    const check = await fetch(
      `../functions/employee.php?check=1&username=${username}`,
      {
        method: "GET",
      }
    );
    const response = await check.text();

    if (!response) {
      formSubmitBtn.value = "Please Wait...";

      const data = await fetch("../functions/employee.php", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
      showAlert.innerHTML = response;
      formSubmitBtn.value = "Add Employee";
      empForm.reset();
      empForm.classList.remove("was-validated");
      formModal.hide();
      fetchAllEmployees();
    } else {
      alert(response);
    }
  }
});

tbody.addEventListener("click", (e) => {
  if (e.target && e.target.matches("a.editlink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    document.getElementById("user_password").classList.add("d-none");
    editEmployee(id);
  }
});

const editEmployee = async (id) => {
  const data = await fetch(`../functions/employee.php?edit=1&id=${id}`, {
    method: "GET",
  });
  const response = await data.json();
  const quota = response.quota.split(",");
  document.getElementById("employee_id").value = response.employee_id;
  document.getElementById("fname").value = response.first_name;
  document.getElementById("lname").value = response.last_name;
  document.getElementById("nname").value = response.nick_name;
  document.getElementById("email").value = response.email;
  document.getElementById("phone").value = response.phone;
  document.getElementById("department_id").value = response.department_id;
  document.getElementById("leave").value = quota[0];
  document.getElementById("sick").value = quota[1];
  document.getElementById("vacation").value = quota[2];
};

// updateForm.addEventListener("submit", async (e) => {
//   e.preventDefault();

//   const formData = new FormData(updateForm);
//   formData.append("update", 1);

//   if (updateForm.checkValidity() === false) {
//     e.preventDefault();
//     e.stopPropagation();
//     updateForm.classList.add("was-validated");
//     return false;
//   } else {
//     document.getElementById("edit-user-btn").value = "Please Wait...";

//     const data = await fetch("../functions/employee.php", {
//       method: "POST",
//       body: formData,
//     });
//     const response = await data.text();
//     showAlert.innerHTML = response;
//     document.getElementById("edit-user-btn").value = "Edit User";
//     updateForm.reset();
//     updateForm.classList.remove("was-validated");
//     editModal.hide();
//     fetchAllUsers();
//   }
// });

// tbody.addEventListener("click", (e) => {
//   if (e.target && e.target.matches("a.deletelink")) {
//     e.preventDefault();
//     let id = e.target.getAttribute("id");
//     deleteUser(id);
//   }
// });

// const deleteUser = async (id) => {
//   const data = await fetch(`../functions/employee.php?delete=1&id=${id}`, {
//     method: "GET",
//   });
//   const response = await data.text();
//   showAlert.innerHTML = response;
//   fetchAllUsers();
// };

document.getElementById("formEmployeeModal").addEventListener('hidden.bs.modal', () => {
  if(document.getElementById("user_password").querySelectorAll("d-none")){
    document.getElementById("user_password").classList.remove("d-none")
  }
})