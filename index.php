<?php
//entry point to the application
//include the dependencies
require_once 'app/core/init.php';

//to include external files in php we can use include, include_once, require, require_once
//require is for stuff you need
//include can be less fatal
// _once is to enure things are included only once

new App;