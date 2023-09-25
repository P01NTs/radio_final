        <?php
        if (isset($_POST['program'])) {
            header('Location: /ra/redirect/radio.php?id=program');
            exit();
        }
        if (isset($_POST['audio'])) {
            header('Location: /ra/redirect/radio.php?id=audio');
            exit();
        }
        if (isset($_POST['deconnexion'])) {
            session_destroy();
            header('Location: /ra/index.php');
            exit();
        }
        if (isset($_POST['XML'])) {
        }
        if (isset($_SESSION['login_token'])) :
        ?>
            <form method="post" class="menu-admin">
                <input type="submit" name="deconnexion" title="Se déconnecté"  value="">
                <input type="submit" name="program" title="Ajouter un programme" value="">
                <input type="submit" name="audio" title="Ajouter un audio" value="">
                <input type="submit" name="XML" title="Ajouter un fichier XML" value="">
            </form>
        <?php endif; ?>

        <style>
            .menu-admin {
                display: flex;
                justify-content: center;
                flex-direction: row-reverse;
                gap: 5px;
                position: absolute;
                top: 5px;
                right: 5px;
                z-index: 999999;

            }

            .menu-admin input {
                width: 35px;
                /* Adjust the width and height as needed */
                height: 35px;
                margin: 5px;
                /* Add spacing between the inputs */
                border: none;
                background: none;
                /* Remove the default input background */
                cursor: pointer;
            }

            /* Set background images for each input based on their name attributes */
            input[name="deconnexion"] {
                background: url('/ra/assets/icon/power.png') center center no-repeat;
                background-size: contain;
            }

            input[name="program"] {
                background: url('/ra/assets/icon/mic.png') center center no-repeat;
                background-size: contain;
            }

            input[name="audio"] {
                background: url('/ra/assets/icon/sound-waves.png') center center no-repeat;
                background-size: contain;
            }

            input[name="XML"] {
                background: url('/ra/assets/icon/2311991.png') center center no-repeat;
                background-size: contain;
            }
        </style>