<?php
//var_dump($data['songs']);
//var_dump(AUDIOFILE . '/' . "haha.jpg");
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
            <div class="title">Newest tracks</div>
            <div class="container">
                <?php 
                    if(!empty($data['songs'])) :
                        for($i = 0; $i < 7; $i++) :
                ?>    
                <a class="songcard" href="<?= URLROOT ?>/Song/musicplayer/<?=$data['songs'][$i]['songID']?>">
                    <img class="songcard-img" src="<?=IMAGE?>/<?=$data['songs'][$i]['songimg']?>">
                    <div class="songcard-song"><?=$data['songs'][$i]['title']?></div>
                    <div class="songcard-artist"><?=$data['songs'][$i]['name']?></div>
                    <div class="songcard-icon">
                        <div class="songcard-play"><i class="fa-solid fa-play fa-lg"></i></div>
                        <div class="songcard-circle"><i class="fa-solid fa-circle fa-3x"></i></div>
                    </div>
                </a>
                <?php 
                        endfor;
                    endif;
                ?>
            </div>
        </div>

        <div class="group">
            <div class="title">Recommended artists</div>
            <div class="container">
                <?php 
                    if(!empty($data['artists'])) :
                        for($i = 0; $i < 7; $i++) :
                ?> 
                <a class="artistcard" href="<?= URLROOT ?>/Song/profile/<?=$data['artists'][$i]['artistID']?>">
                    <img class="artistcard-img" src="<?=IMAGE?>/<?=$data['artists'][$i]['avafile']?>">
                    <div class="artistcard-name"><?=$data['artists'][$i]['name']?></div>
                    <div class="artistcard-followers">Artist</div>
                    <div class="artistcard-icon">
                        <div class="artistcard-play"><i class="fa-solid fa-user fa-lg"></i></div>
                        <div class="artistcard-circle"><i class="fa-solid fa-circle fa-3x"></i></div>
                    </div>
                </a>
                <?php 
                        endfor;
                    endif;
                ?>

            </div>
        </div>
    </div>
</body>
</html>