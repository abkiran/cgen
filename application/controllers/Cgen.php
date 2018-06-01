<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cgen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        global $db;
        // $this->load->model('db');
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function mine()
    {
        echo "kiran";
        exit;
    }
    public function doit($db_name)
    {

        // $this->db->close();
        // $dsn = 'mysql://root:@localhost/$db_name';
        // $this->load->database($dsn);

        // $this->create_dir(OUTPUT_DIR,$db_name);
        $ROW=array();
        $TABLES=$this->db->query("Show TABLES")->result_array();
        
        exec("cp -r ".BASE_DIR."base/laravel_base/* ".OUTPUT_DIR.$db_name);

        for ($i=0; $i < $TABLES[0]['nrows']; $i++) {
            
            $fields=$this->db->query("DESCRIBE `".$TABLES[$i]['Tables_in_'.$db_name]."`")->result_array();
            $table_name=$TABLES[$i]['Tables_in_'.$db_name];

            // Get primary key and unique key
            $pk = $this->db->query("SELECT column_name FROM information_schema.COLUMNS WHERE table_name = '$table_name' AND table_schema = '".$db_name."' AND column_key='PRI'")->result_array();
            $pk = $this->get_arg($pk[0], 'column_name');
            // $uk = $this->db->query("SELECT column_name FROM information_schema.COLUMNS WHERE table_name = '$table_name' AND table_schema = '".$db_name."' AND column_key='UNI'")->result_array()[0]['column_name'];
            
            $table=strtolower($TABLES[$i]['Tables_in_'.$db_name]);
            $module=str_replace('_', ' ', $TABLES[$i]['Tables_in_'.$db_name]);
            $class = str_replace(" ", '', ucwords($module));
            if ($table=='user'||$table=='system_setting') continue;
            // echo $module;
            // echo $class;

            // copy(BASE_DIR.'base/ci_base/',OUTPUT_DIR.$db_name);
            // exec("mv ".OUTPUT_DIR."ci_base ".OUTPUT_DIR.$db_name);

            // $this->print_arr($fields);
            $fn = $fv = $fvars = $frep = $row = array();
            $k=0;
            for ($z=0; $z < $fields[0]['nrows']; $z++) {
                $required = "";
                $input = "text";
                $css_class = "";

                if ($fields[$z]['Field'] == 'created_at' || $fields[$z]['Field'] == 'modified_at') {
                    continue;
                }
                if ($fields[$z]['Field']=='id') continue;
                
                $row[$k]['field'] = $fields[$z]['Field'];
                $row[$k]['label'] = ucwords(str_replace('_', ' ', $fields[$z]['Field']));

                $type_vals = explode('(', $fields[$z]['Type']);
                if (isset($type_vals[1])) $type_vals[1] = rtrim($type_vals[1], ')');
                else $type_vals[1] = 100;

                if ($type_vals[0]=='enum') {
                    $row[$k]['enum'] = 1;
                    $row[$k]['enum_vals'] = explode(',', str_replace("'", "", $type_vals[1]));
                    $type_vals[1] = 50;
                    $input = 'select';
                } elseif ($type_vals[0]=='text'){
                    $type_vals[1] = '';
                    $input = 'textarea';
                } elseif ($type_vals[0]=='tinyint'){
                    $input = "radio";
                } elseif ($type_vals[0]=='date'){
                    $css_class = 'datepicker';
                } elseif ($type_vals[0]=='datetime'){
                    $css_class = 'datetimepicker';
                }  else {
                    $row[$k]['enum'] = 0;
                }

                if ($fields[$z]['Field']=='email') {
                    $input = 'email';
                } elseif ($fields[$z]['Field']=='password') {
                    $input = 'password';
                }
                if ($type_vals[0] != 'int') $type_vals[0] = 'string';
                
                $row[$k]['type'] = $type_vals[0];
                $row[$k]['size'] = $type_vals[1];
                $row[$k]['input'] = $input;
                $row[$k]['css_class'] = $css_class;

                
                if ($fields[$z]['Null']!='YES') $required = "required";
                $row[$k]['required'] = $required;
                $row[$k]['extra'] = $fields[$z]['Extra'];
                array_push($fn, $fields[$z]['Field']);
                array_push($fvars, "$".$fields[$z]['Field']);
                array_push($frep, $fields[$z]['Field']."='$".$fields[$z]['Field']."'");
                $k++;
                $row[0]['nrows'] = $k;
            }
            $this->print_arr($row);
            // exit;

            $field_names=implode(',', $fn);
            $field_names_s=sprintf("'%s'", implode("', '", $fn));
            $field_vars=implode(',', $fvars);
            $field_vars1=sprintf("'%s'", implode("', '", $fvars));
            $field_rep=implode(',', $frep);
            // echo $field_names."<br><br>";
            // echo $field_vars."<br><br>";
            // echo $field_rep;


            $privatekey="";
            $file_path=OUTPUT_DIR.$db_name.'/';

            
            //Create directories
            

            // $this->create_dir($file_path, "app/Http/Controllers");
            // $this->create_dir($file_path, "app/Models");
            // $this->create_dir($file_path, "resources/views/admin");
            // $this->create_dir($file_path, "tests/Feature/");

            $this->create_dir($file_path."resources/views/admin", $table);
            
            $controller=$file_path."app/Http/Controllers/".$class."Controller.php";
            $model=$file_path."app/Models/".$class.".php";
            $index=$file_path."resources/views/admin/$table/index.blade.php";
            $add=$file_path."resources/views/admin/$table/create.blade.php";
            $edit=$file_path."resources/views/admin/$table/edit.blade.php";
            $test=$file_path."tests/Feature/".$class."Test.php";
            $web=$file_path."routes/web.php";
            $sidebar=$file_path."resources/views/layouts/partials/sidebar.blade.php";
            // $searchbar=$file_path."/search_bar.html";

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

            // $file = fopen($main,"w+");
            // fwrite($file, $privatekey);
            // fclose($file);
            // $file = fopen($searchbar,"w+");
            // fwrite($file, $privatekey);
            // fclose($file);
            
            // $file = fopen($db,"w+");
            // fwrite($file, $privatekey);
            // fclose($file);
            chmod(OUTPUT_DIR, 0777);
            // echo nl2br("Route::resource('admin/settings/$table', '".$class."Controller');<br>");
            // Put contents
            ob_start();
            include(BASE_DIR."base/controller.php");
            file_put_contents($controller, ob_get_contents());
            ob_get_clean();
            
            ob_start();
            include(BASE_DIR."base/model.php");
            file_put_contents($model, ob_get_contents());
            ob_get_clean();
            
            ob_start();
            include(BASE_DIR."base/test.php");
            file_put_contents($test, ob_get_contents());
            ob_get_clean();

            ob_start();
            include(BASE_DIR."base/web.php");
            file_put_contents($web, ob_get_contents());
            ob_get_clean();
            
            //print_arr($fields);
            ob_start();
            include(BASE_DIR."base/index.php");
            file_put_contents($index, ob_get_contents());
            ob_get_clean();

            ob_start();
            include(BASE_DIR."base/edit.php");
            file_put_contents($edit, ob_get_contents());
            ob_get_clean();

            ob_start();
            include(BASE_DIR."base/create.php");
            file_put_contents($add, ob_get_contents());
            ob_get_clean();

            ob_start();
            include(BASE_DIR."base/sidebar.php");
            file_put_contents($sidebar, ob_get_contents());
            ob_get_clean();

        }
        
        ob_start();
        include(BASE_DIR."base/main.php");
        file_put_contents($main, ob_get_contents());
        ob_get_clean();

        // $file_contents = file_get_contents($file_path."application/config/database.php");
        // $file_contents = str_replace("db_name", $db_name, $file_contents);
        // file_put_contents($file_path."application/config/database.php", $file_contents);

        echo "<a href='".OUTPUT_URL.$db_name."/public'> Launch $db_name </a>";
        exit;
    }

    public function gen_queries($db_name)
    {

        // $this->db->close();
        // $dsn = 'mysql://root:@localhost/$db_name';
        // $this->load->database($dsn);

        // $this->create_dir(OUTPUT_DIR,$db_name);
        $ROW=array();
        $TABLES=$this->db->query("Show TABLES")->result_array();
        
        exec("cp -r ".BASE_DIR."base/ci_base ".OUTPUT_DIR.$db_name);
        
        for ($i=0; $i < $TABLES[0]['nrows']; $i++) {
            
            $fields=$this->db->query("DESCRIBE ".$TABLES[$i]['Tables_in_'.$db_name])->result_array();
            $table_name=$TABLES[$i]['Tables_in_'.$db_name];

            // Get primary key and unique key
            $pk = $this->db->query("SELECT column_name FROM information_schema.COLUMNS WHERE table_name = '$table_name' AND table_schema = '".$db_name."' AND column_key='PRI'")->result_array();
            $pk = $this->get_arg($pk[0], 'column_name');
            // $uk = $this->db->query("SELECT column_name FROM information_schema.COLUMNS WHERE table_name = '$table_name' AND table_schema = '".$db_name."' AND column_key='UNI'")->result_array()[0]['column_name'];
            
            $table=strtolower($TABLES[$i]['Tables_in_'.$db_name]);
            $module=substr(preg_replace('/(?<!\ )[A-Z]/', ' $0', $TABLES[$i]['Tables_in_'.$db_name]),1);
            echo "<br><br><br><br>**********$table_name***************<br><br><br><br>";
            $fn = $fv = $fvars = $frep = array();
            for ($z=0; $z < $fields[0]['nrows']; $z++) {
                array_push($fn, $fields[$z]['Field']);
                array_push($fvars, "$".$fields[$z]['Field']);
                array_push($frep, $fields[$z]['Field']."='$".$fields[$z]['Field']."'");
            }

            $field_names=implode(',', $fn);
            $field_vars=implode(',', $fvars);
            $field_vars1=sprintf("'%s'", implode("','", $fvars));
            $field_rep=implode(',', $frep);
            echo $field_names."<br><br>";
            echo $field_vars."<br><br>";
            echo $field_rep;


            $privatekey="";
            $file_path=OUTPUT_DIR.$db_name.'/';


            
            //Create directories
            $this->create_dir($file_path,'queries');
            $sql = $file_path."queries/$table_name.php";

            $file = fopen($sql,"w+");
            fwrite($file, $privatekey);
            fclose($file);

            ob_start();
            include(BASE_DIR."base/sql.php");
            file_put_contents($sql, ob_get_contents());
            ob_get_clean();
            // $sql = "INSERT 
        //      INTO 
         //             $table_name 
            //  $fields
            //  VALUES 
            //  ($field_values)";
            // echo ""
        }
    }

    public function print_arr($arr) {
        echo "<pre>ARR=[".print_r($arr,true)."]</pre>";
    }

    function get_arg($ARR,$var) {
        if (isset($ARR[$var])) { 
            return $ARR[$var]; 
        } else {
            return "";
        }
    }

    public function create_dir($existpath,$newdir){ 
        //CHECKING PATH EXISTING OR NOT
        if (file_exists($existpath)) {
            if(file_exists($existpath.'/'.$newdir)){
                return true;
            }
            mkdir($existpath.'/'.$newdir, 0777, true);
        } else { return false;  }   // IF PATH NOT EXISTING RETURNING FALSE 
        return true;    
    }
}
