<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend SBPro without hacking the core
| files.
|
*/

// $hook['auth_construct'][] = array(
//         'class'    => 'MY_Auth',
//         'function' => 'auth_construct',
//         'filename' => 'MY_Auth.php',
//         'filepath' => 'hooks',
//         'params'   => ''
// );

// $hook['auth_index_pre'][] = array(
//         'class'    => 'MY_Auth',
//         'function' => 'auth_index_pre',
//         'filename' => 'MY_Auth.php',
//         'filepath' => 'hooks',
//         'params'   => ''
// );

$hook['auth_index_post'][] = array(
        'class'    => 'MY_Auth',
        'function' => 'auth_index_post',
        'filename' => 'MY_Auth.php',
        'filepath' => 'hooks',
        'params'   => ''
);

$hook['auth_destruct'][] = array(
        'class'    => 'MY_Auth',
        'function' => 'auth_destruct',
        'filename' => 'MY_Auth.php',
        'filepath' => 'hooks',
        'params'   => ''
);

$hook['quiz_views_add'][] = array(
        'class'    => 'Quiz_Report_Model',
        'function' => 'addViews',
        'filename' => 'Quiz_Report_Model.php',
        'filepath' => 'hooks',
        'params'   => ''
);

$hook['quiz_start_add'][] = array(
        'class'    => 'Quiz_Report_Model',
        'function' => 'startquiz',
        'filename' => 'Quiz_Report_Model.php',
        'filepath' => 'hooks',
        'params'   => ''
);

$hook['quiz_complete_add'][] = array(
        'class'    => 'Quiz_Report_Model',
        'function' => 'completequiz',
        'filename' => 'Quiz_Report_Model.php',
        'filepath' => 'hooks',
        'params'   => ''
);

