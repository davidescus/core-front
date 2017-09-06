<?php
    session_start();

    // logout user
    if  (isset($_GET['logout'])) {

        $_SESSION['loggedIn'] = false;

        echo '<script type="text/javascript">

                // remove token from localStorage
                localStorage.removeItem("core-app-token-x76");

                // refresh location without querystring.
                var href = document.location.href.split("?")[0];
                window.location.replace(href);

             </script>';
        die();
    }

    // user was logged in , so serve dashboard
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        include "common/header.php";

        echo '<div class="page-container">';

        include "common/menu.php";

        include "pages/site.php";
        include "pages/subscription.php";
        include "pages/event.php";
        include "pages/association.php";
        include "pages/distribution.php";
        include "pages/archive-big.php";

        include "common/sidebar.php";

        echo '</div>';

        include "common/footer.php";

        die();
    }

    // perform login action
    if (isset($_POST['login'])) {

        // perform login operation by curl
        $config = require_once 'config.php';
        $url = $config['coreUrl'] . '/admin/login';
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $post = curl_init();
        curl_setopt($post, CURLOPT_URL, $url);
        curl_setopt($post, CURLOPT_POST, count($data));
        curl_setopt($post, CURLOPT_POSTFIELDS, $data);
        curl_setopt($post, CURLOPT_RETURNTRANSFER, true);
        $ret = curl_exec($post);

        $response = json_decode($ret, true);

        // success autentificate
        if ($response['success']) {
            $_SESSION['loggedIn'] = true;

            // send script to set in local storage token
            // also to perform an redirect here (user is logged in now)
            echo '<script type="text/javascript">

                    // set token in localStorage
                    localStorage.setItem("core-app-identifier-x76", "' . $response['token'] . '");

                    // refresh location without querystring.
                    var href = document.location.href.split("?")[0];
                    window.location.replace(href);

                 </script>';

            die();
        }
    }
?>

<!-- show login form -->
<form action="" method="post">
    Email:
    <input type="text" name="email">
    <br/>
    Password
    <input type="text" name="password">
    <input type="submit" name="login" value="login">
</form>
