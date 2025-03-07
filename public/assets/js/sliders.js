// Delete Slider Modal
document.addEventListener("DOMContentLoaded", function () {
    const deleteSliderModal = document.getElementById("deleteSliderModal");
    const deleteSliderForm = document.getElementById("deleteSliderForm");
    const deleteSliderIdInput = document.getElementById("deleteSliderId");

    deleteSliderModal.addEventListener("show.bs.modal", function(event) {
        const button = event.relatedTarget;
        const sliderId = button.getAttribute("data-slider-id");
        const sliderTitle = button.getAttribute("data-slider-title");

        deleteSliderMessage.innerHTML = `Are you sure you want to delete <strong>${sliderTitle}</strong>?`;
        deleteSliderForm.action = `${base_url}/admin/sliders/delete/${sliderId}`;
        deleteSliderIdInput.value = sliderId;
    });
});


// Edit Slider Modal
document.addEventListener("DOMContentLoaded", function() {
    var editSliderModal = document.getElementById('editSliderModal');
    
    editSliderModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Tombol yang men-trigger modal
        var sliderId = button.getAttribute('data-slider-id');
        var sliderTitle = button.getAttribute('data-slider-title');
        var sliderDescription = button.getAttribute('data-slider-description');
        var sliderImage = button.getAttribute('data-slider-image');

        // Masukkan data ke dalam input form modal
        document.getElementById('edit-slider-id').value = sliderId;
        document.getElementById('edit-slider-title').value = sliderTitle;
        document.getElementById('edit-slider-description').value = sliderDescription;

        // Set preview image
        var imagePreview = document.getElementById('edit-slider-preview');
        if (sliderImage) {
            imagePreview.src = base_url + "/uploads/sliders/" + sliderImage;
            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
        }

        // Set form action dynamically
        document.getElementById('editSliderForm').action = base_url + "/admin/sliders/update/" + sliderId;
    });
});
