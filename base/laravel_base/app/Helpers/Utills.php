<?php

function make_input_text($errors, $label, $type, $name, $value = null, $attrs = array())
{
    $class = 'form-control ';
    if ($type == '') {
        $type = 'text';
    } elseif ($type == 'checkbox') {
        $class .= ' m-t-10';
    }

    $attrs['name'] = $name;
    if (!isset($attrs['id'])) {
        $attrs['id'] = $name;
    }

    $attrs_html = '';
    $required_span = "";
    $has_right_side_bar = 0;
    foreach ($attrs as $key => $val) {
        if ($key == 'class') {
            $class .= $val;
            continue;
        } elseif ($key == 'right_side_bar') {
            $has_right_side_bar = 1;
            continue;
        }

        $attrs_html .= $key . '="' . $val . '" ';
        if ($key == 'required') {
            $required_span = " <span class='error'>*</span>";
        }
    }

    $class1 = 'col-sm-3';
    $class2 = 'col-sm-6';
    // if ($has_right_side_bar) {
    //     $class1 = 'col-sm-3';
    //     $class2 = 'col-sm-7';
    // }

    $error_block = "";
    if ($errors->has($name)) {
        $error_block .= "<span class='help-block'><strong>";
        $error_block .= $errors->first($name) . "</strong></span>";
    }

    $has_error = $errors->has($name) ? ' has-error' : '';
    return "<div class='form-group has-feedback $has_error'>
                <label for='$name' class='$class1 control-label'>$label$required_span</label>
                <div class='$class2'>
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
    $class = "form-control ";
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
        if ($key == 'class') {
            $class .= $val;
            continue;
        } elseif ($key == 'required') {
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
                    <select class='$class' $attrs_html>
                        $options
                    </select>
                    $error_block
                </div>
            </div>";
}

function make_input_select_multiple($errors, $label, $name, $data = array(), $value = null, $attrs = array())
{
    $options = "";
    $class = "form-control ";

    $attrs['name'] = $name.'[]';
    if (!isset($attrs['id'])) {
        $attrs['id'] = $name;
    }

    $attrs_html = '';
    $required_span = "";
    foreach ($attrs as $key => $val) {
        $attrs_html .= $key . '="' . $val . '" ';
        if ($key == 'class') {
            $class .= $val;
            continue;
        } elseif ($key == 'required') {
            $required_span = " <span class='error'>*</span>";
        }
    }

    $error_block = "";
    if ($errors->has($name)) {
        $error_block .= "<span class='help-block'><strong>";
        $error_block .= $errors->first($name) . "</strong></span>";
    }

    $value = explode('|', $value);
    foreach ($data as $key => $val) {
        $selected = "";
        for ($b=0; $b<count($value)&&$selected==''; $b++) {
            if ($key == old($name, $value[$b])) {
                $selected = "selected";
            }
        }
        $options .= "<option value='$key' $selected>$val</option>";
    }

    $has_error = $errors->has($name) ? ' has-error' : '';

    return "<div class='form-group has-feedback $has_error'>
                <label for='$name' class='col-sm-3 control-label'>$label$required_span</label>
                <div class='col-sm-6'>
                    <select class='$class' $attrs_html multiple>
                        $options
                    </select>
                    $error_block
                </div>
            </div>";
}

function make_input_radio($errors, $label, $name, $data, $value = null, $attrs = array())
{
    $options = "";

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

    foreach ($data as $key => $val) {
        $selected = "";
        if ($key == old($name, $value)) {
            $selected = "checked";
        }
        $options .= "<div class='radio pull-left m-r-20'>
                    <label>
                      <input  type='radio' name='$name' value='$key' $selected $attrs_html>$val</label></div>";
    }

    $error_block = "";
    if ($errors->has($name)) {
        $error_block .= "<span class='help-block'><strong>";
        $error_block .= $errors->first($name) . "</strong></span>";
    }

    $has_error = $errors->has($name) ? ' has-error' : '';

    return "<div class='form-group has-feedback $has_error'>
                <label for='$name' class='col-sm-3 control-label'>$label $required_span</label>
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

function state_dropdown($selected = null)
{

    $states = array(
        "Alabama",
        "Alaska",
        "American Samoa",
        "Arizona",
        "Arkansas",
        "California",
        "Colorado",
        "Connecticut",
        "Delaware",
        "District of Columbia",
        "Florida",
        "Georgia",
        "Guam",
        "Hawaii",
        "Idaho",
        "Illinois",
        "Indiana",
        "Iowa",
        "Kansas",
        "Kentucky",
        "Louisiana",
        "Maine",
        "Maryland",
        "Massachusetts",
        "Michigan",
        "Minnesota",
        "Mississippi",
        "Missouri",
        "Montana",
        "Nebraska",
        "Nevada",
        "New Hampshire",
        "New Jersey",
        "New Mexico",
        "New York",
        "North Carolina",
        "North Dakota",
        "Northern Marianas Islands",
        "Ohio",
        "Oklahoma",
        "Oregon",
        "Pennsylvania",
        "Puerto Rico",
        "Rhode Island",
        "South Carolina",
        "South Dakota",
        "Tennessee",
        "Texas",
        "Utah",
        "Vermont",
        "Virginia",
        "Virgin Islands",
        "Washington",
        "West Virginia",
        "Wisconsin",
        "Wyoming",
    );

    $options = array();

    if ($selected && in_array($selected, $states)) {
        $options[$selected] = $selected;
    }
    $options[''] = ' - ';

    foreach ($states as $c) {
        if ($selected != $c) {
            $options[$c] = $c;
        }

    }

    // return form_dropdown($name, $options, $selected, $additional);
    return $options;

}

function country_dropdown($selected = null)
{

    $countries = array(
        "Afghanistan",
        "Albania",
        "Algeria",
        "Andorra",
        "Angola",
        "Antigua & Deps",
        "Argentina",
        "Armenia",
        "Australia",
        "Austria",
        "Azerbaijan",
        "Bahamas",
        "Bahrain",
        "Bangladesh",
        "Barbados",
        "Belarus",
        "Belgium",
        "Belize",
        "Benin",
        "Bhutan",
        "Bolivia",
        "Bosnia Herzegovina",
        "Botswana",
        "Brazil",
        "Brunei",
        "Bulgaria",
        "Burkina",
        "Burundi",
        "Cambodia",
        "Cameroon",
        "Canada",
        "Cape Verde",
        "Central African Rep",
        "Chad",
        "Chile",
        "China",
        "Colombia",
        "Comoros",
        "Congo",
        "Congo",
        "Costa Rica",
        "Croatia",
        "Cuba",
        "Cyprus",
        "Czech Republic",
        "Denmark",
        "Djibouti",
        "Dominica",
        "Dominican Republic",
        "East Timor",
        "Ecuador",
        "Egypt",
        "El Salvador",
        "Equatorial Guinea",
        "Eritrea",
        "Estonia",
        "Ethiopia",
        "Fiji",
        "Finland",
        "France",
        "Gabon",
        "Gambia",
        "Georgia",
        "Germany",
        "Ghana",
        "Greece",
        "Grenada",
        "Guatemala",
        "Guinea",
        "Guinea-Bissau",
        "Guyana",
        "Haiti",
        "Honduras",
        "Hungary",
        "Iceland",
        "India",
        "Indonesia",
        "Iran",
        "Iraq",
        "Ireland",
        "Israel",
        "Italy",
        "Ivory Coast",
        "Jamaica",
        "Japan",
        "Jordan",
        "Kazakhstan",
        "Kenya",
        "Kiribati",
        "Korea North",
        "Korea South",
        "Kosovo",
        "Kuwait",
        "Kyrgyzstan",
        "Laos",
        "Latvia",
        "Lebanon",
        "Lesotho",
        "Liberia",
        "Libya",
        "Liechtenstein",
        "Lithuania",
        "Luxembourg",
        "Macedonia",
        "Madagascar",
        "Malawi",
        "Malaysia",
        "Maldives",
        "Mali",
        "Malta",
        "Marshall Islands",
        "Mauritania",
        "Mauritius",
        "Mexico",
        "Micronesia",
        "Moldova",
        "Monaco",
        "Mongolia",
        "Montenegro",
        "Morocco",
        "Mozambique",
        "Myanmar",
        "Namibia",
        "Nauru",
        "Nepal",
        "Netherlands",
        "New Zealand",
        "Nicaragua",
        "Niger",
        "Nigeria",
        "Norway",
        "Oman",
        "Pakistan",
        "Palau",
        "Panama",
        "Papua New Guinea",
        "Paraguay",
        "Peru",
        "Philippines",
        "Poland",
        "Portugal",
        "Qatar",
        "Romania",
        "Russian Federation",
        "Rwanda",
        "St Kitts & Nevis",
        "St Lucia",
        "Saint Vincent & the Grenadines",
        "Samoa",
        "San Marino",
        "Sao Tome & Principe",
        "Saudi Arabia",
        "Senegal",
        "Serbia",
        "Seychelles",
        "Sierra Leone",
        "Singapore",
        "Slovakia",
        "Slovenia",
        "Solomon Islands",
        "Somalia",
        "South Africa",
        "Spain",
        "Sri Lanka",
        "Sudan",
        "Suriname",
        "Swaziland",
        "Sweden",
        "Switzerland",
        "Syria",
        "Taiwan",
        "Tajikistan",
        "Tanzania",
        "Thailand",
        "Togo",
        "Tonga",
        "Trinidad & Tobago",
        "Tunisia",
        "Turkey",
        "Turkmenistan",
        "Tuvalu",
        "Uganda",
        "Ukraine",
        "United Arab Emirates",
        "United Kingdom",
        "United States",
        "Uruguay",
        "Uzbekistan",
        "Vanuatu",
        "Vatican City",
        "Venezuela",
        "Vietnam",
        "Yemen",
        "Zambia",
        "Zimbabwe",
    );

    $options = array();

    if ($selected && in_array($selected, $countries)) {
        $options[$selected] = $selected;
    }
    $options[''] = ' - ';

    foreach ($countries as $c) {
        if ($selected != $c) {
            $options[$c] = $c;
        }

    }

    // return form_dropdown($name, $options, $selected, $additional);

    return $options;

}



function widget_volunteer_availability_admin($label, $row)
{
    $days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
    $header_row = $morning_row = $afternoon_row = array();
    
    $header_row[] = '&nbsp;';
    $morning_row[] = "Morning";
    $afternoon_row[] = "Afternoon";
    $evening_row[] = "Evening";
    
    foreach ($days as $d) {
        
        $header_row[] = substr(strtoupper($d), 0, 3);
        
        $checked = old($d . '_morning', $row->{$d . '_morning'});
            
        $tmp_m_r = array(
            'id' => $d . "_morning",
            'name' => $d . "_morning",
            'value' => '1',
            'checked' => $checked
        );
        
        $morning_row[] = form_checkbox($tmp_m_r);
        
        $checked = old($d . '_afternoon', $row->{$d . '_afternoon'});
            
        $tmp_a_r = array(
            'id' => $d . "_afternoon",
            'name' => $d . "_afternoon",
            'value' => '1',
            'checked' => $checked
        );
        
        $afternoon_row[] = form_checkbox($tmp_a_r);

        $checked = old($d . '_evening', $row->{$d . '_evening'});
            
        $tmp_e_r = array(
            'id' => $d . "_evening",
            'name' => $d . "_evening",
            'value' => '1',
            'checked' => $checked
        );
        
        $evening_row[] = form_checkbox($tmp_e_r);
        
    }
    
    $header_row = implode("</th><th>", $header_row);
    $morning_row = implode("</td><td>", $morning_row);
    $afternoon_row = implode("</td><td>", $afternoon_row);
    $evening_row = implode("</td><td>", $evening_row);
    
    $input = <<<EOF


            <table class="table table-hover">
                <tr>
                    <td>$header_row</td>
                </tr>
                <tr>
                    <td>$morning_row</td>
                </tr>
                <tr>
                    <td>$afternoon_row</td>
                </tr>
                <tr>
                    <td>$evening_row</td>
                </tr>

            </table>
        
EOF;

    return "<div class='form-group has-feedback'>
        <label for='referred_from' class='col-sm-3 control-label'>$label</label>
        <div class='col-sm-2'>
            $input
        </div>
    </div>";
    
    return $output;
}

function form_checkbox($attrs)
{
    $attrs_html = '';
    foreach ($attrs as $key => $val) {
        if ($key=='checked'&&$val!=1) {
            continue;
        }
        $attrs_html .= $key . '="' . $val . '" ';
    }
    return "<input type='checkbox' $attrs_html>";
}
