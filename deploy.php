<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:AdminWR/na-promo_api.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('45.133.149.170')
    ->set('remote_user', 'nawr')
    ->set('deploy_path', '~/www/api.rko-na.ru');

// Hooks

after('deploy:failed', 'deploy:unlock');
