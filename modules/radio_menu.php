<?php

?>

    <div class="hidden_menu">
        <?php
        $sql = "SELECT * FROM radio";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='/ra/pages/radio/?id=". $row['radio_id'] ."' class='radio_logo' id='" . $row['radio_id'] . "'><img src='/ra/assets/radio_logo/logo---" . str_replace(' ', '-', $row['radio_name']) . ".png' alt=' srcset=' /></a>";
            }
        }
        ?>
    </div>
    <img class="expand" src="/ra/assets/icon/expand.png" alt="">
<style>
    .hidden_menu {
        margin-top: 90px;
        height: 0;
        box-shadow: rgba(0, 0, 0, 0.35) 0px -40px 16px -38px inset, rgba(0, 0, 0, 0.35) 0px 40px 16px -32px inset;
        border-bottom: solid 1px rgb(255, 255, 255);
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;

    }

    .radio_logo {
        width: auto;
    }

    .hidden_menu .radio_logo img {
        width: 100px;
    }

    .expand {
        cursor: pointer;
        display: flex;
        margin: 0 auto;
        width: 45px;
        height: 35px;
        opacity: .7;
        transition: opacity .3s;

    }

    .expand:hover {
        opacity: 1;

    }
</style>
<script>

    document.addEventListener("DOMContentLoaded", function() {
        let expandElement = document.querySelector(".expand");
        const hiddenMenu = document.querySelector(".hidden_menu");
        let isOpen = false;
        let animationInterval;

        expandElement.addEventListener("click", function() {
            if (isOpen) {
                hiddenMenu.style.height = 130 + "px";
                expandElement.style.transform = "scaleY(1)"
                clearInterval(animationInterval);
                animationInterval = setInterval(() => {
                    console.log(hiddenMenu.style.height)
                    if (parseInt(hiddenMenu.style.height) > 0) {
                        hiddenMenu.style.height = parseInt(hiddenMenu.style.height) - 1 + "px";
                    } else {

                        clearInterval(animationInterval);
                    }
                }, 1)
            } else {
                hiddenMenu.style.height = 0 + "px";
                expandElement.style.transform = "scaleY(-1)"
                clearInterval(animationInterval);
                animationInterval = setInterval(() => {
                    console.log(hiddenMenu.style.height)
                    if (parseInt(hiddenMenu.style.height) < 130) {
                        hiddenMenu.style.height = parseInt(hiddenMenu.style.height) + 1 + "px";
                    } else {
                        clearInterval(animationInterval);
                    }
                }, 1)
            }
            isOpen = !isOpen;
        });
    });
</script>