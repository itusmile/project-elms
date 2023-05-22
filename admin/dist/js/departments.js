const addBtn = document.getElementById("btnAddNewDepartment");

const table = document.getElementById("table-department");
const tbody = table.getElementsByTagName("tbody")[0];

const form = document.getElementById("department-form");
const hiddenId = form.getElementsByClassName("hidden-id")[0];
const btnSubmitForm = document.getElementById("form-submit-btn");

// const viewModalId = document.getElementById("viewDepartmentModal");
// const viewModal = new bootstrap.Modal(viewModalId);
// const viewModalTitle = viewModalId.getElementsByClassName("modal-title")[0];
// const viewModalBody = viewModalId.getElementsByClassName("modal-body")[0];

const formModalId = document.getElementById("formDepartmentModal");
const formModal = new bootstrap.Modal(formModalId);
const formModalTitle = formModalId.getElementsByClassName("modal-title")[0];

// const selectDepartment = document.getElementById("department_id");

const depName = document.getElementById("department_name");
const sortName = document.getElementById("sort_name");

const showAlert = document.getElementById("showAlert");

const fetchAllDepartments = async () => {
  const data = await fetch("../functions/department.php?read=1", {
    method: "GET",
  });
  const response = await data.text();
  tbody.innerHTML = response;
};

fetchAllDepartments();

addBtn.addEventListener("click", async () => {
  formModalTitle.innerHTML = "Add New Department";
  btnSubmitForm.value = "Add";
});

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(form);

  if (hiddenId.value == "") {
    formData.append("add", 1);
  } else {
    formData.append("update", 1);
  }

  if (form.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    form.classList.add("was-validated");
    return false;
  } else {
    btnSubmitForm.value = "Please Wait...";

    const data = await fetch("../functions/department.php", {
      method: "POST",
      body: formData,
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    form.reset();
    form.classList.remove("was-validated");
    formModal.hide();
    fetchAllDepartments();
  }
});

tbody.addEventListener("click", (e) => {
  if (e.target && e.target.matches("a.editlink")) {
    e.preventDefault();
    editDepartment(e.target.getAttribute("id"));
  }
  if (e.target && e.target.matches("a.deletelink")) {
    e.preventDefault();
    deleteDepartment(e.target.getAttribute("id"));
  }
});

const editDepartment = async (id) => {
  const data = await fetch(`../functions/department.php?edit=1&id=${id}`, {
    method: "GET",
  });
  const response = await data.json();
  formModalTitle.innerHTML = "Edit Department";
  hiddenId.value = response.department_id;
  depName.value = response.department_name;
  sortName.value = response.dep_name;
  btnSubmitForm.value = "Update";
};

const deleteDepartment = async (id) => {
  const dep = await fetch(`../functions/department.php?edit=1&id=${id}`, {
    method: "GET",
  });
  const response = await dep.json();
  if (confirm("Delete all employee and leave request with user on " + response.department_name)) {
    const data = await fetch(`../functions/department.php?delete=1&id=${id}`, {
      method: "GET",
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    fetchAllDepartments();
  }
};

formModalId.addEventListener("hidden.bs.modal", () => {
  formModalTitle.innerHTML = "";
  form.reset();
  btnSubmitForm.value = "";
});
