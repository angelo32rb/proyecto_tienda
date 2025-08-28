<?php

require_once '../../components/Sessions/Session.php';

$session = new Session();

$session->closeSession();

header('Location: ./../../');
exit();