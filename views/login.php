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
        <div class="login-box">
            <h2>Login</h2>
            <form action="<?= URLROOT ?>/User/login" method="POST">
                <div class="user-box">
                    <input name="email" type="text" required >
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input name="password" type="password" required >
                    <label>Password</label>
                </div>
                <div class="user-box form-group">
                    <button name="submit">Log In</button>
                </div>
                <div class="smalltext">
                    <a href="<?= URLROOT ?>/Home/signup">Create your account here</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>