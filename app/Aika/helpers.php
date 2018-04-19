<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/13/2018
 * Time: 10:59 AM
 */



/**
 * @param array $path
 * @param string $v
 * @return bool|string
 */

if (!function_exists('add_scripts'))
{
    function add_scripts(array $path, $v = '')
    {

        $publicDir = isset($path['public']) ? $path['public'] : null;
        $viewsDir = isset($path['views']) ? $path['views'] : null;

        if ($v == '') {
            $ver = '';
        }
        else {
            $ver = '?ver=' . $v;
        }
        $gen = '';

        if (isset($path['views']) && is_array($path['views'])) {
            foreach ($path['views'] as $file) {
                $gen .= '<script type="text/javascript" src="' . url('resources/views/' . $file . '.js' . $ver) . '"></script>';
            }
        }
        elseif ($viewsDir) {
            $gen .= "<script type='text/javascript' src='" . url("resources/views/{$viewsDir}.js" . $ver) . "'></script>";
        }

        if (isset($path['public']) && is_array($path['public'])) {
            foreach ($path['public'] as $file) {
                $gen .= "<script type='text/javascript' src='" . url("public/assets/{$file}.js" . $ver) . "'></script>";
            }
        }
        elseif ($publicDir) {
            $gen .= "<script type='text/javascript' src='" . url("public/assets/{$publicDir}.js" . $ver) .
                "'></script>";
        }

        if (isset($path['links']) && is_array($path['links'])) {
            foreach ($path['links'] as $file) {
                $gen .= "<script type='text/javascript' src='{$file}{$ver}'></script>";
            }
        }
        elseif (isset($path['links'])) {
            $gen .= "<script type='text/javascript' src='{$path['links']}{$ver}'></script>";
        }

        return $gen;
    }
}

if (!function_exists('add_styles'))
{
    function add_styles(array $path, $v = '')
    {

        $publicDir = isset($path['public']) ?? $path['public'];
        $viewsDir = isset($path['views']) ?? $path['views'];

        if ($v == '') {
            $ver = '';
        }
        else {
            $ver = '?ver=' . $v;
        }
        $gen = '';

        if (isset($path['views']) && is_array($path['views'])) {
            foreach ($path['views'] as $file) {
                $gen .= "<link rel='stylesheet' href='" . url("resources/views/{$file}.css" . $ver) . "'>";
            }
        }
        elseif ($viewsDir) {
            $gen .= "<link rel='stylesheet' href='" . url("resources/views/{$path['views']}.css" . $ver) . "'>";
        }

        if (isset($path['public']) && is_array($path['public'])) {
            foreach ($path['public'] as $file) {
                $gen .= "<link rel='stylesheet' href='" . url("public/assets/{$file}.css" . $ver) . "'>";
            }
        }
        elseif ($publicDir) {
            $gen .= "<link rel='stylesheet' href='" . url("public/assets/{$path['public']}.css" . $ver) . "'>";
        }

        if (isset($path['links']) && is_array($path['links'])) {
            foreach ($path['links'] as $file) {
                $gen .= "<link rel='stylesheet' href='{$file}{$ver}'>";
            }
        }
        elseif (isset($path['links'])) {
            $gen .= "<link rel='stylesheet' href='{$path['links']}{$ver}'>";
        }

        return $gen;
    }
}
/**
 * @param null $type
 * @param $message | The contents to display as flash
 */
if (!function_exists('alert')) {
    function alert(string $type = null, $message)
    {

        if ($type == 's' || $type == 'success') {
            session()->flash('notice', "<div class='alert c-alert c-alert--success'><i class='c-alert__icon fa fa-check-circle'></i> 
            {$message}
            <button class='c-close' data-dismiss='alert' type='button'>×</button>
            </div>");
        }
        elseif ($type == 'e' || $type == 'error') {
            session()->flash('notice', "<div class='alert c-alert c-alert--danger'><i class='c-alert__icon fa fa-times-circle'></i> 
            {$message}
            <button class='c-close' data-dismiss='alert' type='button'>×</button>
            </div>");
        }
        elseif ($type == 'w' || $type == 'warning') {
            session()->flash('notice', "<div class='alert c-alert c-alert--warning'><i class='c-alert__icon fa fa-warning-circle'></i> 
            {$message}
            <button class='c-close' data-dismiss='alert' type='button'>×</button>
            </div>");
        }
        elseif ($type == 'n' || $type == 'i' || $type == 'notice' || $type == 'info') {
            session()->flash('notice', "<div class='alert c-alert c-alert--info'><i class='c-alert__icon fa fa-times-circle'></i> 
            {$message}
            <button class='c-close' data-dismiss='alert' type='button'>×</button>
            </div>");
        }
        elseif ($type == 'notify') {
            if (is_array($message)) {
                if (isset($message["onShown"])) {
                    $message['onShown'] = str_replace('"', '', $message['onShown']);
                }
                $msg = json_encode($message);
                session()->flash('kNotify', "kNotify({$msg});");
            }
        }
        elseif ($type == '_success') {
            session()->flash('kNotify', "kNotify({type: 'success', message: '{$message}'});");
        }
        elseif ($type == '_error') {
            session()->flash('kNotify', "kNotify({type: 'danger', message: '{$message}'});");
        }
        elseif ($type == '_info') {
            session()->flash('kNotify', "kNotify({type: 'info', message: '{$message}'});");
        }
        elseif ($type == '_warning') {
            session()->flash('kNotify', "kNotify({type: 'warning', message: '{$message}'});");
        }
        else {
            session()->flash('notice', "<div class='alert alert-info mt-5'><a class='close'  data-dismiss='alert'></a><b><i uk-icon='icon: info'></i> Notice</b><br/> {$message}</div>");
        }
    }
}

/**
 * Generate random numeric values. Specify length to control the number characters to show.
 * @param int $length
 * @return int
 */
function random_numbers($length = 7)
{
    $result = substr(str_shuffle(str_repeat('0123456789', $length)), 0, $length);

    return (integer) $result;
}

if (!function_exists('get')) {
    function get($index)
    {
        return isset($_GET[$index]) ? trim($_GET[$index]) : null;
    }
}

if (!function_exists('post')) {
    function post($index)
    {
        return isset($_POST[$index]) ? trim($_POST[$index]) : null;
    }
}

/**
 * @param string $from
 * @return \App\Aika\Configs\SMSConfig\SMSConfig
 */
function aikasms($from = '') {
    $instance = new \App\Aika\Configs\SMSConfig\SMSConfig();
    if ($from != '') {
        $instance->from($from);
    }

    return $instance;
}

if (!function_exists('auths')) {
    function auths() {
        $socialAuth = \Illuminate\Support\Facades\Auth::guard('socialite');
        $userAuth = \Illuminate\Support\Facades\Auth::guard('web');

        if ($socialAuth->check()) {
            return $socialAuth;
        }
        if ($userAuth->check()) {
            return $userAuth;
        }

        return auth();
    }
}

