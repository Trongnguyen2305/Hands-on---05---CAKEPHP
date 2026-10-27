<?php
$currentAction = $this->getRequest()->getParam('action');
$pageTitle = $this->fetch('title') ?: 'Quản lý sách';

$listUrl = $this->Url->build([
    'controller' => 'Sach',
    'action' => 'index',
]);

$addUrl = $this->Url->build([
    'controller' => 'Sach',
    'action' => 'add',
]);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <?= $this->Html->charset() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= h($pageTitle) ?> | BookSpace</title>

    <style>
        :root {
            --blue: #3766e8;
            --ink: #1d2b43;
            --muted: #64748b;
            --line: #e8edf5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: var(--ink);
            background: #f3f5fa;
            font: 14px/1.6 "Segoe UI", Arial, sans-serif;
        }

        a {
            color: var(--blue);
            text-decoration: none;
        }

        button, input, textarea, select {
            font: inherit;
        }

        /* Bố cục chính */

        .app-shell {
            display: grid;
            grid-template-columns: 244px minmax(0, 1fr);
            min-height: 100vh;
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 30px 20px 22px;
            background: #14243b;
            color: #bac7da;
            display: flex;
            flex-direction: column;
        }

        .app-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            padding: 0 9px 28px;
        }

        .brand-mark {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 13px;
            background: #4e78f5;
            box-shadow: 0 5px 18px #0002;
        }

        .brand-name {
            display: block;
            font-size: 22px;
            font-weight: 750;
            letter-spacing: -0.5px;
            line-height: 1.25;
        }

        .brand-caption {
            display: block;
            margin-top: 3px;
            color: #8fa4c4;
            font-size: 10px;
            letter-spacing: 1.4px;
        }

        .nav-caption {
            margin: 20px 12px 12px;
            color: #7e93b2;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 10px;
            color: #b4c2d7;
            font-weight: 600;
        }

        .nav-link svg {
            flex-shrink: 0;
        }

        .nav-link:hover {
            color: white;
            background: #ffffff0a;
        }

        .nav-link.active {
            color: white;
            background: var(--blue);
            box-shadow: 0 6px 18px #0d1b3540;
        }

        .sidebar-tip {
            margin-top: auto;
            padding: 18px;
            background: #1c304e;
            border: 1px solid #2a4160;
            border-radius: 14px;
        }

        .sidebar-tip strong {
            color: #e5edff;
            font-size: 13px;
        }

        .sidebar-tip p {
            margin: 7px 0 0;
            color: #9fb1cb;
            font-size: 12px;
            line-height: 1.8;
        }

        .sidebar-footer {
            margin: 19px 8px 0;
            color: #7e93b2;
            font-size: 11px;
        }

        /* Thanh trên cùng */

        .workspace {
            min-width: 0;
        }

        .workspace-header {
            height: 82px;
            padding: 0 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: white;
            border-bottom: 1px solid var(--line);
        }

        .breadcrumb {
            color: #8c98aa;
            min-width: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .breadcrumb strong {
            color: #44536c;
            font-weight: 600;
            margin-left: 10px;
        }

        .team {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .team-avatar {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            color: #4269cc;
            background: #eaf0ff;
            font-weight: 750;
        }

        .team strong {
            display: block;
            font-size: 12px;
        }

        .team small {
            display: block;
            color: #95a0b1;
            font-size: 10px;
        }

        /* Nội dung */

        .workspace-content {
            width: 100%;
            max-width: 1360px;
            padding: 30px 36px 0;
            margin: auto;
        }

        h1 {
            margin: 0;
            color: #20334f;
            font-size: 29px;
            font-weight: 750;
            letter-spacing: -0.8px;
            line-height: 1.3;
            overflow-wrap: anywhere;
        }

        h2 {
            font-size: 19px;
            margin-top: 27px;
        }

        .page-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin: 4px 0 12px;
        }

        .intro {
            margin: 0 0 26px;
            color: var(--muted);
            font-size: 13px;
        }

        .card {
            padding: 25px;
            background: white;
            border: 1px solid #e6ebf3;
            border-radius: 16px;
            box-shadow: 0 5px 24px #273e6610;
        }

        /* Form và nút */

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 650;
            color: #4b5c76;
        }

        input:not([type="hidden"]),
        textarea,
        select {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dce4f0;
            border-radius: 9px;
            background: #f8faff;
            color: var(--ink);
            outline: none;
        }

        input::placeholder,
        textarea::placeholder {
            color: #9aa7bb;
        }

        input:not([type="hidden"]):focus,
        textarea:focus,
        select:focus {
            border-color: #7c9df8;
            background: white;
            box-shadow: 0 0 0 3px #3766e812;
        }

        button,
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 43px;
            padding: 10px 18px;
            border: 1px solid transparent;
            border-radius: 9px;
            color: white;
            background: var(--blue);
            font-size: 13px;
            font-weight: 650;
            white-space: nowrap;
            cursor: pointer;
        }

        button:hover,
        .button:hover {
            color: white;
            background: #2856d7;
        }

        .button.secondary {
            color: #60718c;
            background: white;
            border-color: #dfe6f1;
        }

        .button.secondary:hover {
            background: #f3f6fc;
        }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid #9db9ff;
            outline-offset: 3px;
        }

        .search-row {
            display: flex;
            align-items: stretch;
            gap: 10px;
            margin-bottom: 26px;
        }

        .search-row input {
            min-width: 0;
            flex: 1;
        }

        /* Bảng sách */

        .table-scroll {
            overflow-x: auto;
            border: 1px solid #eaf0f7;
            border-radius: 11px;
        }

        table {
            width: 100%;
            min-width: 780px;
            border-collapse: collapse;
        }

        th {
            padding: 15px 17px;
            color: #64748b;
            background: #f7f9fd;
            font-size: 11px;
            font-weight: 700;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            white-space: nowrap;
        }

        td {
            padding: 19px 17px;
            border-top: 1px solid #edf1f7;
            font-size: 14px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        tbody td:first-child {
            color: #62738d;
            font-size: 12px;
        }

        tbody td:nth-child(2) {
            color: #2a456d;
            font-weight: 650;
        }

        .number {
            text-align: right;
            white-space: nowrap;
            font-variant-numeric: tabular-nums;
        }

        .empty {
            padding: 45px;
            text-align: center;
            color: var(--muted);
        }

        .actions {
            display: flex;
            gap: 6px;
            white-space: nowrap;
        }

        .actions a {
            padding: 6px 10px;
            border-radius: 6px;
            color: #2552a5;
            background: #eef4ff;
            font-size: 12px;
            font-weight: 650;
        }

        .actions a:nth-of-type(2) {
            color: #8d651c;
            background: #fff8e9;
        }

        .actions a.danger {
            color: #ab3748;
            background: #fff0f2;
        }

        .actions a:hover {
            filter: brightness(0.96);
        }

        /* Phân trang */

        .pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-top: 22px;
            color: #65758e;
            font-size: 12px;
            flex-wrap: wrap;
        }

        .pagination ul {
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .pagination a {
            display: block;
            padding: 6px 10px;
            border: 1px solid #e5ebf5;
            border-radius: 7px;
            color: #65758e;
            background: white;
        }

        .pagination .active a {
            border-color: var(--blue);
            color: white;
            background: var(--blue);
        }

        .pagination .disabled a {
            color: #bcc6d5;
            pointer-events: none;
        }

        /* Thêm, sửa và chi tiết */

        .form-card {
            max-width: 850px;
            margin-top: 22px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 24px;
        }

        .input {
            margin-bottom: 21px;
        }

        .input.required > label::after {
            content: " *";
            color: #df6e78;
        }

        textarea {
            resize: vertical;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .error-message {
            margin-top: 6px;
            color: #c64754;
            font-size: 12px;
        }

        .input .form-error {
            border-color: #e5a0a7;
        }

        .message {
            padding: 14px 18px;
            margin: 0 0 20px;
            border: 1px solid #e3eaf5;
            border-radius: 10px;
        }

        .message.success {
            color: #258160;
            background: #edf9f3;
            border-color: #cfeadd;
        }

        .message.error {
            color: #bb5260;
            background: #fff1f3;
            border-color: #f3d1d8;
        }

        .hidden {
            display: none !important;
        }

        .book-detail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin: 0;
            padding-bottom: 25px;
            border-bottom: 1px solid var(--line);
        }

        .book-detail dt {
            color: #8a98ad;
            font-size: 12px;
        }

        .book-detail dd {
            margin: 5px 0 0;
            color: #2b456d;
            font-size: 17px;
            font-weight: 650;
        }

        .description {
            color: #64748b;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .workspace-footer {
            max-width: 1360px;
            margin: auto;
            padding: 25px 36px;
            color: #8392a8;
            font-size: 11px;
        }

        /* Màn hình nhỏ */

        @media (max-width: 1050px) {
            .app-shell {
                grid-template-columns: 205px minmax(0, 1fr);
            }

            .sidebar {
                padding-left: 12px;
                padding-right: 12px;
            }

            .workspace-header {
                padding: 0 22px;
            }

            .workspace-content {
                padding: 25px 22px 0;
            }
        }

        @media (max-width: 760px) {
            .app-shell {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
                height: auto;
                padding: 17px;
            }

            .app-brand {
                padding: 0 0 15px;
            }

            .nav-caption,
            .sidebar-tip,
            .sidebar-footer {
                display: none;
            }

            .sidebar nav {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .nav-link {
                margin: 0;
                padding: 10px;
                font-size: 12px;
            }

            .workspace-header {
                height: 64px;
                padding: 0 17px;
            }

            .workspace-content {
                padding: 22px 16px 0;
            }

            h1 {
                font-size: 24px;
            }

            .card {
                padding: 17px;
                border-radius: 12px;
            }

            .page-head {
                align-items: flex-start;
                flex-wrap: wrap;
            }

            .search-row {
                flex-wrap: wrap;
            }

            .search-row input {
                flex-basis: 100%;
            }

            .form-grid,
            .book-detail {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
<div class="app-shell">

    <aside class="sidebar">
        <a class="app-brand" href="<?= h($listUrl) ?>">
            <span class="brand-mark">
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.7"
                    stroke-linejoin="round"
                >
                    <path d="M3 4.5h5a5 5 0 0 1 4 1.7 5 5 0 0 1 4-1.7h5V20h-5a5 5 0 0 0-4 1 5 5 0 0 0-4-1H3z"/>
                    <path d="M12 6.2V21"/>
                </svg>
            </span>

            <span>
                <span class="brand-name">BookSpace</span>
                <span class="brand-caption">QUẢN LÝ NHÀ SÁCH</span>
            </span>
        </a>

        <p class="nav-caption">DANH MỤC</p>

        <nav aria-label="Điều hướng chính">
            <a
                class="nav-link<?= $currentAction !== 'add' ? ' active' : '' ?>"
                href="<?= h($listUrl) ?>"
            >
                <svg
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.7"
                >
                    <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                    <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                    <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                    <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                </svg>

                Danh sách sách
            </a>

           <?php if ($isAdmin ?? false): ?>
    <a
        href="<?= $this->Url->build([
            'controller' => 'Sach',
            'action' => 'add',
        ]) ?>"
        class="<?= $currentAction === 'add' ? 'active' : '' ?>"
    >
        <span>＋</span>
        <span>Thêm sách mới</span>
    </a>
<?php endif; ?>
        </nav>

        <div class="sidebar-tip">
            <strong>Tra cứu nhanh hơn</strong>

            <p>
                Nhập tên sách hoặc tác giả vào ô tìm kiếm
                để tìm thông tin bạn cần.
            </p>
        </div>

        <p class="sidebar-footer">Nhóm 5 · DA23TTD</p>
    </aside>

    <div class="workspace">
        <header class="workspace-header">
            <div class="breadcrumb">
                Quản lý
                <strong>/ <?= h($pageTitle) ?></strong>
            </div>

            <div class="team">
    <span class="team-avatar">N5</span>

    <div>
        <strong><?= h($currentUser->name) ?></strong>

        <small>
            <?= $isAdmin ? 'Quản trị viên' : 'Nhân viên' ?>
        </small>
    </div>

    <?= $this->Form->postLink(
        'Đăng xuất',
        ['controller' => 'Users', 'action' => 'logout'],
        ['class' => 'button secondary']
    ) ?>
</div>
        </header>

        <main class="workspace-content">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </main>

        <footer class="workspace-footer">
            BookSpace · Quản lý thông tin sách
        </footer>
    </div>

</div>

<?= $this->fetch('script') ?>
</body>
</html>
