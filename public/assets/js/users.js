document.addEventListener("DOMContentLoaded", function () {
  // Restore User Modal
  const restoreUserModal = document.getElementById("restoreUserModal");
  const restoreUserForm = document.getElementById("restoreUserForm");
  const restoreUserMessage = document.getElementById("restoreUserMessage");
  const restoreUserIdInput = document.getElementById("restoreUserId");

  restoreUserModal.addEventListener("show.bs.modal", function (event) {
    const button = event.relatedTarget;
    const userId = button.getAttribute("data-user-id");
    const userName = button.getAttribute("data-user-name");

    restoreUserMessage.innerHTML = `Are you sure you want to restore <strong>${userName}</strong>?`;
    restoreUserForm.action = `${base_url}/admin/users/restore/${userId}`;
    restoreUserIdInput.value = userId;
  });
});

$(document).ready(function () {
  // Initialize DataTable
  var table = $("#userTable").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    dom: "Blfrtip", // Tambahkan 'l' agar length menu muncul
    buttons: [
      {
        extend: "copy",
        text: "Copy",
        exportOptions: {
          columns: ":not(:last-child)",
          format: { body: formatData },
        },
      },
      {
        extend: "csv",
        text: "CSV",
        exportOptions: {
          columns: ":not(:last-child)",
          format: { body: formatData },
        },
      },
      {
        extend: "excel",
        text: "Excel",
        exportOptions: {
          columns: ":not(:last-child)",
          format: { body: formatData },
        },
      },
      {
        extend: "pdf",
        text: "PDF",
        exportOptions: {
          columns: ":not(:last-child)",
          format: { body: formatData },
        },
      },
      {
        extend: "print",
        text: "Print",
        exportOptions: {
          columns: ":not(:last-child)",
          format: { body: formatData },
        },
      },
    ],
  });

  // Fungsi untuk membersihkan data sebelum diekspor
  function formatData(data, row, column, node) {
    // Ubah ikon status menjadi teks "Active" atau "Non-Active"
    if ($(node).find("i.material-icons-outlined").length) {
      var iconText = $(node).find("i").text().trim();
      return iconText === "check_circle" ? "Active" : "Non-Active";
    }
    // Hapus HTML dalam badge dan elemen lainnya, ambil teks saja
    return $(node).text().trim();
  }

  // Menempatkan tombol export di posisi yang sesuai
  table.buttons().container().appendTo("#userTable_wrapper .col-md-6:eq(0)");

  // Menempatkan tombol export di posisi yang sesuai
  table.buttons().container().appendTo("#userTable_wrapper .col-md-6:eq(0)");

  // Menempatkan tombol export di posisi yang sesuai
  table.buttons().container().appendTo("#userTable_wrapper .col-md-6:eq(0)");

  // Spinner for Edit User Button
  $(".edit-user-btn").on("click", function () {
    var userId = $(this).attr("id").split("-")[1];
    $("#icon-" + userId).addClass("d-none");
    $("#spinner-" + userId).removeClass("d-none");
  });

  // Deactivate User Modal
  $("#deactivateUserModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var userId = button.data("user-id");
    var userName = button.data("user-name");
    $("#deactivateUserMessage").html(
      `Are you sure you want to deactivate <strong>${userName}</strong>?`
    );
    $("#deactivateUserForm").attr(
      "action",
      `${base_url}/admin/users/deactivate/${userId}`
    );
    $("#deactivateUserId").val(userId);
  });

  // Activate User Modal
  $("#activateUserModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var userId = button.data("user-id");
    var userName = button.data("user-name");
    $("#activateUserMessage").html(
      `Are you sure you want to activate <strong>${userName}</strong>?`
    );
    $("#activateUserForm").attr(
      "action",
      `${base_url}/admin/users/activate/${userId}`
    );
    $("#activateUserId").val(userId);
  });

  // Deleted Users Modal
  $("#deletedUsersModal").on("show.bs.modal", function () {
    $.ajax({
      url: `${base_url}/admin/users/deleted`,
      method: "GET",
      success: function (response) {
        var tbody = $("#deletedUsersTable tbody");
        tbody.empty();
        response.forEach(function (user) {
          tbody.append(`
                        <tr>
                            <td>${user.id}</td>
                            <td>${user.fullname}</td>
                            <td>${user.username}</td>
                            <td>${user.email}</td>
                            <td>${user.group}</td>
                            <td>${user.deleted_at}</td>
                        </tr>
                    `);
        });
      },
    });
  });
});

// Delete User Modal
document.addEventListener("DOMContentLoaded", function () {
  const deleteUserModal = document.getElementById("deleteUserModal");
  const deleteUserForm = document.getElementById("deleteUserForm");
  const deleteUserIdInput = document.getElementById("deleteUserId");

  deleteUserModal.addEventListener("show.bs.modal", function (event) {
    const button = event.relatedTarget;
    const userId = button.getAttribute("data-user-id");
    const userName = button.getAttribute("data-user-name");

    deleteUserMessage.innerHTML = `Are you sure you want to delete <strong>${userName}</strong>?`;
    deleteUserForm.action = `${base_url}/admin/users/delete/${userId}`;
    deleteUserIdInput.value = userId;
  });
});

// Delete Permanent User Modal
document.addEventListener("DOMContentLoaded", function () {
  const deleteUserModal = document.getElementById("deletePermanentUserModal");
  const deleteUserForm = document.getElementById("deletePermanentUserForm");
  const deleteUserMessage = document.getElementById(
    "deletePermanentUserMessage"
  );
  const deleteUserIdInput = document.getElementById("deletePermanentUserId");

  deleteUserModal.addEventListener("show.bs.modal", function (event) {
    const button = event.relatedTarget;
    const userId = button.getAttribute("data-user-id");
    const userName = button.getAttribute("data-user-name");

    deleteUserMessage.innerHTML = `Are you sure you want to delete <strong>${userName}</strong> permanently?`;
    deleteUserForm.action = `${base_url}/admin/users/delete-permanent/${userId}`;
    deleteUserIdInput.value = userId;
  });
});

// Delete All Permanent Users Modal
document.addEventListener("DOMContentLoaded", function () {
  const deleteAllPermanentUsersModal = document.getElementById(
    "deleteAllPermanentUsersModal"
  );
  const deleteAllPermanentUsersForm = document.getElementById(
    "deleteAllPermanentUsersForm"
  );
  const deleteAllButton = document.querySelector(
    "[data-bs-target='#deleteAllPermanentUsersModal']"
  );

  deleteAllPermanentUsersModal.addEventListener("show.bs.modal", function () {
    const deleteUrl = deleteAllButton.getAttribute("data-url");
    deleteAllPermanentUsersForm.action = deleteUrl;
  });
});
