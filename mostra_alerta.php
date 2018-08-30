<?php
function MostraAlerta ($tipo) {

    if (isset($_SESSION[$tipo])) { ?>

        <p><?php echo $_SESSION[$tipo]; ?></p>

    <?php unset($_SESSION[$tipo]); }

}

?>
