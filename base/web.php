<?php echo '<?php'; ?>

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('admin/system/user', 'UserController');

    Route::get('admin/setting', 'SystemSettingController@settingsEdit');
    Route::post('admin/setting', 'SystemSettingController@settingsUpdate');

    // Crud
<?php for ($m=0; $m < $TABLES[0]['nrows']; $m++) { ?>
    Route::resource('admin/<?php echo $TABLES[$m]['Tables_in_'.$db_name]; ?>', '<?php echo str_replace(" ", '', ucwords(str_replace('_', ' ', $TABLES[$m]['Tables_in_'.$db_name]))); ?>Controller');
<?php } ?>
});