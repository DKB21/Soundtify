<?php $cut = explode("/", "$_SERVER[REQUEST_URI]");?>

<?php 
        if(count($cut) == 2) {
            array_push($cut, "Home", "index");
        }
        elseif(count($cut) == 3) {
            array_push($cut, "index");
        }  
    ?>

<div class="leftnav">
    <div class="sidebar">
        <a href="<?= URLROOT ?>/Home/index"><div class="logo">Soundtify</div></a>
        <ul>
            <!-- new tab when playing -->
            <?php if(strpos($cut[3], "musicplayer") !== false):?>
            <a target="_blank" href="<?= URLROOT ?>/Home/index"><li><i class="fa-solid fa-house fa-lg"></i>Home</li></a>
            <a target="_blank" href="<?= URLROOT ?>/Home/search"><li><i class="fa-solid fa-magnifying-glass fa-lg"></i>Search</li></a>
            <?php if (empty($_SESSION['user_id'])) : ?>
            <a target="_blank" href="<?= URLROOT ?>/Home/login"><li id="login"><i class="fa-solid fa-user fa-lg"></i>Log In</li></a>
            <?php endif; ?>
            <?php if (!empty($_SESSION['user_id'])) : ?>
            <a target="_blank" href="<?= URLROOT ?>/User/library"><li><i class="fa-solid fa-music fa-lg"></i>Library</li></a>
            <a target="_blank" href="<?= URLROOT ?>/Home/upload"><li><i class="fa-solid fa-folder-plus fa-lg"></i></i>Upload</li></a>
            <a target="_blank" href="<?= URLROOT ?>/Song/profile/<?=$_SESSION['user_id']?>"><li><i class="fa-solid fa-user fa-lg"></i></i>Profile</li></a>
            <a target="_blank" href="<?= URLROOT ?>/Home/account"><li><i class="fa-solid fa-gear fa-lg"></i></i>Account</li></a>
            <?php endif; ?>
            <?php endif; ?>

            
            <?php if(!(strpos($cut[3], "musicplayer") !== false)):?>
            <a href="<?= URLROOT ?>/Home/index"><li id="home"><i class="fa-solid fa-house fa-lg"></i>Home</li></a>
            <a href="<?= URLROOT ?>/Home/search"><li id="search"><i class="fa-solid fa-magnifying-glass fa-lg"></i>Search</li></a>

            <?php if (empty($_SESSION['user_id'])) : ?>
            <a href="<?= URLROOT ?>/Home/login"><li id="login"><i class="fa-solid fa-user fa-lg"></i>Log In</li></a>
            <?php endif; ?>
            
            <?php if (!empty($_SESSION['user_id'])) : ?>
            <a href="<?= URLROOT ?>/User/library"><li id="library"><i class="fa-solid fa-music fa-lg"></i>Library</li></a>
            <a href="<?= URLROOT ?>/Home/upload"><li id="upload"><i class="fa-solid fa-folder-plus fa-lg"></i></i>Upload</li></a>
            <a href="<?= URLROOT ?>/Song/profile/<?=$_SESSION['user_id']?>"><li id="profile"><i class="fa-solid fa-user fa-lg"></i></i>Profile</li></a>
            <a href="<?= URLROOT ?>/Home/account"><li id="account"><i class="fa-solid fa-gear fa-lg"></i></i></i>Account</li></a>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>

<script>
    <?php if(strpos($cut[3], "index") !== false):?> document.getElementById("home").className = "current-sidebar"; <?php endif; ?>
    <?php if(strpos($cut[3], "search") !== false):?> document.getElementById("search").className = "current-sidebar"; <?php endif; ?>
    <?php if(strpos($cut[3], "login") !== false):?> document.getElementById("login").className = "current-sidebar"; <?php endif; ?>
    <?php if(strpos($cut[3], "library") !== false):?> document.getElementById("library").className = "current-sidebar"; <?php endif; ?>
    <?php if(strpos($cut[3], "upload") !== false):?> document.getElementById("upload").className = "current-sidebar"; <?php endif; ?>
    <?php if(strpos($cut[3], "profile") !== false):?> document.getElementById("profile").className = "current-sidebar"; <?php endif; ?>
    <?php if(strpos($cut[3], "account") !== false):?> document.getElementById("account").className = "current-sidebar"; <?php endif; ?>
</script>