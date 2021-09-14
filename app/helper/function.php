<?php
if (!function_exists('showError')) {
    function showError($errors, $name)
    {
        if ($errors->has($name)) {
            return '<div class="alert alert-danger addalert" role="alert">
                        <strong>' . $errors->first($name) . '</strong>
                    </div>';
        }
    }
}
