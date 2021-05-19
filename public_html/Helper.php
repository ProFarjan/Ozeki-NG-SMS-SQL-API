<?php


class Helper
{

    public function dd($data,$IS_DIE=FALSE)
    {
        print_r('<pre>');
        print_r($data);
        print_r('</pre>');
        if ($IS_DIE){
            die();
        }
    }

}