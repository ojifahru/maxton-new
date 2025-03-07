$(document).ready(function () {
  var table = $("#topics-table").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    // responsive: true,
  });
});

// Delete Topic Modal
document.addEventListener("DOMContentLoaded", function () {
  const deleteTopicModal = document.getElementById("deleteTopicModal");
  const deleteTopicForm = document.getElementById("deleteTopicForm");
  const deleteTopicIdInput = document.getElementById("deleteTopicId");

  deleteTopicModal.addEventListener("show.bs.modal", function (event) {
    const button = event.relatedTarget;
    const topicId = button.getAttribute("data-topic-id");
    const topicTitle = button.getAttribute("data-topic-title");

    deleteTopicMessage.innerHTML = `Are you sure you want to delete <strong>${topicTitle}</strong>?`;
    deleteTopicForm.action = `${base_url}/admin/topics/delete/${topicId}`;
    deleteTopicIdInput.value = topicId;
  });
});

// Edit Topic Modal
document.addEventListener("DOMContentLoaded", function () {
  var editTopicModal = document.getElementById("editTopicModal");

  editTopicModal.addEventListener("show.bs.modal", function (event) {
    var button = event.relatedTarget; // Tombol yang men-trigger modal
    var topicId = button.getAttribute("data-topic-id");
    var topicTitle = button.getAttribute("data-topic-title");
    var topicDescription = button.getAttribute("data-topic-description");

    // Masukkan data ke dalam input form modal
    document.getElementById("edit-topic-id").value = topicId;
    document.getElementById("edit-topic-title").value = topicTitle;
    document.getElementById("edit-topic-description").value = topicDescription;

    // Set form action dynamically
    document.getElementById("editTopicForm").action =
      base_url + "/admin/topics/update/" + topicId;
  });
});
