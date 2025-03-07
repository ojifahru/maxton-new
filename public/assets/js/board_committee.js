$(document).ready(function() {
    $('#boardCommitteeTable').DataTable({});

    $('#boardCommitteeTable').on('click', '.edit-board-committee-btn', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const institution = $(this).data('institution');

        $('#editBoardCommitteeId').val(id);
        $('#editName').val(name);
        $('#editInstitution').val(institution);
        $('#editBoardCommitteeForm').attr('action', `${base_url}admin/board-committee/update/${id}`);
    });

    $('#boardCommitteeTable').on('click', '.delete-board-committee-btn', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');

        $('#deleteBoardCommitteeId').val(id);
        $('#deleteBoardCommitteeModal .modal-body p').text(`Are you sure you want to delete ${name}?`);
        $('#deleteBoardCommitteeForm').attr('action', `${base_url}admin/board-committee/delete/${id}`);
    });
});