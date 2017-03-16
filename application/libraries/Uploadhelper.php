<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadhelper
{


    public function get_upload_path($section, $date)
    {
        if ($section == 'news') {
            $year = date('Y', strtotime($date));
            $path = UPLOADPATH . $section . DIRECTORY_SEPARATOR . $year . DIRECTORY_SEPARATOR;
        } else {
            $path = UPLOADPATH . $section . DIRECTORY_SEPARATOR;
        }

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        return $path;

    }
}