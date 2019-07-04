<?php
include 'engine/autoload.php';
autoload('config');
include PUBLIC_DIR . 'header.php';


include ENGINE_DIR . 'catalog.php';
include ENGINE_DIR . 'admin.php';
include TEMPLATES_DIR . 'admin.php';

include TEMPLATES_DIR . 'modal.php';



include PUBLIC_DIR . 'footer.php';