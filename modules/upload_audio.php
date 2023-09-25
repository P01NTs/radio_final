<?php
    include_once "../includes/functions.php"
?>
<section class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="mp3file">
        <input type="submit" value="Upload" name="upload_mp3">
    </form>

    <?php



    // Handle file upload
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['mp3file'])) {
        upload_file("2");
    }
    ?>
</section>