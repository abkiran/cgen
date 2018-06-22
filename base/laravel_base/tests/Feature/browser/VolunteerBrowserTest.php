<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class VolunteerBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/volunteer')
            ->see('Actions')
            ->see('Manage Volunteers');
    }
    
    // public function testStore()
    // {

    //     $this->visit('admin/volunteer/create')
    //         ->submitForm('Save', [
    //         'salutation' => 'Lorem Ipsum',
    //         'first_name' => 'Test',
    //         'last_name' => 'Test',
    //         'email' => 'example@example.com',
    //         'address_1' => 'Test',
    //         'address_2' => 'Test',
    //         'city' => 'Test',
    //         'state_province' => 'Test',
    //         'postal_code' => 'Test',
    //         'country' => 'Test',
    //         'phone_1' => 'Test',
    //         'phone_1_type' => 'Test',
    //         'phone_2' => 'Test',
    //         'phone_2_type' => 'Test',
    //         'birthdate' => '2018-03-10',
    //         'emergency_contact_name' => 'Test',
    //         'emergency_contact_phone' => 'Test',
    //         'emergency_contact_phone_type' => 'Test',
    //         'emergency_contact_relationship' => 'Test',
    //         'occupation' => 'Lorem Ipsum',
    //         'work_experience' => 'Lorem Ipsum',
    //         'volunteer_experience' => 'Lorem Ipsum',
    //         'statement_of_intent' => 'Lorem Ipsum',
    //         'reference_name' => 'Test',
    //         'reference_phone' => 'Test',
    //         'reference_email' => 'Test',
    //         'interests' => 'Lorem Ipsum',
    //         'other_interests_specialties' => 'Lorem Ipsum',
    //         'neighborhoods' => 'Lorem Ipsum',
    //         'additional_neighborhood' => 'Lorem Ipsum',
    //         'participation' => 'Test',
    //         'monday_morning' => '1',
    //         'monday_afternoon' => '1',
    //         'tuesday_morning' => '1',
    //         'tuesday_afternoon' => '1',
    //         'wednesday_morning' => '1',
    //         'wednesday_afternoon' => '1',
    //         'thursday_morning' => '1',
    //         'thursday_afternoon' => '1',
    //         'friday_morning' => '1',
    //         'friday_afternoon' => '1',
    //         'saturday_morning' => '1',
    //         'saturday_afternoon' => '1',
    //         'sunday_morning' => '1',
    //         'sunday_afternoon' => '1',
    //         'short_notice' => '1',
    //         'english' => '1',
    //         'languages' => 'Lorem Ipsum',
    //         'sign_language' => '1',
    //         'sight_guide' => '1',
    //         'other_skill' => 'Lorem Ipsum',
    //         'additional_skills' => 'Lorem Ipsum',
    //         'referred_from' => 'Lorem Ipsum',
    //         'referred_from_other' => 'Lorem Ipsum',
    //         'felony' => 'Lorem Ipsum',
    //         'additional_comments' => 'Lorem Ipsum',
    //         'accessibility_needs' => '1',
    //         'accessibility_needs_notes' => 'Lorem Ipsum',
    //         'submitted_on' => '2018-03-10 10:43:21',
    //         'status' => 'Test',
    //         'current_step' => 'Test',
    //         'session_id' => 'Test',
    //         'user' => 'Test',
    //         'photo' => 'Lorem Ipsum',
    //         'notes' => 'Lorem Ipsum',
    //         'volunteer_start_date' => '2018-03-10',
    //         'five_year_pin' => 'Test',
    //         'monday_evening' => '1',
    //         'tuesday_evening' => '1',
    //         'wednesday_evening' => '1',
    //         'thursday_evening' => '1',
    //         'friday_evening' => '1',
    //         'saturday_evening' => '1',
    //         'sunday_evening' => '1',
    //         'selected_year' => 'Test',
    //         'selected_year_pin' => '2018-03-10',
    //         ])
    //         ->seePageIs('admin/volunteer')
    //         ->see('Actions')
    //         ->see('Manage Volunteers')
    //         ->see('New Volunteer has been created.');
    // }
    public function testUpdate()
    {
        $this->visit('admin/volunteer/7/edit')
            ->submitForm('Save', [
                  'salutation' => 'Mr.',
                  'first_name' => 'Test',
                  'last_name' => 'Test',
                  'email' => 'example@example.com',
                  'address_1' => 'Test',
                  'address_2' => 'Test',
                  'city' => 'Test',
                  'state_province' => 'Alaska',
                  'postal_code' => '12345',
                  'phone_1' => 'Test',
                  'phone_1_type' => 'mobile',
                  'phone_2' => 'Test',
                  'phone_2_type' => 'mobile',
                  'birthdate' => '2018-03-10',
                  'emergency_contact_name' => 'Test',
                  'emergency_contact_phone' => 'Test',
                  'emergency_contact_phone_type' => 'mobile',
                  'emergency_contact_relationship' => 'Test',
                  'occupation' => 'Lorem Ipsum',
                  'work_experience' => 'Lorem Ipsum',
                  'volunteer_experience' => 'Lorem Ipsum',
                  'statement_of_intent' => 'Lorem Ipsum',
                  'reference_name' => 'Test',
                  'reference_phone' => 'Test',
                  'reference_email' => 'Test',
                  'interests' => '4',
                  'other_interests_specialties' => 'Lorem Ipsum',
                  'neighborhoods' => '5',
                  'additional_neighborhood' => 'Lorem Ipsum',
                  'participation' => 'weekly',
                  'monday_morning' => '1',
                  'monday_afternoon' => '1',
                  'tuesday_morning' => '1',
                  'tuesday_afternoon' => '1',
                  'wednesday_morning' => '1',
                  'wednesday_afternoon' => '1',
                  'thursday_morning' => '1',
                  'thursday_afternoon' => '1',
                  'friday_morning' => '1',
                  'friday_afternoon' => '1',
                  'saturday_morning' => '1',
                  'saturday_afternoon' => '1',
                  'sunday_morning' => '1',
                  'sunday_afternoon' => '1',
                  'short_notice' => '1',
                  'english' => '1',
                  'languages' => '',
                  'sign_language' => '1',
                  'sight_guide' => '1',
                  'other_skill' => 'Lorem Ipsum',
                  'additional_skills' => 'Lorem Ipsum',
                  'referred_from' => 'Friend',
                  'referred_from_other' => 'Lorem Ipsum',
                  'felony' => 'Lorem Ipsum',
                  'additional_comments' => 'Lorem Ipsum',
                  'accessibility_needs' => '1',
                  'accessibility_needs_notes' => 'Lorem Ipsum',
                  'notes' => 'Lorem Ipsum',
                  'volunteer_start_date' => '2018-03-10',
                  'monday_evening' => '1',
                  'tuesday_evening' => '1',
                  'wednesday_evening' => '1',
                  'thursday_evening' => '1',
                  'friday_evening' => '1',
                  'saturday_evening' => '1',
                  'sunday_evening' => '1',
            ])
            ->seePageIs('admin/volunteer')
            ->see('Actions')
            ->see('Volunteer details are updated.');

            $this->visit('admin/volunteer/7/edit')
            ->submitForm('Save Pins', [
                  'selected_year' => '5',
                  'selected_year_pin' => '2018-03-10',
                  '50_hour_pin' => '2018-03-10',
                  '100_hour_pin' => '2018-03-10',
                  '150_hour_pin' => '2018-03-10',
                  '300_hour_pin' => '2018-03-10',
                  '400_hour_pin' => '2018-03-10',
                  '500_hour_pin' => '2018-03-10',
            ])
            ->seePageIs('admin/volunteer')
            ->see('Actions');
    }
}
