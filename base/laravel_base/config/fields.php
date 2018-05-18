<?php

return
[
    'visits' => array(
            'salutation' => array(
                'label' => 'Salutation',
                'weight' => -96,
                'widget'=> array(
                    'function' => 'form_dropdown',
                    'options' => array(
                        '' => ' - ',
                        'Mr.' => 'Mr.',
                        'Mrs.' => 'Mrs.',
                        'Ms.' => 'Ms.'
                    )
                )
            ),
            'first_name' => array(
                'label' => 'First Name',
                'weight' => -95,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'last_name' => array(
                'label' => 'Last Name',
                'weight' => -90,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'email' => array(
                'label' => 'Email',
                'weight' => -85,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'email_2' => array(
                'label' => 'Repeat Email',
                'weight' => -83,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'address_1' => array(
                'label' => 'Street Address',
                'weight' => -80,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'address_2' => array(
                'label' => "",
                'weight' => -75,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'city' => array(
                'label' => 'City',
                'weight' => -70,
                'widget' => array(
                    'function' => 'form_input',
                )
            ),
            'state_province' => array(
                'label' => 'State / Province',
                'weight' => -65,
                'widget' => array(
                    'function' => 'widget_input_autocomplete',
                    'single_value' => true,
                    // 'options' => state_dropdown()
                )
            ),
            'postal_code' => array(
                'label' => 'ZIP / Postal Code',
                'weight' => -60,
                'widget' => array(
                    'function' => 'form_input',
                )
            ),
            'country' => array(
                'label' => 'Country',
                'weight' => -55,
                'widget' => array(
                    'function' => 'form_dropdown',
                    // 'options' => country_dropdown('United States'),
                )
            ),
            'phone_1' => array(
                'label' => 'Phone 1',
                'weight' => -50,
                'widget' => array(
                    'function'=>'widget_phone_number',
                    'params' => array(
                        'size' => '12',
                        'type_options' => array(
                            '' => ' - ',
                            'home'=>'Home',
                            'work'=>'Work',
                            'mobile'=>'Mobile',
                            'other'=>'Other'
                        )
                    )
                ),
            ),
            'phone_1_type' => array(
                'label' => 'Phone 1 Type',
                'weight' => -49,
                'hidden' => true
            ),
            'phone_2' => array(
                'label' => 'Phone 2',
                'weight' => -45,
                'widget' => array(
                    'function'=>'widget_phone_number',
                    'params' => array(
                        'size' => '12',
                        'type_options' => array(
                            '' => ' - ',
                            'home'=>'Home',
                            'work'=>'Work',
                            'mobile'=>'Mobile',
                            'other'=>'Other'
                        )
                    )
                ),
            ),
            'phone_2_type' => array(
                'label' => 'Phone 2 Type',
                'weight' => -44,
                'hidden' => true,
            ),
            'group_info' => array(
                'label' => 'Tell us about yourself and/or your group',
                'weight' => -40,
                'widget' => array(
                    'function'=>'widget_group_info',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40'
                    )
                ),
            ),
            'number_adults' => array(
                'label' => '# of Adults',
                'weight' => -35,
                'widget'=> array(
                    'function' => 'widget_age_counts',
                    'options' => range(0, 6)
                )
            ),
            'number_children' => array(
                'hidden' => true,
                'label' => '# of Children',
                'weight' => -30,
                'widget'=> array(
                    'function' => 'form_dropdown',
                    'options' => range(0, 5)
                )
            ),
            'age_ranges' => array(
                'label' => 'Age Ranges of Your Group',
                'weight' => -25,
                'widget'=> array(
                    'function' => 'widget_age_ranges',
                    'options'=> array(
                        '0-3',
                        '4-6',
                        '7-12',
                        '13-17',
                        '18-30',
                        '31-45',
                        '46-65',
                        '66+'
                    )
                )
            ),
            'arrival_date' => array(
                'label' => 'Arrival',
                'weight' => -20,
                'widget' => array(
                    'function' => 'widget_date_selector'
                )
            ),
            'departure_date' => array(
                'label' => 'Departure',
                'weight' => -15,
                'widget' => array(
                    'function' => 'widget_date_selector'
                )
            ),
            'visit_date_time_1' => array(
                'label' => '1st Choice',
                'weight' => -10,
                'widget' => array(
                    'function' => 'widget_visit_preference_selector'
                )
            ),
            'visit_date_time_2' => array(
                'label' => '2nd Choice',
                'weight' => -5,
                'widget' => array(
                    'function' => 'widget_visit_preference_selector'
                )
            ),
            'visit_date_time_3' => array(
                'label' => '3rd Choice',
                'weight' => 0,
                'widget' => array(
                    'function' => 'widget_visit_preference_selector'
                )
            ),

            'accommodation'=>array(
                'label' => "Accommodations",
                'weight' => 10,
                'widget' => array(
                    'function'=>'widget_label_embed',
                    'label' => "I am staying [FORM_ELEMENT] when I'm in Chicago",
                    'params' => array(
                        'function'=>'form_dropdown',
                        'params' => array(
                            'options'=>array(
                                'hotel' => 'at a hotel',
                                'friend_relative' => 'with a friend or relative',
                                'vacation_rental' => 'at a vacation rental',
                                'other' => 'somewhere else'
                            ),
                            'extra' =>"onChange=\"swap_accommodation_type();\" id=\"accommodation\""
                        )
                    )
                )
            ),
            'accommodation_hotel_name' => array(
                'label' => 'Hotel Name',
                'weight' => 20,
                'widget' => array(
                    'function' => 'form_input',
                    'style' => 'rows',
                    'params' => array(
                        'size' => '40',
                    )
                )
            ),
            'accommodation_hotel_reservation_name' => array(
                'label' => 'Name on the hotel reservation',
                'weight' => 26,
                'widget' => array(
                    'function' => 'form_input',
                    'style' => 'rows',
                    'params' => array(
                        'size' => '40',
                    )
                )
            ),
            'accommodation_hotel_address' => array(
                'label' => 'Hotel Address',
                'weight' => 24,
                'widget' => array(
                    'function' => 'form_input',
                    'style'=> 'rows',
                    'params' => array(
                        'size' => '40',
                    )
                )
            ),
            'accommodation_hotel_city' => array(
                'label' => 'Hotel City',
                'weight' => 23,
                'widget' => array(
                    'function' => 'form_input',
                    'style' => 'rows',
                    'params' => array(
                        'size' => '40',
                    )
                )
            ),
            'accommodation_hotel_phone' => array(
                'label' => 'Hotel Phone Number',
                'weight' => 25,
                'widget' => array(
                    'function' => 'form_input',
                    'style' => 'rows',
                    'params' => array(
                        'size' => '40',
                    )
                )
            ),
            'accommodation_friend_relative_address_1' => array(
                'label' => 'Local Address',
                'weight' => 30,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30',
                    )
                )
            ),
            'accommodation_friend_relative_address_2' => array(
                'label' => null,
                'weight' => 35,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30',
                    )
                )
            ),
            'accommodation_friend_relative_city' => array(
                'label' => 'City / State / Zip',
                'weight' => 40,
                'widget' => array(
                    'function' => 'widget_city_state_zip',
                    'params' => array(
                        'key'=>'accommodation_friend_relative',
                        'show_international' => false
                    )
                )
            ),
            'accommodation_friend_relative_state_province' => array(
                'label' => null,
                'weight' => 45,
                'hidden' => true,
                'widget' => null
            ),
            'accommodation_friend_relative_postal_code' => array(
                'label' => null,
                'weight' => 50,
                'hidden' => true,
                'widget' => null
            ),
            'accommodation_other_notes' => array(
                'label' => "Please provide some notes on where you'll be staying in Chicago.",
                'weight' => 52,
                'widget' => array(
                    'style' => 'rows',
                    'function' => 'form_textarea',
                    'params' => array(
                        'rows' => '6',
                        'cols' => '50'
                    )
                )
            ),
            'accommodation_phone' => array(
                'label' => 'Please provide a telephone number where we can reach you when you are in Chicago.',
                'weight' => 56,
                'widget' => array(
                    'function'=>'widget_phone_number',
                    'style' => 'rows',
                    'params' => array(
                        'size' => '12',
                        'type_options' => array(
                            '' => ' - ',
                            'Mobile'=>'Mobile',
                            'Accommodation'=>'Accommodation',
                            'Friend/Family'=>'Friend/Family'
                        )
                    )
                )
            ),
            'accommodation_phone_type' => array(
                'label' => 'Accommodation Phone Type',
                'weight' => 57,
                'hidden' => true,
            ),
            'interest_1' => array(
                'label' => null,
                'weight' => 60,
                'widget' => array(
                    'function' => 'widget_interest'
                )
            ),
            'interest_2' => array(
                'label' => null,
                'weight' => 65,
                'widget' => array(
                    'function' => 'widget_interest'
                )
            ),
            'interest_3' => array(
                'label' => null,
                'weight' => 70,
                'widget' => array(
                    'function' => 'widget_interest'
                )
            ),
            'neighborhood_1' => array(
                'label' => null,
                'weight' => 75,
                'widget' => array(
                    'function' => 'widget_neighborhood'
                )
            ),
            'neighborhood_2' => array(
                'label' => null,
                'weight' => 80,
                'widget' => array(
                    'function' => 'widget_neighborhood'
                )
            ),
            'neighborhood_3' => array(
                'label' => null,
                'weight' => 85,
                'widget' => array(
                    'function' => 'widget_neighborhood'
                )
            ),
            'language'=>array(
                'label' => 'Preferred Language',
                'weight' => 90,
                'widget' => array(
                    'function' => 'widget_language'
                )
            ),
            'language_english_acceptable' => array(
                'label' => 'If we cannot accommodate your language request, is English acceptable?',
                'weight' => 95,
                'widget' => array(
                    'function' => 'widget_language_yes_no'
                )
            ),
            'accessibility_needs' => array(
                'label' => 'Do you or any member of your group need any type of reasonable accommodation(s)?',
                'weight' => 100,
                'widget' => array(
                    'function' => 'widget_accessibility'
                )
            ),
            'accessibility_needs_notes' => array(
                'hidden' => true,
                'label' => 'If yes, please describe',
                'weight' => 105,
                'widget' => array(
                    'function' => 'form_textarea',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '30'
                    )
                )
            ),
            'media_visit' => array(
                'label' => 'If we receive a media request that matches your visit, do you give permission to be accompanied by a journalist?  Please note that by agreeing to this option, you could be quoted, filmed, or otherwise recorded for a potential news story.',
                'weight' => 110,
                'widget' => array(
                    'function' => 'widget_media_visit',
                    'params' => array(
                        'value' => 1
                    )
                )
            ),
            'referred_from' => array(
                'label' => 'How did you find out about the Chicago Greeters program?',
                'weight' => 115,
                'widget' => array(
                    'function' => 'widget_referred_from',
                    'params'=>array(
                        // 'options'=>$referred_from_options
                    )
                )
            ),
            'referred_from_other' => array(
                'label' => 'Referred From: Other',
                'hidden' => true
            ),
            'visit_notes' => array(
                'label' => 'Is there anything else you would like to let us know about your visit?',
                'weight' => 120,
                'widget' => array(
                    'style' => 'rows',
                    'function' => 'form_textarea',
                    'params' => array(
                        'rows' => '6',
                        'cols' => '50'
                    )
                )
            ),
            'status' => array(
                'label' => 'Visit Status',
                'weight' => -150,
                'widget'=> array(
                    'function' => 'form_dropdown',
                    'options' => array(
                        'New' => 'New',
                        'Pending' => 'Pending',
                        'Approved' => 'Approved',
                        'Not Approved' => 'Not Approved',
                        'Assigned' => 'Assigned',
                        'Confirmed' => 'Confirmed',
                        'Completed' => 'Completed',
                        'Cancelled' => 'Cancelled',
                        'No-Show' => 'No-Show'
                    )
                )
            ),
            'confirmed_date' => array(
                'label' => 'Confirmed Visit Date',
                'hidden' => true,
                'weight' => 160,
                'widget' => array(
                    'style' => 'rows',
                    'function' => 'form_input',
                )
            ),
            'date_notes' => array(
                'hidden' => true,
                'label' => 'Date Notes',
                'weight' => -15,
                'widget' => array(
                    'function' => 'form_textarea',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '30'
                    )
                )
            ),
            'internal_staff_notes' => array(
                'hidden' => true,
                'label' => 'Internal Staff Notes',
                'weight' => 130,
                'widget' => array(
                    'function' => 'form_textarea',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '30'
                    )
                )
            ),
            'hotsheet_notes' => array(
                'hidden' => true,
                'label' => 'Hotsheet Notes',
                'weight' => 135,
                'widget' => array(
                    'function' => 'form_textarea',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '30'
                    )
                )
            ),
            'archived' => array(
                'hidden' => true,
                'label' => 'Archived',
                'weight' => 140,
                'widget' => array(
                    'function' => 'widget_checkbox',
                )
            ),
            'submitted_on' => array(
                'hidden' => true,
                'label' => 'Submitted On',
                'weight' => 150,
                'widget' => array(
                    'function' => 'widget_date_time_selector',
                )
            ),
            'proficiency' => array(
                'label' => 'Proficiency',
                'weight' => 150,
                'widget'=> array(
                    'function' => 'form_dropdown',
                    'options' => array(
                        '' => '-',
                        'Expert' => 'Expert',
                        'Moderate' => 'Moderate',
                        'Novice' => 'Novice',
                    ),
                )
            ),
            'other_interests' => array(
                'label' => 'Other Interests',
                'weight' => 160,
                'widget'=> array(
                    'function' => 'form_textarea',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '30'
                    )
                ),
            ),
            'enable_sms' => array(
                'label' => 'Receive Text Alerts',
                'weight' => -47,
                'widget'=> array(
                    'function' => 'form_dropdown',
                    'options' => array(
                        'No' => 'No',
                        'Yes' => 'Yes'
                    ),
                )
            ),
        ),
    'volunteers' => array(
            'salutation' => array(
                'label' => 'Salutation',
                'weight' => -96,
                'widget'=> array(
                    'function' => 'form_dropdown',
                    'options' => array(
                        'Mr.' => 'Mr.',
                        'Mrs.' => 'Mrs.',
                        'Ms.' => 'Ms.'
                    )
                )
            ),
            'first_name' => array(
                'label' => 'First Name',
                'weight' => -95,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'last_name' => array(
                'label' => 'Last Name',
                'weight' => -90,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'email' => array(
                'label' => 'Email',
                'weight' => -85,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'address_1' => array(
                'label' => 'Street Address',
                'weight' => -80,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'address_2' => array(
                'label' => "",
                'weight' => -75,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'city' => array(
                'label' => 'City',
                'weight' => -70,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                    )
                )
            ),
            'state_province' => array(
                'label' => 'State',
                'weight' => -65,
                'widget' => array(
                    'function' => 'form_dropdown',
                    // 'options' => state_dropdown('Illinois'),
                    'params' => array(
                        'value' => 'Illinois'
                    )
                )
            ),
            'postal_code' => array(
                'label' => 'ZIP Code',
                'weight' => -60,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => 10
                    )
                )
            ),
            'birthdate' => array(
                'label' => 'Birth Date',
                'weight' => -55,
                'widget' => array(
                    'function' => 'widget_date_selector',
                    'widget_options' => array(
                        'start_year'=>1900,
                        'end_year'=>date('Y')
                    )
                )
            ),
            'phone_1' => array(
                'label' => 'Phone 1',
                'weight' => -50,
                'widget' => array(
                    'function'=>'widget_phone_number',
                    'params' => array(
                        'size' => '12',
                        'type_options' => array(
                            '' => ' - ',
                            'home'=>'Home',
                            'work'=>'Work',
                            'mobile'=>'Mobile',
                            'other'=>'Other'
                        )
                    )
                ),
            ),
            'phone_1_type' => array(
                'label' => 'Phone 1 Type',
                'weight' => -45,
                'hidden' => true
            ),
            'phone_2' => array(
                'label' => 'Phone 2',
                'weight' => -40,
                'widget' => array(
                    'function'=>'widget_phone_number',
                    'params' => array(
                        'size' => '12',
                        'type_options' => array(
                            '' => ' - ',
                            'home'=>'Home',
                            'work'=>'Work',
                            'mobile'=>'Mobile',
                            'other'=>'Other'
                        )
                    )
                ),
            ),
            'phone_2_type' => array(
                'label' => 'Phone 3 Type',
                'weight' => -35,
                'hidden' => true,
            ),
            'emergency_contact_name' => array(
                'label' => 'Name',
                'weight' => -24,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'emergency_contact_phone' => array(
                'label' => 'Phone Number',
                'weight' => -23,
                'widget' => array(
                    'function' => 'widget_phone_number',
                    'params' => array(
                        'size' => '12',
                        'type_options' => array(
                            '' => ' - ',
                            'home'=>'Home',
                            'work'=>'Work',
                            'mobile'=>'Mobile',
                            'other'=>'Other'
                        )
                    )
                )
            ),
            'emergency_contact_phone_type' => array(
                'label' => 'Emergency Contact Phone Type',
                'weight' => -22,
                'hidden' => true
            ),
            'emergency_contact_relationship' => array(
                'label' => 'Relationship',
                'weight' => -21,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'occupation' => array(
                'label' => 'What is your occupation?',
                'weight' => -20,
                'is_required' => true,
                'widget' => array(
                    'function' => 'form_input',
                    'style' => 'rows',
                    'params' => array(
                        'size' => '40'
                    )
                )
            ),
            'work_experience' => array(
                'label' => 'Please describe your work / volunteer experience',
                'weight' => -15,
                'is_required' => true,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40'
                    )
                )
            ),
            'volunteer_experience' => array(
                'label' => 'Please describe any volunteer experience',
                'weight' => -10,
                'is_required' => true,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40'
                    )
                )
            ),
            'statement_of_intent' => array(
                'label' => 'Why would you like to become a volunteer for Chicago Greeter?',
                'weight' => -5,
                'is_required' => true,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40'
                    )
                )
            ),
            'reference_name' => array(
                'label' => 'Name',
                'weight' => 0,
                'is_required' => true,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'reference_phone' => array(
                'label' => 'Phone Number',
                'weight' => 5,
                'is_required' => true,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'reference_email' => array(
                'label' => 'Email',
                'weight' => 10,
                'widget' => array(
                    'function' => 'form_input',
                    'params' => array(
                        'size' => '30'
                    )
                )
            ),
            'interests' => array(
                'label' => 'Interests',
                'weight' => 15,
                'widget' => array(
                    'function' => 'widget_interests'
                )
            ),
            'other_interests_specialties' => array(
                'label' => 'List any other specialties, interests, etc:',
                'weight' => 20,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40',
                    )
                )
            ),
            'neighborhoods' => array(
                'label' => 'Interests',
                'weight' => 25,
                'widget' => array(
                    'function' => 'widget_neighborhoods'
                )
            ),
            'additional_neighborhood' => array(
                'label' => 'Are there additional neighborhood(s) and/or theme(s) that you feel would provide an interesting experience for visitors? Please include highlights of the neighborhood',
                'weight' => 30,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40',
                    )
                )
            ),
            'participation' => array(
                'label' => 'How often would you like to participate as a volunteer?',
                'weight' => 35,
                'widget' => array(
                    'function' => 'form_dropdown',
                    'style' => 'rows',
                    'options' => array(
                        'weekly' => 'Once a Week',
                        'monthly' => 'Once a Month',
                    )
                )
            ),
            
            // just running the widget from this input field
            'sunday_morning' => array(
                'label' => 'Availability',
                'weight' => 40,
                'widget' => array(
                    'function' => 'widget_volunteer_availability',
                )
            ),
            
            'short_notice' => array(
                'label' => "Would you be interested in volunteering on short notice?",
                'weight' => 45,
                'widget' => array(
                    'function' => 'widget_yes_no'
                )
            ),
            'english' => array(
                'label' => "Do you speak English fluently?",
                'weight' => 50,
                'widget' => array(
                    'function' => 'widget_yes_no',
                    'style' => 'rows'
                )
            ),
            'languages' => array(
                'label' => "Please indicate all languages you are fluent in besides English",
                'weight' => 55,
                'widget' => array(
                    'function' => 'widget_languages'
                )
            ),
            'sign_language' => array(
                'label' => "American Sign Language",
                'weight' => 60,
                'widget' => array(
                    'function' => 'widget_checkbox_left'
                )
            ),
            'sight_guide' => array(
                'label' => "Trained Sight Guide",
                'weight' => 65,
                'widget' => array(
                    'function' => 'widget_checkbox_left'
                )
            ),
            'other_skill' => array(
                'label' => "Other Skills",
                'weight' => 70,
                'widget' => array(
                    'function' => 'widget_other_skill'
                )
            ),
            'additional_skills' => array(
                'label' => 'Please describe any other education, special skills and/or experience that may be relevant to Chicago Greeter',
                'weight' => 75,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40',
                    )
                )
            ),
            'referred_from' => array(
                'label' => 'How did you find out about Chicago Greeter?',
                'weight' => 80,
                'widget' => array(
                    'function' => 'widget_select_or_other',
                    'style' => 'rows',
                    'params' => array(
                        'options'=>array(
                            'Friend' => 'Friend',
                            'Internet' => 'Internet',
                        )
                    )
                )
            ),
            'referred_from_other' => array(
                'label' => null,
                'weight' => 81,
                'hidden' => true
            ),
            'felony' => array(
                'label' => 'If you have been convicted of a felony or misdemeanor in the past 5 years, please explain',
                'weight' => 85,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40',
                    )
                )
            ),
            'additional_comments' => array(
                'label' => 'Please provide any comments about Chicago Greeter that have not been covered by any of the questions above',
                'weight' => 90,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40',
                    )
                )
            ),
            'accessibility_needs' => array(
                'label' => 'Choose Chicago accommodates people with disabilities.  Do you need any type of reasonable accommodation to serve as a Chicago Greeter?',
                'weight' => 100,
                'widget' => array(
                    'function' => 'widget_yes_no',
                    'style' => 'rows'
                )
            ),
            'accessibility_needs_notes' => array(
                'label' => 'If yes, please describe',
                'weight' => 105,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40'
                    )
                )
            ),
            'status' => array(
                'hidden' => true,
                'label' => 'Status',
                'weight' => -100,
                'widget'=> array(
                    'function' => 'form_dropdown',
                    'options' => array(
                        'New'=>'New',
                        'Pending'=>'Pending',
                        'Interview' => 'Interview',
                        'Trainee'=>'Trainee',
                        'Approved'=>'Approved',
                        'Not Approved'=>'Not Approved',
                        'Inactive' => 'Inactive'
                    )
                )
            ),
            'photo' => array(
                'hidden' => true,
                'label' => 'Photo',
                'weight' => -105,
                'widget' => array(
                    'function' => 'form_upload',
                    'params' => array(
                        'allowed_types' => 'gif|jpg|jpeg|png',
                        'max_width' => 2000,
                        'max_height' => 2000,
                        'max_size' => 12000
                    ),
                    'resize' => array(
                        'max_width' => 400,
                        'max_height' => 400,
                    )
                )
            ),
            'notes' => array(
                'label' => 'Notes',
                'hidden' => true,
                'weight' => 900,
                'widget' => array(
                    'function' => 'form_textarea',
                    'style' => 'rows',
                    'params' => array(
                        'rows' => '4',
                        'cols' => '40',
                    )
                )
            ),
            'volunteer_start_date' => array(
                'label' => 'Start Date',
                'weight' => 905,
                'widget' => array(
                    'function' => 'widget_date_selector',
                    'widget_options' => array(
                        'start_year'=>1990,
                        'end_year'=>date('Y')
                    )
                )
            ),
            'selected_year' => array(
                'label' => 'Year Pin',
                'weight' => 910,
                'widget' => array(
                    'function' => 'form_dropdown',
                    'options' => array(
                        ''=>'-',
                        '5'=>'5 Years',
                        '10'=>'10 Years',
                        '15'=>'15 Years',
                        '20'=>'20 Years',
                        '25'=>'25 Years',
                        '30'=>'30 Years',
                    )
                )
            ),
            
        ),
    

];
