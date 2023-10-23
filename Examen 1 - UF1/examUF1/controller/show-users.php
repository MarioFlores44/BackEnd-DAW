<?php
    require_once '../model/pdo-users.php';

    function users() {
        $users = showUsers();

        foreach ($users as $user) : ?>
            <p><?php echo $user['nickname']?></p>
        <?php endforeach;
    }

    require_once '../view/show-users.view.php'

?>