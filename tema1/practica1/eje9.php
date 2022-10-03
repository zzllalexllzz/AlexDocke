<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        for ($i = 0; $i < 10; $i++) {
        $color='rgb('.rand(1,255).','.rand(1,255).','.rand(1,255).')';
        echo'<svg height="100" width="100">';
        echo'<circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="'.$color.'" />
        </svg>';
        }
        ?>
    </div>
</div>
