<?php
namespace App\Helpers;

class Helper
{
    public static function createFlashMessage($message, $className = "info")
    {
        session()->flash('className', "alert ". "alert-" . $className);
        session()->flash('message', $message);
    }

    public static function displayFlashMessage($element = 'div')
    {
        $message = session('message');
        $className = session('className');
        if($message)
            return "<div class='{$className}'>{$message}</div>";
        else
            return;
    }

}
