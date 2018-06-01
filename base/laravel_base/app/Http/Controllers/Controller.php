<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $SETTINGS = array();

    protected function view($view, $data = [])
    {
        return view($this->viewDir . "." . $view, $data);
    }

    public function __construct()
    {
        // To fetch and save settings in to SETTINGS array
        $settings = Setting::select("key", "value")
            ->get();
        foreach ($settings as $setting) {
            $this->SETTINGS[$setting->key] = $setting->value;
        }

        // To set the title
        $route = \Request::route()->getName();
        $title = "";
        if ($route) {
            $route = explode('.', $route);
            $title = ucwords(str_replace('_', ' ', $route[0])) . 's';
        }
        view()->share('siteTitle', $title);
        view()->share('route', $route[0]);
    }
}
