<?php
session_start();
?>
<?php

//Session End
session_unset();
session_destroy();

?><script type='text/javascript'>alert('Logged Out');
    window.location.assign("index.html")</script>"
