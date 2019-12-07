<?php

add_action("genesis_noposts_text","not_found");

function not_found(){
   ?>
   <div class="wrapper not-found">
   </div>
<?php
}
?>
<?php genesis();  ?>