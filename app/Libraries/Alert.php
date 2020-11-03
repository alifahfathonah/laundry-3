<?php namespace App\Libraries;

class Alert
{
    public static function danger($msg)
    {
        return '
          <div class="alert alert-danger" role="alert">
            ' . $msg . '
          </div>
          ';
    }

    public static function success($msg)
    {
        return '
          <div class="alert alert-success" role="alert">
            ' . $msg . '
          </div>
        ';
    }

    public static function info($msg)
    {
        return '
          <div class="alert alert-info" role="alert">
            ' . $msg . '
          </div>
        ';
    }
    public static function warning($msg)
    {
        return '
          <div class="alert alert-warning" role="alert">
            ' . $msg . '
          </div>
        ';
    }
}
