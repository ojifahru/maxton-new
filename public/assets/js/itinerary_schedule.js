$(document).ready(function () {
  $("#itineraryScheduleTable").DataTable({});

  $("#itineraryScheduleTable").on(
    "click",
    ".edit-itinerary-schedule-btn",
    function () {
      const id = $(this).data("id");
      const title = $(this).data("title");

      $("#editItineraryScheduleId").val(id);
      $("#editItineraryScheduleTitle").val(title);
      $("#editItineraryScheduleForm").attr(
        "action",
        `${base_url}admin/itinerary-schedule/update/${id}`
      );
    }
  );

  $("#itineraryScheduleTable").on(
    "click",
    ".delete-itinerary-schedule-btn",
    function () {
      const id = $(this).data("id");
      const title = $(this).data("title");

      $("#deleteItineraryScheduleId").val(id);
      $("#deleteItineraryScheduleModal .modal-body p").text(
        `Are you sure you want to delete ${title}?`
      );
      $("#deleteItineraryScheduleForm").attr(
        "action",
        `${base_url}admin/itinerary-schedule/delete/${id}`
      );
    }
  );
});
