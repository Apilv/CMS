<?php
session_start();
require "bootstrap.php";
require "pages/page_generator.php";

generateAdmin($pages);
generatePage();



