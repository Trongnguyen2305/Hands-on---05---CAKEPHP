<?php $this->assign('title', 'Thêm sách'); ?>

<div class="page-head">
    <h1>Thêm sách mới</h1>
</div>

<section class="card form-card">
    <?= $this->element('sach_form', [
        'sach' => $sach,
        'buttonText' => 'Lưu sách',
    ]) ?>
</section>
