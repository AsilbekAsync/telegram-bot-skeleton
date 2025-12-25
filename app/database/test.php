<?php

require_once __DIR__ . '/../../config/system.php';
require_once __DIR__ . '/database.php';

// var_dump(
//     \Database\Models\Users::get_by_chat_id(1)
// );

var_dump(
    \Database\Models\Users::create(1234567890, 'en', 'step')
);