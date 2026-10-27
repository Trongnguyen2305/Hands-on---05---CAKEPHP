<?php
declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        $builder->connect('/dang-nhap', [
    'controller' => 'Users',
    'action' => 'login',
]);

$builder->connect('/dang-xuat', [
    'controller' => 'Users',
    'action' => 'logout',
]);
        $builder->connect('/', [
            'controller' => 'Sach',
            'action' => 'index',
        ]);

        $builder->connect('/sach', [
            'controller' => 'Sach',
            'action' => 'index',
        ]);

        $builder->connect('/sach/them', [
            'controller' => 'Sach',
            'action' => 'add',
        ]);

        $builder->connect('/sach/xem/{id}', [
            'controller' => 'Sach',
            'action' => 'view',
        ])->setPass(['id'])->setPatterns(['id' => '[0-9]+']);

        $builder->connect('/sach/sua/{id}', [
            'controller' => 'Sach',
            'action' => 'edit',
        ])->setPass(['id'])->setPatterns(['id' => '[0-9]+']);

        $builder->connect('/sach/xoa/{id}', [
            'controller' => 'Sach',
            'action' => 'delete',
        ])->setPass(['id'])->setPatterns(['id' => '[0-9]+']);
    });
};
