<?php

require_once '../../functions.php';

Session::destroy();

Request::redirectBack();