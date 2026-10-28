<?php $this->assign('title', 'Sửa sách'); ?>

<div class="page-head">
    <h1>Sửa sách #<?= (int)$sach->id ?></h1>
</div>

<section class="card form-card">
    <?= $this->element('sach_form', [
        'sach' => $sach,
        'buttonText' => 'Lưu thay đổi',
    ]) ?>
</section>
