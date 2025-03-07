$(document).ready(function () {
  $("#SubmissionTemplateTable").DataTable({});

  $("#SubmissionTemplateTable").on(
    "click",
    ".edit-submission-template-btn",
    function () {
      const id = $(this).data("id");
      const title = $(this).data("title");

      $("#editSubmissionTemplateId").val(id);
      $("#editSubmissionTemplateTitle").val(title);
      $("#editSubmissionTemplateForm").attr(
        "action",
        `${base_url}admin/submission-template/update/${id}`
      );
    }
  );

  $("#SubmissionTemplateTable").on(
    "click",
    ".delete-submission-template-btn",
    function () {
      const id = $(this).data("id");
      const title = $(this).data("title");

      $("#deleteSubmissionTemplateId").val(id);
      $("#deleteSubmissionTemplateModal .modal-body p").text(
        `Are you sure you want to delete ${title}?`
      );
      $("#deleteSubmissionTemplateForm").attr(
        "action",
        `${base_url}admin/submission-template/delete/${id}`
      );
    }
  );
});
