<?php
require_once('init.php');
require_once('helpers.php');
require_once('functions.php');
require_once('data.php');

$page_content = include_template('main.php', [
    'data_posts' => $data_posts,
]);
$layout_content = include_template('layout.php', [
    'title' => 'readme: популярное',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'content' => $page_content,
]);

print($layout_content);
