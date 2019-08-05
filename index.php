<?php

//autoloader
require 'libs/Router.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/database.php';
require 'libs/Session.php';
require 'libs/dataHandling.php';

require 'config/path.php';
require 'config/database.php';


$app = new Router();
