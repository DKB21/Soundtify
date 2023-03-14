<div class="topnav">
    <?php $cut = explode("/", "$_SERVER[REQUEST_URI]");
    ?>
    
    <!-- left -->
    <?php 
        if(count($cut) == 2) {
            array_push($cut, "Home", "index");
        }
        elseif(count($cut) == 3) {
            array_push($cut, "index");
        }  
    ?>

    <?php if(strpos($cut[3], "index") !== false || strpos($cut[3], "login") !== false || strpos($cut[3], "logout") !== false || strpos($cut[3], "signup") !== false):?>
    <nav>
        <ul class="librarynav">
            <a href="#"><i class="fa-solid fa-house fa-lg"></i></a>
            <a href="#"><li>Home</li></a>
        </ul>
    </nav>
    <?php endif; ?>

    <?php if(strpos($cut[3], "search") !== false):?>
    <form action="<?= URLROOT ?>/Song/search" method="POST">
        <div class="searchbar">
            <i class="fa-solid fa-magnifying-glass searchicon"></i><input name="searchtext" type="text" placeholder="Search for artists, tracks,..." spellcheck="false" autocomplete="off">
            <button class="submitbutton"name="submit"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </form>
    <?php endif; ?>

    <?php if(strpos($cut[3], "library") !== false):?>
    <nav>
        <ul class="librarynav">
            <a href="#"><i class="fa-solid fa-music fa-lg"></i></a>
            <a href="<?= URLROOT ?>/User/library"><li>Tracks</li></a>
            <a href="<?= URLROOT ?>/User/library_artists"><li>Artists</li></a>
        </ul>
    </nav>
    <?php endif; ?>

    <?php if(strpos($cut[3], "upload") !== false):?>
    <nav>
        <ul class="librarynav">
            <a href="#"><i class="fa-solid fa-folder-plus fa-lg"></i></a>
            <a href="#"><li>Upload</li></a>
    </nav>
    <?php endif; ?>

    <?php if(strpos($cut[3], "profile") !== false):?>
    <nav>
        <ul class="librarynav">
            <a href="#"><i class="fa-solid fa-user fa-lg"></i></a>
            <a href="#"><li>Profile</li></a>
        </ul>
    </nav>
    <?php endif; ?>

    <?php if(strpos($cut[3], "account") !== false || strpos($cut[3], "changeava") !== false):?>
    <nav>
        <ul class="librarynav">
            <a href="#"><i class="fa-solid fa-gear fa-lg"></i></a>
            <a href="#"><li>Options</li></a>
        </ul>
    </nav>
    <?php endif; ?> 

    <?php if(strpos($cut[3], "musicplayer") !== false):?>
    <nav>
        <ul class="librarynav">
            <a href="#"><i class="fa-solid fa-music fa-lg"></i></a>
            <a href="#"><li>Track playing</li></a>
        </ul>
    </nav>
    <?php endif; ?>


    <!-- user icon -->
    <?php if (!empty($_SESSION['user_name'])):?>
    <a class="profilecard" href="<?= URLROOT ?>/Home/account" target="_blank">
        <img class="ava" src="<?=IMAGE?>/<?=$_SESSION['user_ava']?>">
        <div class="username"><?=$_SESSION['user_name']?></div>
    </a>
    <?php endif; ?>

    <!-- guest user icon -->
    <?php if (empty($_SESSION['user_name'])):?>
    <a class="profilecard" href="<?= URLROOT ?>/Home/login" target="_blank">
        <img class="ava" src="<?=IMAGE?>/guestava.png">
        <div class="username">guest</div>
    </a>
    <?php endif; ?>



</div>