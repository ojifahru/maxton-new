$(document).ready(function() {
    $('#documentTable').DataTable({});

    $('#documentTable').on('click', '.edit-document-btn', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const file = $(this).data('file');

        $('#editDocumentId').val(id);
        $('#editDocumentName').val(name);
        $('#editDocumentForm').attr('action', `${base_url}admin/documents/update/${id}`);
    });

    $('#documentTable').on('click', '.delete-document-btn', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');

        $('#deleteDocumentId').val(id);
        $('#deleteDocumentModal .modal-body p').text(`Are you sure you want to delete ${name}?`);
        $('#deleteDocumentForm').attr('action', `${base_url}admin/documents/delete/${id}`);
    });
});