<?php
    require_once APPROOT . '/views/includes/head.php';
?>

<body>
    <?php
        require_once APPROOT . '/views/includes/left_nav.php';
    ?>

    <?php
        require_once APPROOT . '/views/includes/top_nav.php';
    ?>

    <div class="main">
        <div class="group">
            <div class="title">Your account</div>
            <div class="accountcontainer">
                <div class="accountoption"><i class="fa-solid fa-caret-right"></i><a href="<?= URLROOT ?>/Home/changeava">Change your avatar</a></div>
                <div class="accountoption"><i class="fa-solid fa-caret-right"></i><a href="<?= URLROOT ?>/User/logout">Log out</a></div>
            </div>
        </div>
    </div>

</body>

</html>