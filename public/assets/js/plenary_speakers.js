$(document).ready(function () {
        // Delete Plenary Speaker Modal
    $('.delete-plenary-speaker-btn').on('click', function() {
            var plenarySpeakerId = $(this).data('id');
            var plenarySpeakerName = $(this).data('name');
            $('#deletePlenarySpeakerForm').attr('action', `${base_url}/admin/plenary_speakers/delete/${plenarySpeakerId}`);
            $('#deletePlenarySpeakerModal .modal-body p').html(`Are you sure you want to delete <strong>${plenarySpeakerName}</strong>?`);
        });
});

// Edit Plenary Speaker Modal
document.addEventListener("DOMContentLoaded", function() {
    var editPlenarySpeakerModal = document.getElementById('editPlenarySpeakerModal');
    
    editPlenarySpeakerModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Tombol yang men-trigger modal
        var plenarySpeakerId = button.getAttribute('data-plenary-speaker-id');
        var plenarySpeakerName = button.getAttribute('data-plenary-speaker-name');
        var plenarySpeakerDescription = button.getAttribute('data-plenary-speaker-description');
        var plenarySpeakerImage = button.getAttribute('data-plenary-speaker-image');

        // Masukkan data ke dalam input form modal
        document.getElementById('edit-plenary-speaker-id').value = plenarySpeakerId;
        document.getElementById('edit-plenary-speaker-name').value = plenarySpeakerName;
        document.getElementById('edit-plenary-speaker-description').value = plenarySpeakerDescription;

        // Set preview image
        var imagePreview = document.getElementById('edit-plenary-speaker-preview');
        if (plenarySpeakerImage) {
            imagePreview.src = base_url + "/uploads/plenary_speakers/" + plenarySpeakerImage;
            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
        }

        // Set form action dynamically
        document.getElementById('editPlenarySpeakerForm').action = base_url + "/admin/plenary_speakers/update/" + plenarySpeakerId;
    });
});
