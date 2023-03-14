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
            <h2>Create an account</h2>
            <form action="<?= URLROOT ?>/User/signup" method="POST">
            <div class="user-box">
                    <input name="username" type="text" required >
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input name="email" type="email" required >
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input name="password" type="password" required >
                    <label>Password</label>
                </div>
                <div class="user-box">
                    <input name="password2" type="password" required >
                    <label>Confirm password</label>
                </div>
                <div class="user-box form-group">
                    <button name="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>