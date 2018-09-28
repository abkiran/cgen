<?php
include 'config.php';
include BASEDIR . 'lib/db.php';
include BASEDIR . 'lib/utill.php';

declare (ticks = 1); // PHP internal, make signal handling work
if (!function_exists('pcntl_signal')) {
    log_msg('ERROR', "You need to enable the pcntl extension in your php binary, see http://www.php.net/manual/en/pcntl.installation.php for more info.\n");
    exit(1);
}
log_msg('INFO', "Code generator is started.");

$DB = $argv[1] ?? 'ch';
doit($DB);

log_msg('INFO', "Code generator completed.");

function doit($db_name)
{
    db_connect($db_name);
    $ROW = array();
    $TABLES = query("Show TABLES");

    if ($TABLES[0]['nrows'] > 0) {
        create_dir(OUTPUT_DIR, $db_name);
    }
    // exit;
    exec("cp -r " . BASEDIR . "base/laravel_base/. " . OUTPUT_DIR . $db_name);

    for ($i = 0; $i < $TABLES[0]['nrows']; $i++) {

        $fields = query("DESCRIBE `" . $TABLES[$i]['Tables_in_' . $db_name] . "`");
        $table_name = $TABLES[$i]['Tables_in_' . $db_name];

        // Get primary key and unique key
        //$pk = query("SELECT column_name FROM information_schema.COLUMNS WHERE table_name = '$table_name' AND table_schema = '".$db_name."' AND column_key='PRI'");
        //$pk = get_arg($pk[0], 'column_name');
        // $uk = query("SELECT column_name FROM information_schema.COLUMNS WHERE table_name = '$table_name' AND table_schema = '".$db_name."' AND column_key='UNI'")->result_array()[0]['column_name'];

        $table = strtolower($TABLES[$i]['Tables_in_' . $db_name]);
        $module = str_replace('_', ' ', $TABLES[$i]['Tables_in_' . $db_name]);
        $class = str_replace(" ", '', ucwords($module));
        if ($table=='user'||$table=='setting') {
            continue;
        }
        
        $fn = $fv = $fvars = $frep = $row = array();
        $k = 0;
        for ($z = 0; $z < $fields[0]['nrows']; $z++) {
            $required = "";
            $input = "text";
            $css_class = "";
            $fill = "Test";

            if ($fields[$z]['Field'] == 'created_at' || $fields[$z]['Field'] == 'modified_at' || $fields[$z]['Field'] == 'updated_at' || $fields[$z]['Field'] == 'created_by' || $fields[$z]['Field'] == 'updated_by' || $fields[$z]['Field'] == 'updated_on') {
                continue;
            }
            if ($fields[$z]['Field'] == 'id') {
                continue;
            }

            $row[$k]['field'] = $fields[$z]['Field'];
            $row[$k]['label'] = ucwords(str_replace('_', ' ', $fields[$z]['Field']));

            $type_vals = explode('(', $fields[$z]['Type']);
            if (isset($type_vals[1])) {
                $type_vals[1] = rtrim($type_vals[1], ')');
            } else {
                $type_vals[1] = 100;
            }

            if ($type_vals[0] == 'enum') {
                $row[$k]['enum'] = 1;
                $row[$k]['enum_vals'] = explode(',', str_replace("'", "", $type_vals[1]));
                $type_vals[1] = 50;
                $input = 'select';
                $fill = $row[$k]['enum_vals'][0];
            } elseif ($type_vals[0] == 'text') {
                $type_vals[1] = '';
                $input = 'textarea';
                $fill = "Lorem Ipsum";
            } elseif ($type_vals[0] == 'tinyint') {
                $input = "radio";
                $fill = "1";
            } elseif ($type_vals[0] == 'date') {
                $css_class = 'datepicker';
                $fill = "2018-03-10";
            } elseif ($type_vals[0] == 'datetime') {
                $css_class = 'datetimepicker';
                $fill = "2018-03-10 10:43:21";
            } else {
                $row[$k]['enum'] = 0;
            }

            if (strrpos($fields[$z]['Field'], 'email') !== false) {
                $input = 'email';
                $fill = "example@example.com";
            } elseif ($fields[$z]['Field'] == 'password') {
                $input = 'password';
                $fill = "test123";
            }
            if ($type_vals[0] != 'int') {
                $type_vals[0] = 'string';
            }

            $row[$k]['type'] = $type_vals[0];
            $row[$k]['size'] = $type_vals[1];
            $row[$k]['input'] = $input;
            $row[$k]['css_class'] = $css_class;
            $row[$k]['fill'] = $fill;

            if ($fields[$z]['Null'] != 'YES') {
                $required = "required";
            }
            $row[$k]['required'] = $required;
            $row[$k]['extra'] = $fields[$z]['Extra'];
            array_push($fn, $fields[$z]['Field']);
            array_push($fvars, "$" . $fields[$z]['Field']);
            array_push($frep, $fields[$z]['Field'] . "='$" . $fields[$z]['Field'] . "'");
            $k++;
            $row[0]['nrows'] = $k;
        }
        // print_arr($row);
        // exit;

        $field_names = implode(',', $fn);
        $field_names_s = sprintf("'%s'", implode("', '", $fn));
        $field_vars = implode(',', $fvars);
        $field_vars1 = sprintf("'%s'", implode("', '", $fvars));
        $field_rep = implode(',', $frep);

        $privatekey = "";
        $file_path = OUTPUT_DIR . $db_name . '/';

        //Create directories
        create_dir($file_path . "resources/views/admin", $table);

        $controller = $file_path . "app/Http/Controllers/" . $class . "Controller.php";
        $model = $file_path . "app/Models/" . $class . ".php";
        $index = $file_path . "resources/views/admin/$table/index.blade.php";
        $add = $file_path . "resources/views/admin/$table/create.blade.php";
        $edit = $file_path . "resources/views/admin/$table/edit.blade.php";
        $test = $file_path . "tests/Feature/" . $class . "Test.php";
        $btest = $file_path . "tests/Feature/browser/" . $class . "Test.php";
        $web = $file_path . "routes/web.php";
        $sidebar = $file_path . "resources/views/layouts/partials/sidebar.blade.php";
        $hc = $file_path . "app/Http/Controllers/HomeController.php"; // HOme controller
        $dashboard = $file_path . "resources/views/admin/dashboard.blade.php";
        // $searchbar=$file_path."/search_bar.html";
        $env = $file_path.'.env';

        //Create default files
        $file = fopen($controller, "w+");
        fwrite($file, $privatekey);
        fclose($file);
        $file = fopen($model, "w+");
        fwrite($file, $privatekey);
        fclose($file);
        $file = fopen($index, "w+");
        fwrite($file, $privatekey);
        fclose($file);
        $file = fopen($edit, "w+");
        fwrite($file, $privatekey);
        fclose($file);
        $file = fopen($add, "w+");
        fwrite($file, $privatekey);
        fclose($file);
        $file = fopen($test, "w+");
        fwrite($file, $privatekey);
        fclose($file);
        $file = fopen($web, "w+");
        fwrite($file, $privatekey);
        fclose($file);

        chmod(OUTPUT_DIR, 0777);

        ob_start();
        include BASEDIR . "base/controller.php";
        file_put_contents($controller, ob_get_contents());
        ob_get_clean();

        ob_start();
        include BASEDIR . "base/model.php";
        file_put_contents($model, ob_get_contents());
        ob_get_clean();

        ob_start();
        include BASEDIR . "base/test.php";
        file_put_contents($test, ob_get_contents());
        ob_get_clean();

        ob_start();
        include BASEDIR . "base/test_browser.php";
        file_put_contents($btest, ob_get_contents());
        ob_get_clean();

        //print_arr($fields);
        ob_start();
        include BASEDIR . "base/index.php";
        file_put_contents($index, ob_get_contents());
        ob_get_clean();

        ob_start();
        include BASEDIR . "base/edit.php";
        file_put_contents($edit, ob_get_contents());
        ob_get_clean();

        ob_start();
        include BASEDIR . "base/create.php";
        file_put_contents($add, ob_get_contents());
        ob_get_clean();

    }

    ob_start();
    include BASEDIR . "base/HomeController.php";
    file_put_contents($hc, ob_get_contents());
    ob_get_clean();

    ob_start();
    include BASEDIR . "base/dashboard.php";
    file_put_contents($dashboard, ob_get_contents());
    ob_get_clean();

    ob_start();
    include BASEDIR . "base/sidebar.php";
    file_put_contents($sidebar, ob_get_contents());
    ob_get_clean();

    ob_start();
    include BASEDIR . "base/web.php";
    file_put_contents($web, ob_get_contents());
    ob_get_clean();

    $file_contents = file_get_contents($env);
    $file_contents = str_replace("<APPTITLE>", ucwords(str_replace('_', ' ', $db_name)), $file_contents);
    $file_contents = str_replace("<DBNAME>", $db_name, $file_contents);
    file_put_contents($env, $file_contents);

    echo "<a href='" . OUTPUT_URL . $db_name . "/public'> Launch $db_name </a>";
    exit;
}
