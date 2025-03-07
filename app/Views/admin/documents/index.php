<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Manage Documents</h4>
        <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addDocumentModal">
            <span class="material-icons-outlined">add</span>Add Document
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="documentTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Document Name</th>
                        <th>Document File</th>
                        <th class="no-export">Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach ($documents as $key => $document) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= esc($document['document_name']) ?></td>
                            <td>
                                <a href="<?= base_url('uploads/documents/' . esc($document['document_file'])) ?>" target="_blank">
                                    <?= esc($document['document_file']) ?>
                                </a>
                            </td>
                            <td class="text-center d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-outline-primary d-flex align-items-center edit-document-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editDocumentModal"
                                    data-id="<?= esc($document['id']) ?>"
                                    data-name="<?= esc($document['document_name']) ?>"
                                    data-file="<?= esc($document['document_file']) ?>">
                                    <span class="material-icons-outlined">edit</span>
                                </button>

                                <button type="button" class="btn btn-outline-danger d-flex delete-document-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteDocumentModal"
                                    data-id="<?= esc($document['id']) ?>"
                                    data-name="<?= esc($document['document_name']) ?>">
                                    <span class="material-icons-outlined">delete</span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('admin/documents/add_document_modal') ?>
<?= $this->include('admin/documents/edit_document_modal') ?>
<?= $this->include('admin/documents/delete_document_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/documents.js') ?>"></script>

<?= $this->endSection() ?>