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
        <?php 
            if (!empty($data['songs'])) : 
        ?>
        <div class="background">
            <img class="bgavt" src="<?= IMAGE ?>/<?= $data['songs'][0]['avafile'] ?>">
            <h2><?= $data['songs'][0]['name'] ?></h2>
            <p>Artist</p>
            <div class="background-button">
                <?php //guest
                    if (empty($_SESSION['user_id'])) : 
                ?>
                <a href="<?= URLROOT ?>/Home/login"><button name="submit">Follow</button></a>
                <?php 
                    endif;
                ?>

                <?php //others profile and haven't followed
                    if (!empty($_SESSION['user_id']) && $data['songs'][0]['artistID'] != $_SESSION['user_id'] && empty($data['checkFollow'])) : 
                ?>
                <a href="<?= URLROOT ?>/User/follow/<?=$data['songs'][0]['artistID']?>"><button name="submit">Follow</button></a>
                <?php 
                    endif;
                ?>

                <?php //others profile and followed
                    if (!empty($_SESSION['user_id']) && $data['songs'][0]['artistID'] != $_SESSION['user_id'] && !empty($data['checkFollow'])) : 
                ?>
                <a href="<?= URLROOT ?>/User/unfollow/<?=$data['songs'][0]['artistID']?>"><button name="submit">Followed</button></a>
                <?php 
                    endif;
                ?>

                <?php //self profile
                    if (!empty($_SESSION['user_id']) && $data['songs'][0]['artistID'] == $_SESSION['user_id']) : 
                ?>
                <a href="<?= URLROOT ?>/Home/changeava"><button name="submit">Change your avatar</button></a>
                <?php 
                    endif; 
                ?>
            </div>
        </div>

        <div class="group">
            <div class="title">All tracks</div>
            <div class="container">
            <?php
                if (!empty($data['songs'])) :
                    foreach ($data['songs'] as $songs) : extract($songs);
                ?>

                        <a class="songcard" href="<?= URLROOT ?>/Song/musicplayer/<?= $songs['songID'] ?>">
                            <img class="songcard-img" src="<?= IMAGE ?>/<?= $songs['songimg'] ?>">
                            <div class="songcard-song"><?= $songs['title'] ?></div>
                            <div class="songcard-artist"><?= $songs['name'] ?></div>
                            <div class="songcard-icon">
                                <div class="songcard-play"><i class="fa-solid fa-play fa-lg"></i></div>
                                <div class="songcard-circle"><i class="fa-solid fa-circle fa-3x"></i></div>
                            </div>
                        </a>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <?php 
            endif; 
        ?>
        <?php 
            if(empty($data['songs'])) echo("This user doesn't have an artist profile because hasn't uploaded any track (not an artist).") ;
        ?>
    </div>

</body>

</html>

