<?php

$S="/var/www/REPO/OUTPUTS/ch";
$D="/var/www/REPO/chicago";

$table=$argv[1];
$module=str_replace('_', ' ', $table);
$class = str_replace(" ", '', ucwords($module));

copy("$S/app/Http/Controllers/".$class."Controller.php", "$D/app/Http/Controllers/".$class."Controller.php");
copy("$S/app/Models/$class.php", "$D/app/Models/$class.php");
copy("$S/tests/Feature/".$class."Test.php", "$D/tests/Feature/".$class."Test.php");
if(!file_exists("$D/resources/views/admin/$table"))
	mkdir("$D/resources/views/admin/$table");
copy("$S/resources/views/admin/$table/create.blade.php", "$D/resources/views/admin/$table/create.blade.php");
copy("$S/resources/views/admin/$table/edit.blade.php", "$D/resources/views/admin/$table/edit.blade.php");
copy("$S/resources/views/admin/$table/index.blade.php", "$D/resources/views/admin/$table/index.blade.php");
echo $class." - Done \n";