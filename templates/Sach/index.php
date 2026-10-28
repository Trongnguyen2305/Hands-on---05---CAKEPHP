<?php $this->assign('title', 'Danh sách sách'); ?>

<div class="page-head">
    <h1>Danh sách sách</h1>

    <?php if ($isAdmin): ?>
    <?= $this->Html->link(
        '+ Thêm sách',
        ['action' => 'add'],
        ['class' => 'button']
    ) ?>
<?php endif; ?>
</div>

<p class="intro">
    Quản lý thông tin, giá bán và số lượng sách.
</p>

<section class="card">
    <form
        method="get"
        action="<?= $this->Url->build(['action' => 'index']) ?>"
    >
        <label for="q">Tìm theo tên sách hoặc tác giả</label>

        <div class="search-row">
            <input
                id="q"
                name="q"
                type="text"
                maxlength="200"
                value="<?= h($q) ?>"
                placeholder="Nhập tên sách hoặc tác giả..."
            >

            <button type="submit">Tìm kiếm</button>

            <?= $this->Html->link(
                'Xem tất cả',
                ['action' => 'index'],
                ['class' => 'button secondary']
            ) ?>
        </div>
    </form>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên sách</th>
                    <th>Tác giả</th>
                    <th class="number">Giá bán</th>
                    <th class="number">Số lượng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($sachList as $sach): ?>
                    <tr>
                        <td><?= (int)$sach->id ?></td>

                        <td><?= h($sach->ten_sach) ?></td>

                        <td><?= h($sach->tac_gia) ?></td>

                        <td class="number">
                            <?= number_format(
                                (float)$sach->gia,
                                2,
                                ',',
                                '.'
                            ) ?> đ
                        </td>

                        <td class="number">
                            <?= (int)$sach->so_luong ?>
                        </td>

                        <td>
                            <div class="actions">
    <?= $this->Html->link(
        'Xem',
        ['action' => 'view', $sach->id]
    ) ?>

    <?php if ($isAdmin): ?>
        <?= $this->Html->link(
            'Sửa',
            ['action' => 'edit', $sach->id]
        ) ?>

        <?= $this->Form->postLink(
            'Xóa',
            ['action' => 'delete', $sach->id],
            [
                'confirm' => 'Bạn có chắc muốn xóa sách này?',
                'class' => 'danger',
            ]
        ) ?>
    <?php endif; ?>
</div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if ($sachList->count() === 0): ?>
                    <tr>
                        <td colspan="6" class="empty">
                            Không có sách phù hợp.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if ($sachList->count() > 0): ?>
        <div class="pagination">
            <span>
                <?= $this->Paginator->counter(
                    'Trang {{page}} / {{pages}} — Tổng {{count}} sách'
                ) ?>
            </span>

            <ul>
                <?= $this->Paginator->prev('‹ Trước') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('Sau ›') ?>
            </ul>
        </div>
    <?php endif; ?>
</section>
