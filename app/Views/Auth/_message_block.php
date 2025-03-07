<?php if (session()->has('message')) : ?>
	<div class="alert alert-success border-0 bg-grd-success alert-dismissible fade show">
		<div class="d-flex align-items-center">
			<div class="font-20 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
			</div>
			<div class="ms-3">
				<div class="text-white"><?= session('message') ?></div>
			</div>
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
	<div class="alert alert-danger border-0 bg-grd-danger alert-dismissible fade show">
		<div class="d-flex align-items-center">
			<div class="font-20 text-white"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
			</div>
			<div class="ms-3">
				<div class="text-white"><?= session('error') ?></div>
			</div>
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<ul class="alert alert-danger">
		<?php foreach (session('errors') as $error) : ?>
			<li><?= $error ?></li>
		<?php endforeach ?>
	</ul>
<?php endif ?>