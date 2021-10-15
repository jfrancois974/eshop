<?php

require_once(__DIR__ . '/../../bootstrap.php');

redirect_unless_admin();

?>

<?php partial('header', ['title' => 'Admin']) ?>

    <h1>Admin</h1>
<form action="/admin/logout.php" method="post">
<button>Deconnexion</button>
</form>

<?php partial('footer') ?>