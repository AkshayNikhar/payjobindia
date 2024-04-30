<div class="col-12 mt-3 d-none">
	<?php if (session()->getFlashdata('success')) : ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?= session()->getFlashdata('success') ?>
		</div>
	<?php endif; ?>
	<?php if (session()->getFlashdata('error')) : ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= session()->getFlashdata('error') ?>
		</div>
	<?php endif; ?>
</div>

<div class="col-lg-12  mb-3">
 <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
</div>   