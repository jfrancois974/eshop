<?php

require_once(__DIR__ . '/../../bootstrap.php');
redirect_unless_admin();



if (!is_post()) {
    abort_404();
}

unset($_SESSION['admin']);
redirect('/admin/login.php');
