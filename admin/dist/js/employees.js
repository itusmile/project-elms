const addBtn = document.getElementById("btnAddNewEmployee");

const table = document.getElementById("table-employee");
const tbody = table.getElementsByTagName("tbody")[0];

const formId = document.getElementById("employee-form");
const hiddenId = formId.getElementsByClassName("hidden-id")[0];
const btnSubmitForm = document.getElementById("form-submit-btn");

const formModalId = document.getElementById("formEmployeeModal");
const formModal = new bootstrap.Modal(formModalId);
const formModalTitle = formModalId.getElementsByClassName("modal-title")[0];

const selectDepartment = document.getElementById("department_id");

const showAlert = document.getElementById("showAlert");

addEventListener("DOMContentLoaded", async () => {
  const data = await fetch("../functions/department.php?set=1", {
    method: "GET",
  });
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
  formModalTitle.innerHTML = "Add New Employee";
  document.getElementById("form-submit-btn").value = "Add Employee";
});

formId.addEventListener("submit", async (e) => {
  e.preventDefault();
  let action = null;

  const formData = new FormData(formId);
  if (hiddenId.value == "") {
    formData.append("add", 1);
    action = "add";
  } else {
    formData.append("update", 1);
  }

  if (formId.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    formId.classList.add("was-validated");
    return false;
  } else {
    if ((action = "add")) {
      const username = document.getElementById("username").value;
      const check = await fetch(
        `../functions/employee.php?check=1&username=${username}`,
        {
          method: "GET",
        }
      );
      const response = await check.text();

      if (!response) {
        formSubmit(formData);
      } else {
        alert(response);
      }
    } else {
      formSubmit(formData);
    }
  }
});

tbody.addEventListener("click", (e) => {
  if (e.target && e.target.matches("a.editlink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    if ((document.getElementById("username").required = true)) {
      document.getElementById("username").required = false;
      document.getElementById("password").required = false;
    }
    document.getElementById("user_password").classList.add("d-none");
    editEmployee(id);
  }

  if (e.target && e.target.matches("a.disabledlink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    disabledEmployee(id);
  }
});

const editEmployee = async (id) => {
  const data = await fetch(`../functions/employee.php?edit=1&id=${id}`, {
    method: "GET",
  });
  const response = await data.json();
  const quota = response.quota.split(",");
  hiddenId.value = response.employee_id;
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

// tbody.addEventListener("click", (e) => {
//   if (e.target && e.target.matches("a.deletelink")) {
//     e.preventDefault();
//     let id = e.target.getAttribute("id");
//     deleteUser(id);
//   }
// });

const disabledEmployee = async (id) => {
  const data = await fetch(`../functions/employee.php?desabled=1&id=${id}`, {
    method: "GET",
  });
  const response = await data.text();
  showAlert.innerHTML = response;
  fetchAllEmployees();
};

formModalId.addEventListener("hidden.bs.modal", () => {
  if (document.getElementById("user_password").querySelectorAll("d-none")) {
    document.getElementById("user_password").classList.remove("d-none");
  }
  formId.reset();
  if (document.getElementById("username").required == false) {
    document.getElementById("username").required = true;
    document.getElementById("password").required = true;
  }
});

const formSubmit = async ($formData) => {
  btnSubmitForm.value = "Please Wait...";

  const data = await fetch("../functions/employee.php", {
    method: "POST",
    body: $formData,
  });
  const response = await data.text();
  showAlert.innerHTML = response;
  formId.reset();
  formId.classList.remove("was-validated");
  formModal.hide();
  fetchAllEmployees();
};
