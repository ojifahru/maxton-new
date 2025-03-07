<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Manage Submission Template</h4>
        <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addSubmissionTemplateModal">
            <span class="material-icons-outlined">add</span>Add Document
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="SubmissionTemplateTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>title</th>
                        <th>Document</th>
                        <th class="no-export">Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach ($templates as $key => $templates) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= esc($templates['title']) ?></td>
                            <td>
                                <a href="<?= base_url('uploads/documents/' . esc($templates['document'])) ?>" target="_blank">
                                    <?= esc($templates['document']) ?>
                                </a>
                            </td>
                            <td class="text-center d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-outline-primary d-flex align-items-center edit-submission-template-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editSubmissionTemplateModal"
                                    data-id="<?= esc($templates['id']) ?>"
                                    data-title="<?= esc($templates['title']) ?>"
                                    data-file="<?= esc($templates['document']) ?>">
                                    <span class="material-icons-outlined">edit</span>
                                </button>

                                <button type="button" class="btn btn-outline-danger d-flex delete-submission-template-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteSubmissionTemplateModal"
                                    data-id="<?= esc($templates['id']) ?>"
                                    data-title="<?= esc($templates['title']) ?>">
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

<?= $this->include('admin/submission_template/add_submission_template_modal') ?>
<?= $this->include('admin/submission_template/edit_submission_template_modal') ?>
<?= $this->include('admin/submission_template/delete_submission_template_modal') ?>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script src="<?= base_url('assets/js/submission_template.js') ?>"></script>

<?= $this->endSection() ?>