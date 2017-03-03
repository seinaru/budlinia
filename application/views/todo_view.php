<p align="middle">
    <img src="/images/zakr.jpg" width="50%" height="20%">
</p>
<?php
    //$_SESSION['bucket']= array();
    Model::goodLook($_SESSION);
    session_write_close();
    echo 'end';
//session_start();
    unset($_SESSION['bucket']);
    Model::goodLook($_SESSION);
    session_destroy();
    echo 'status:'.session_status();
