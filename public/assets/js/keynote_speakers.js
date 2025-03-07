$(document).ready(function () {

    // Delete Keynote Speaker Modal
    $('.delete-keynote-speaker-btn').on('click', function() {
            var keynoteSpeakerId = $(this).data('id');
            var keynoteSpeakerName = $(this).data('name');
            $('#deleteKeynoteSpeakerForm').attr('action', `${base_url}/admin/keynote_speakers/delete/${keynoteSpeakerId}`);
            $('#deleteKeynoteSpeakerModal .modal-body p').html(`Are you sure you want to delete <strong>${keynoteSpeakerName}</strong>?`);
        });
});

// Edit Keynote Speaker Modal
document.addEventListener("DOMContentLoaded", function() {
    var editKeynoteSpeakerModal = document.getElementById('editKeynoteSpeakerModal');
    
    editKeynoteSpeakerModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Tombol yang men-trigger modal
        var keynoteSpeakerId = button.getAttribute('data-keynote-speaker-id');
        var keynoteSpeakerName = button.getAttribute('data-keynote-speaker-name');
        var keynoteSpeakerDescription = button.getAttribute('data-keynote-speaker-description');
        var keynoteSpeakerImage = button.getAttribute('data-keynote-speaker-image');

        // Masukkan data ke dalam input form modal
        document.getElementById('edit-keynote-speaker-id').value = keynoteSpeakerId;
        document.getElementById('edit-keynote-speaker-name').value = keynoteSpeakerName;
        document.getElementById('edit-keynote-speaker-description').value = keynoteSpeakerDescription;

        // Set preview image
        var imagePreview = document.getElementById('edit-keynote-speaker-preview');
        if (keynoteSpeakerImage) {
            imagePreview.src = base_url + "/uploads/keynote_speakers/" + keynoteSpeakerImage;
            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
        }

        // Set form action dynamically
        document.getElementById('editKeynoteSpeakerForm').action = base_url + "/admin/keynote_speakers/update/" + keynoteSpeakerId;
    });
});
