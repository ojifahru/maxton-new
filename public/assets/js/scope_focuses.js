$(document).ready(function () {
  var table = $("#scope-focus-table").DataTable({
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    // "responsive": true,
    buttons: [
      {
        extend: "copy",
        text: "Copy",
        exportOptions: { columns: ":not(:last-child)" },
      },
      {
        extend: "csv",
        text: "CSV",
        exportOptions: { columns: ":not(:last-child)" },
      },
      {
        extend: "excel",
        text: "Excel",
        exportOptions: { columns: ":not(:last-child)" },
      },
      {
        extend: "pdf",
        text: "PDF",
        exportOptions: { columns: ":not(:last-child)" },
      },
      {
        extend: "print",
        text: "Print",
        exportOptions: { columns: ":not(:last-child)" },
      },
    ],
    columnDefs: [{ targets: -1, orderable: false }],
  });

  // Menempatkan tombol export di posisi yang sesuai
  table
    .buttons()
    .container()
    .appendTo("#scope-focus-table_wrapper .col-md-6:eq(0)");
});

document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector("#addScopeFocusModal")
    .addEventListener("click", function (event) {
      if (event.target.classList.contains("add-focus-btn")) {
        const container = document.querySelector("#focuses-container");
        const newInputGroup = document.createElement("div");
        newInputGroup.classList.add("input-group", "mb-2", "form-group");
        newInputGroup.innerHTML = `
            <input type="text" class="form-control" name="focuses[]" placeholder="Enter focus" required>
            <button type="button" class="btn btn-outline-secondary remove-focus-btn">-</button>
        `;
        container.appendChild(newInputGroup);
      } else if (event.target.classList.contains("remove-focus-btn")) {
        event.target.closest(".input-group").remove();
      }
    });

  // Add new focus input in edit modal
  document
    .querySelector(".add-edit-focus-btn")
    .addEventListener("click", function () {
      const container = document.querySelector("#editFocusesContainer");
      const newInputGroup = document.createElement("div");
      newInputGroup.classList.add("input-group", "mb-2", "form-group");
      newInputGroup.innerHTML = `
            <input type="text" class="form-control" name="focuses[]" placeholder="Enter focus" required>
            <button type="button" class="btn btn-outline-secondary remove-focus-btn">-</button>
        `;
      container.appendChild(newInputGroup);
    });

  // Remove focus input in edit modal, ensuring at least one input remains
  document
    .querySelector("#editScopeFocusModal")
    .addEventListener("click", function (event) {
      if (event.target.classList.contains("remove-focus-btn")) {
        const container = document.querySelector("#editFocusesContainer");
        if (container.children.length > 1) {
          event.target.closest(".input-group").remove();
        } else {
          alert("At least one focus input is required");
        }
      }
    });

  // Populate edit modal with existing data
  document.querySelectorAll(".btn-outline-warning").forEach((button) => {
    button.addEventListener("click", function () {
      const scopeId = this.getAttribute("data-scope-id");
      const scopeName = this.getAttribute("data-scope-name");
      const focuses = JSON.parse(this.getAttribute("data-focuses"));

      document.querySelector("#editScopeId").value = scopeId;
      document.querySelector("#editScopeName").value = scopeName;

      const container = document.querySelector("#editFocusesContainer");
      container.innerHTML = "";
      focuses.forEach((focus) => {
        const newInputGroup = document.createElement("div");
        newInputGroup.classList.add("input-group", "mb-2");
        newInputGroup.innerHTML = `
                    <input type="text" class="form-control" name="focuses[]" value="${focus.name}" placeholder="Enter focus" required>
                    <button type="button" class="btn btn-outline-secondary remove-focus-btn">-</button>
                `;
        container.appendChild(newInputGroup);
      });

      // Set the action URL with the scope ID
      document.querySelector(
        "#editScopeFocusForm"
      ).action = `${base_url}admin/scope-focuses/update/${scopeId}`;
    });
  });

  // Set the action URL and scope ID for delete form
  document.querySelectorAll(".delete-scope-focus-btn").forEach((button) => {
    button.addEventListener("click", function () {
      const scopeId = this.getAttribute("data-scope-id");
      document.querySelector("#deleteScopeId").value = scopeId;
      document.querySelector(
        "#deleteScopeFocusForm"
      ).action = `${base_url}admin/scope-focuses/delete/${scopeId}`;
    });
  });
});
