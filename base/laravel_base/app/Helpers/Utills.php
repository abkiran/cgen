<?php

function make_input_text($errors, $label, $type, $name, $value = null, $attrs = array())
{
    $class = 'form-control';
    if ($type == '') {
        $type = 'text';
    } elseif ($type == 'checkbox') {
        $class = 'm-t-10';
    }

    $attrs['name'] = $name;
    if (!isset($attrs['id'])) {
        $attrs['id'] = $name;
    }

    $attrs_html = '';
    $required_span = "";
    foreach ($attrs as $key => $val) {
        $attrs_html .= $key . '="' . $val . '" ';
        if ($key == 'required') {
            $required_span = " <span class='error'>*</span>";
        }
    }

    $error_block = "";
    if ($errors->has($name)) {
        $error_block .= "<span class='help-block'><strong>";
        $error_block .= $errors->first($name) . "</strong></span>";
    }

    $has_error = $errors->has($name) ? ' has-error' : '';
    return "<div class='form-group has-feedback $has_error'>
                <label for='$name' class='col-sm-3 control-label'>$label$required_span</label>
                <div class='col-sm-6'>
                    <input type='$type' class='$class' placeholder='$label' value='" . old($name, $value) . "' $attrs_html>
                    $error_block
                </div>
            </div>";
}

function make_input_textarea($errors, $label, $name, $value = null, $attrs = array())
{

    $attrs['name'] = $name;
    if (!isset($attrs['id'])) {
        $attrs['id'] = $name;
    }

    $attrs_html = '';
    $required_span = "";
    foreach ($attrs as $key => $val) {
        $attrs_html .= $key . '="' . $val . '" ';
        if ($key == 'required') {
            $required_span = " <span class='error'>*</span>";
        }
    }

    $error_block = "";
    if ($errors->has($name)) {
        $error_block .= "<span class='help-block'><strong>";
        $error_block .= $errors->first($name) . "</strong></span>";
    }

    $has_error = $errors->has($name) ? ' has-error' : '';
    return "<div class='form-group has-feedback $has_error'>
                <label for='$name' class='col-sm-3 control-label'>$label$required_span</label>
                <div class='col-sm-6'>
                    <textarea class='form-control' placeholder=\"" . $label . "\" $attrs_html>" . old($name, $value) . "</textarea>
                    $error_block
                </div>
            </div>";
}

function make_input_select($errors, $label, $name, $data = array(), $value = null, $attrs = array())
{
    $options = "";
    foreach ($data as $key => $val) {
        $selected = "";
        if ($key == old($name, $value)) {
            $selected = "selected";
        }
        $options .= "<option value='$key' $selected>$val</option>";
    }

    $attrs['name'] = $name;
    if (!isset($attrs['id'])) {
        $attrs['id'] = $name;
    }

    $attrs_html = '';
    $required_span = "";
    foreach ($attrs as $key => $val) {
        $attrs_html .= $key . '="' . $val . '" ';
        if ($key == 'required') {
            $required_span = " <span class='error'>*</span>";
        }
    }

    $error_block = "";
    if ($errors->has($name)) {
        $error_block .= "<span class='help-block'><strong>";
        $error_block .= $errors->first($name) . "</strong></span>";
    }

    $has_error = $errors->has($name) ? ' has-error' : '';

    return "<div class='form-group has-feedback $has_error'>
                <label for='$name' class='col-sm-3 control-label'>$label$required_span</label>
                <div class='col-sm-6'>
                    <select class='form-control' $attrs_html>
                        $options
                    </select>
                    $error_block
                </div>
            </div>";
}

function make_input_radio($errors, $label, $name, $data, $value = null, $attrs = array())
{
    $options = "";
    foreach ($data as $key => $val) {
        $selected = "";
        if ($key == old($name, $value)) {
            $selected = "checked";
        }
        $options .= "<div class='radio pull-left m-r-20'>
                    <label>
                      <input  type='radio' name='$name' id='$name' value='$key' $selected>$val</label></div>";
    }

    $attrs['name'] = $name;
    if (!isset($attrs['id'])) {
        $attrs['id'] = $name;
    }

    $attrs_html = '';
    foreach ($attrs as $key => $val) {
        $attrs_html .= $key . '="' . $val . '" ';
    }

    $error_block = "";
    if ($errors->has($name)) {
        $error_block .= "<span class='help-block'><strong>";
        $error_block .= $errors->first($name) . "</strong></span>";
    }

    $has_error = $errors->has($name) ? ' has-error' : '';

    return "<div class='form-group has-feedback $has_error'>
                <label for='$name' class='col-sm-3 control-label'>$label</label>
                <div class='col-sm-6'>
                    $options
                    $error_block
                </div>
            </div>";
}

function get_setting($key)
{
    if (isset(app('\App\Http\Controllers\Controller')->SETTINGS[$key])) {
        return app('\App\Http\Controllers\Controller')->SETTINGS[$key];
    }
    return 0;
}
