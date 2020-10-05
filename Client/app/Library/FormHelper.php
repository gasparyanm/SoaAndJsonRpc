<?php

namespace Library;

class FormHelper
{
    public static function form()
    {
        $form = view('form');
        return $form->render();
    }
}
