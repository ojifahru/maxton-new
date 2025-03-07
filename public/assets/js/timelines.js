// Delete Timeline Modal
document.addEventListener("DOMContentLoaded", function () {
    const deleteTimelineModal = document.getElementById("deleteTimelineModal");
    const deleteTimelineForm = document.getElementById("deleteTimelineForm");
    const deleteTimelineIdInput = document.getElementById("deleteTimelineId");

    deleteTimelineModal.addEventListener("show.bs.modal", function(event) {
        const button = event.relatedTarget;
        const timelineId = button.getAttribute("data-timeline-id");
        const timelineTitle = button.getAttribute("data-timeline-title");

        deleteTimelineMessage.innerHTML = `Are you sure you want to delete <strong>${timelineTitle}</strong>?`;
        deleteTimelineForm.action = `${base_url}/admin/timelines/delete/${timelineId}`;
        deleteTimelineIdInput.value = timelineId;
    });
});


// Edit Timeline Modal
document.addEventListener("DOMContentLoaded", function() {
    var editTimelineModal = document.getElementById('editTimelineModal');
    
    editTimelineModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Tombol yang men-trigger modal
        var timelineId = button.getAttribute('data-timeline-id');
        var timelineTitle = button.getAttribute('data-timeline-title');
        var timelineDate = button.getAttribute('data-timeline-date');
        var timelineDescription = button.getAttribute('data-timeline-description');

        // Masukkan data ke dalam input form modal
        document.getElementById('edit-timeline-id').value = timelineId;
        document.getElementById('edit-timeline-title').value = timelineTitle;
        document.getElementById('edit-timeline-date').value = timelineDate;
        document.getElementById('edit-timeline-description').value = timelineDescription;

        
        // Set form action dynamically
        document.getElementById('editTimelineForm').action = base_url + "/admin/timelines/update/" + timelineId;
    });
});
