<?php
return array(
    'db.host' => 'mongodb://mongo:27017',
    'profiler.enable' => function() {
        $root = $_SERVER['DOCUMENT_ROOT'];
        if ($root == '/var/www/html/blzj') {
            return true;
        }
	return false;
    },
);
