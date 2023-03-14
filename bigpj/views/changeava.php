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
        <div class="title">Change avatar</div>
        <div class="form">
            <div class="form-left">
                <img id="imgShow" src="<?= IMAGE ?>/defaultimg.jpg" width="200px">
            </div>

            <div class="form-right">
                <form enctype="multipart/form-data" action="<?= URLROOT ?>/User/changeava" method="POST">
                    <div class="form-group">
                        <div class="form-group-label">Choose your new avatar (.jpg, .jpeg)</div>
                        <div class="form-input">
                            <input name='img' type="file" id="imgInp">
                        </div>
                    </div>
                    <div class="form-group">
                        <button name="submit">Finish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgShow').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>

</html>