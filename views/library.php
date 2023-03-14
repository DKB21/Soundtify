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
            <div class="title">Liked tracks</div>
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
    </div>
    
</body>
</html>