$(document).ready(function () {
  // DataTable
  $("#invitedSpeakersTable").DataTable({});
  // Delete Invited Speaker Modal
  $(".delete-invited-speaker-btn").on("click", function () {
    var invitedSpeakerId = $(this).data("id");
    var invitedSpeakerName = $(this).data("name");
    $("#deleteInvitedSpeakerForm").attr(
      "action",
      `${base_url}/admin/invited_speakers/delete/${invitedSpeakerId}`
    );
    $("#deleteInvitedSpeakerModal .modal-body p").html(
      `Are you sure you want to delete <strong>${invitedSpeakerName}</strong>?`
    );
  });
});

// Edit Invited Speaker Modal
document.addEventListener("DOMContentLoaded", function () {
  var editInvitedSpeakerModal = document.getElementById(
    "editInvitedSpeakerModal"
  );

  editInvitedSpeakerModal.addEventListener("show.bs.modal", function (event) {
    var button = event.relatedTarget; // Tombol yang men-trigger modal
    var invitedSpeakerId = button.getAttribute("data-invited-speaker-id");
    var invitedSpeakerName = button.getAttribute("data-invited-speaker-name");
    var invitedSpeakerDescription = button.getAttribute(
      "data-invited-speaker-description"
    );
    var invitedSpeakerImage = button.getAttribute("data-invited-speaker-image");

    // Masukkan data ke dalam input form modal
    document.getElementById("edit-invited-speaker-id").value = invitedSpeakerId;
    document.getElementById("edit-invited-speaker-name").value =
      invitedSpeakerName;
    document.getElementById("edit-invited-speaker-description").value =
      invitedSpeakerDescription;

    // Set preview image
    var imagePreview = document.getElementById("edit-invited-speaker-preview");
    if (invitedSpeakerImage) {
      imagePreview.src =
        base_url + "/uploads/invited_speakers/" + invitedSpeakerImage;
      imagePreview.style.display = "block";
    } else {
      imagePreview.style.display = "none";
    }

    // Set form action dynamically
    document.getElementById("editInvitedSpeakerForm").action =
      base_url + "/admin/invited_speakers/update/" + invitedSpeakerId;
  });
});
