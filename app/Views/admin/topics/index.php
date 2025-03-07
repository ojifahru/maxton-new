<?= $this->extend('admin/template/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Topics</h4>
                    <button type="button" class="btn btn-grd btn-grd-info px-2 d-flex gap-2" data-bs-toggle="modal" data-bs-target="#addTopicModal">
                        <span class="material-icons-outlined">add_box</span>Add Topic
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="topics-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($topics as $index =>  $topic) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $topic['title'] ?></td>
                                        <td><?= $topic['description'] ?></td>
                                        <td class="d-flex center gap-2">
                                            <button type="button" class="btn btn-outline-warning d-flex align-items-center"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editTopicModal"
                                                data-topic-id="<?= esc($topic['id']) ?>"
                                                data-topic-title="<?= esc($topic['title']) ?>"
                                                data-topic-description="<?= esc($topic['description']) ?>"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Edit Topic">
                                                <i class="material-icons-outlined">edit</i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger d-flex delete-topic-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteTopicModal"
                                                data-topic-id="<?= esc($topic['id']) ?>"
                                                data-topic-title="<?= esc($topic['title']) ?>"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Delete Topic">
                                                <i class="material-icons-outlined">delete</i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/topics/add_topic_modal') ?>
<?= $this->include('admin/topics/edit_topic_modal') ?>
<?= $this->include('admin/topics/delete_topic_modal') ?>


<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('assets/js/topics.js') ?>"></script>
<?= $this->endSection() ?>