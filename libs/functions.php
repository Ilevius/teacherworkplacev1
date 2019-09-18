<?php

function alert($kind, $text)
  {
    echo "<div class='alert alert-".$kind." alert-dismissible fade show' role='alert'>";
    echo "<strong>".$text."</strong>";
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button></div>';
  }


?>