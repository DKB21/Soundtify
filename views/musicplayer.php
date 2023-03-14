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
        if (!empty($data['song'])) :
        ?>
            <div class="musicbar">
                <img class="musicbar-img" src="<?= IMAGE ?>/<?= $data['song'][0]['songimg'] ?>">
                <div class="musicbar-playbutton" id="playBtn">
                    <div class="musicbar-playbutton-forward"><i id="playorpauseBtn" class="fa-solid fa-pause fa-2x"></i></div>
                    <div class="musicbar-playbutton-circle"><i class="fa-solid fa-circle fa-4x"></i></div>
                </div>
                <div class="musicbar-info">
                    <div class="musicbar-info-title"><?= $data['song'][0]['title'] ?></div>
                    <div class="musicbar-info-artist"><a target="_blank" href="<?= URLROOT ?>/Song/profile/<?= $data['song'][0]['artistID'] ?>"><?= $data['song'][0]['name'] ?></a></div>
                    <div class="musicbar-info-waveform"></div>
                    <div class="musicbar-info-nexticon"><i id="nextBtn" class="fa-solid fa-forward-step fa-lg"></i></div>
                    <div class="musicbar-info-likeicon" id="likeBtn"><a onclick="like(<?= $data['song'][0]['songID'] ?>)"><i class="fa-solid fa-heart fa-lg"></i></a></div>
                    <!-- i don't understand this download but it's work -->
                    <a download="<?= $data['song'][0]['title'] ?>" href="<?= AUDIOFILE ?>/<?= $data['song'][0]['songfile'] ?>" class="musicbar-info-downicon"><i id="downBtn" class="fa-solid fa-circle-down fa-lg"></i></a>
                    <div class="musicbar-info-volumnicon"><i id="volumnBtn" class="fa-solid fa-volume-high fa-lg"></i></div>
                </div>
            </div>

        <?php
        endif;
        ?>

        <div class="group">
            <div class="title">More from <?= $data['song'][0]['name'] ?></div>
            <div class="container">
                <a class="artistcard" target="_blank" href="<?= URLROOT ?>/Song/profile/<?=$data['song'][0]['artistID']?>">
                    <img class="artistcard-img" src="<?=IMAGE?>/<?=$data['song'][0]['avafile']?>">
                    <div class="artistcard-name"><?=$data['song'][0]['name']?></div>
                    <div class="artistcard-followers">Artist</div>
                    <div class="artistcard-icon">
                        <div class="artistcard-play"><i class="fa-solid fa-user fa-lg"></i></div>
                        <div class="artistcard-circle"><i class="fa-solid fa-circle fa-3x"></i></div>
                    </div>
                </a>
                <?php
                if (!empty($data['songs'])) :
                    foreach ($data['songs'] as $songs) : extract($songs);
                ?>
                    <?php 
                        if($songs['artistID'] == $data['song'][0]['artistID'] && $songs['songID'] != $data['song'][0]['songID']) : ?>
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
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <div class="group">
            <div class="title">Other tracks</div>
            <div class="container">
                <?php
                if (!empty($data['songs'])) :
                    foreach ($data['songs'] as $songs) : extract($songs);
                ?>
                    <?php 
                        if($songs['artistID'] != $data['song'][0]['artistID']) : ?>
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
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</body>

<script>
    <?php
    if (!empty($data['song'])) :
    ?>
        function randomIntFromInterval(min, max) { // min and max included 
            return Math.floor(Math.random() * (max - min + 1) + min)
        }

        var randomNextSong = randomIntFromInterval(1, <?= $data['countSong'][0]["count(*)"] ?>);
        while(randomNextSong == <?= $data['song'][0]['songID'] ?>) randomNextSong = randomIntFromInterval(1, <?= $data['countSong'][0]["count(*)"] ?>);

        var url = window.location.pathname.split('/');

        var playBtn = document.getElementById("playBtn");
        var playorpauseBtn = document.getElementById("playorpauseBtn");
        var volumnBtn = document.getElementById("volumnBtn");
        var downBtn = document.getElementById("downBtn");
        var likeBtn = document.getElementById("likeBtn");
        var nextBtn = document.getElementById("nextBtn");

        var wavesurfer = WaveSurfer.create({
            container: '.musicbar-info-waveform',
            waveColor: 'rgb(190, 190, 190)',
            progressColor: 'rgb(0, 225, 255)',
            barWidth: 3,
            barRadius: 1,
            height: 60,
            hideScrollbar: true,
            cursorColor: 'rgb(0, 225, 255)',
            cursorWidth: 2,
        });

        wavesurfer.load('<?= AUDIOFILE ?>/<?= $data['song'][0]['songfile'] ?>');
        wavesurfer.setVolume(0.3);

        wavesurfer.on("ready", function() {
            wavesurfer.playPause();
            playorpauseBtn.className = "fa-solid fa-pause fa-2x";
        });
        wavesurfer.on("finish", function() {
            window.location.replace(window.location.protocol + "//" + window.location.hostname + "/" + url[1] + "/Song/musicplayer/" + randomNextSong);
        });

        nextBtn.onclick = function() {
            window.location.replace(window.location.protocol + "//" + window.location.hostname + "/" + url[1] + "/Song/musicplayer/" + randomNextSong);
        }

        playBtn.onclick = function() {
            wavesurfer.playPause();
            if (wavesurfer.isPlaying() == true) playorpauseBtn.className = "fa-solid fa-pause fa-2x";
            else if (wavesurfer.isPlaying() == false) playorpauseBtn.className = "fa-solid fa-play fa-2x";
        }

        volumnBtn.onclick = function() {
            if (volumnBtn.className == "fa-solid fa-volume-high fa-lg") {
                wavesurfer.setVolume(0.1);
                volumnBtn.className = "fa-solid fa-volume-low fa-lg";
            } else if (volumnBtn.className == "fa-solid fa-volume-low fa-lg") {
                wavesurfer.setVolume(0.03);
                volumnBtn.className = "fa-solid fa-volume-off fa-lg";
            } else if (volumnBtn.className == "fa-solid fa-volume-off fa-lg") {
                wavesurfer.setVolume(0.3);
                volumnBtn.className = "fa-solid fa-volume-high fa-lg";
            }
        }

        //32 = spacebar; prevent scrolldown on spacebar
        window.addEventListener('keydown', function(e) {
            if (event.which == 32) {
                wavesurfer.playPause();
                if (wavesurfer.isPlaying() == true) playorpauseBtn.className = "fa-solid fa-pause fa-2x";
                else if (wavesurfer.isPlaying() == false) playorpauseBtn.className = "fa-solid fa-play fa-2x";
            }
            if (e.keyCode == 32 && e.target == document.body) {
                e.preventDefault();
            }
        });

        <?php
        if (!empty($data['checkLiked'])) :
        ?>
            likeBtn.className = "musicbar-info-likeicon changecolor";
        <?php
        endif
        ?>
    <?php
    endif;
    ?>

    function changeLikeBtnColor() {
        if (likeBtn.className == "musicbar-info-likeicon") likeBtn.className = "musicbar-info-likeicon changecolor";
        else if (likeBtn.className == "musicbar-info-likeicon changecolor") likeBtn.className = "musicbar-info-likeicon";
    }

    function like(songID) {
        $.ajax({
            url: window.location.protocol + "//" + window.location.hostname + "/" + url[1] + "/User/like/" + songID,
            method: "POST",
            data: {},
            success: function(data) {
                changeLikeBtnColor();
            }
        });
    }
</script>

</html>