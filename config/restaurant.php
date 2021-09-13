<?php
return [
    'paginate' => [
        'dish' => 6,
        'table' => 6,
        'category' => 6,
        'user' => 6,
        'comment' => 6,
    ],
    'dishes' => [
        'offset' => 0,
        'limit' => 4,
    ],
    'status_order' => [
        'not_accept' => 0,
        'accept' => 1,
        'processed' => 3,
    ],
    'default' => [
        'quantity' => 1,
        'price' => 0,
        'weight' => 0,
        'img' => 'no-img.jpg',
    ],
    'role_user' => [
        'customer' => 1,
        'manager' => 2,
        'admin' => 3,
    ],
    'status_user' => [
        'block' => 0,
        'unblock' => 1,
    ],
];
