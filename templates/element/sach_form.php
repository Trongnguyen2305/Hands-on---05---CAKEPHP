<?= $this->Form->create($sach) ?>

<div class="form-grid">
    <?= $this->Form->control('ten_sach', [
        'label' => 'Tên sách',
        'maxlength' => 200,
        'required' => true,
    ]) ?>

    <?= $this->Form->control('tac_gia', [
        'label' => 'Tác giả',
        'maxlength' => 150,
        'required' => true,
    ]) ?>

    <?= $this->Form->control('gia', [
        'label' => 'Giá bán (đồng)',
        'type' => 'number',
        'min' => 0,
        'max' => 99999999.99,
        'step' => '0.01',
        'required' => true,
    ]) ?>

    <?= $this->Form->control('so_luong', [
        'label' => 'Số lượng',
        'type' => 'number',
        'min' => 0,
        'max' => 2147483647,
        'step' => 1,
        'required' => true,
    ]) ?>
</div>

<?= $this->Form->control('mo_ta', [
    'label' => 'Mô tả',
    'type' => 'textarea',
    'rows' => 5,
    'maxlength' => 5000,
    'required' => false,
]) ?>

<p class="intro">
    Tên sách, tác giả, giá và số lượng là thông tin bắt buộc.
</p>

<div class="form-actions">
    <?= $this->Form->button($buttonText) ?>

    <?= $this->Html->link(
        'Hủy',
        ['action' => 'index'],
        ['class' => 'button secondary']
    ) ?>
</div>

<?= $this->Form->end() ?>
