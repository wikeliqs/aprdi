<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function get_categories($param1 = "") {
        if ($param1 != "") {
            $this->db->where('id', $param1);
        }
		// echo $this->db->last_query();
		
        $this->db->where('parent', 0);
          return $this->db->get('category');
    }

    public function get_category_details_by_id($id) {
        return $this->db->get_where('category', array('id' => $id));
    }
	

    public function add_category() {
        $data['code'] = html_escape($this->input->post('code'));
        $data['name'] = html_escape($this->input->post('name'));
        $data['font_awesome_class'] = html_escape($this->input->post('font_awesome_class'));
        $data['date_added'] = strtotime(date('D, d-M-Y'));
        $this->db->insert('category', $data);
    }

    public function edit_category($param1) {
        $data['name'] = html_escape($this->input->post('name'));
        $data['font_awesome_class'] = html_escape($this->input->post('font_awesome_class'));
        $data['last_modified'] = strtotime(date('D, d-M-Y'));
        $this->db->where('id', $param1);
        $this->db->update('category', $data);
    }

    public function delete_category($category_id) {
        $this->db->where('id', $category_id);
        $this->db->delete('category');
    }

    public function add_sub_category() {
        $data['code']       = html_escape($this->input->post('code'));
        $data['name']       = html_escape($this->input->post('name'));
        $data['parent']     = html_escape($this->input->post('category_id'));
        $data['date_added'] = strtotime(date('D, d-M-Y'));
        $this->db->insert('category', $data);
    }

    public function edit_sub_category($sub_category_id) {
        $data['name']          = html_escape($this->input->post('name'));
        $data['parent']        = html_escape($this->input->post('category_id'));
        $data['last_modified'] = strtotime(date('D, d-M-Y'));

        $this->db->where('id', $sub_category_id);
        $this->db->update('category', $data);
    }
    public function get_sub_categories($parent_id = "") {
        return $this->db->get_where('category', array('parent' => $parent_id))->result_array();
    }

    public function enroll_history($course_id = "") {
        if ($course_id > 0) {
            return $this->db->get_where('enroll', array('course_id' => $course_id));
        }else {
            return $this->db->get('enroll');
        }
    }

    public function enroll_history_by_user_id($user_id = "") {
            return $this->db->get_where('enroll', array('user_id' => $user_id));
    }

    public function all_enrolled_student() {
        $this->db->select('user_id');
        $this->db->distinct('user_id');
        return $this->db->get('enroll');
    }

    public function enroll_history_by_date_range($timestamp_start = "", $timestamp_end = "") {
        // echo date('D, d-M-Y', $timestamp_start).' ';
        // echo date('D, d-M-Y', $timestamp_end);
        // die();
        $this->db->order_by('date_added' , 'desc');
		$this->db->where('date_added >=' , $timestamp_start);
		$this->db->where('date_added <=' , $timestamp_end);
        return $this->db->get('enroll');
    }

    public function delete_enroll_history($param1) {
        $this->db->where('id', $param1);
        $this->db->delete('enroll');
    }

    public function purchase_history($user_id) {
        if ($user_id > 0) {
            return $this->db->get_where('payment', array('user_id'=> $user_id));
        }else {
            return $this->db->get('payment');
        }
    }

    public function update_system_settings() {
        $data['value'] = html_escape($this->input->post('system_name'));
        $this->db->where('key', 'system_name');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('system_title'));
        $this->db->where('key', 'system_title');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('slogan'));
        $this->db->where('key', 'slogan');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('language'));
        $this->db->where('key', 'language');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('text_align'));
        $this->db->where('key', 'text_align');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('system_email'));
        $this->db->where('key', 'system_email');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('address'));
        $this->db->where('key', 'address');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('phone'));
        $this->db->where('key', 'phone');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('youtube_api_key'));
        $this->db->where('key', 'youtube_api_key');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('vimeo_api_key'));
        $this->db->where('key', 'vimeo_api_key');
        $this->db->update('settings', $data);

        $data['value'] = html_escape($this->input->post('purchase_code'));
        $this->db->where('key', 'purchase_code');
        $this->db->update('settings', $data);
    }

    public function update_payment_settings() {
        // update paypal keys
        $paypal_info = array();

        $paypal['active'] = $this->input->post('paypal_active');
        $paypal['mode'] = $this->input->post('paypal_mode');
        $paypal['sandbox_client_id'] = $this->input->post('sandbox_client_id');
        $paypal['production_client_id'] = $this->input->post('production_client_id');

        array_push($paypal_info, $paypal);

        $data['value']    =   json_encode($paypal_info);
        $this->db->where('key', 'paypal');
        $this->db->update('settings', $data);

        $stripe_info = array();

        $stripe['active'] = $this->input->post('stripe_active');
        $stripe['testmode'] = $this->input->post('testmode');
        $stripe['public_key'] = $this->input->post('public_key');
        $stripe['secret_key'] = $this->input->post('secret_key');
        $stripe['public_live_key'] = $this->input->post('public_live_key');
        $stripe['secret_live_key'] = $this->input->post('secret_live_key');

        array_push($stripe_info, $stripe);

        $data['value']    =   json_encode($stripe_info);
        $this->db->where('key', 'stripe_keys');
        $this->db->update('settings', $data);
    }

    public function get_lessons($type = "", $id = "") {
        if($type == "course"){
            return $this->db->get_where('lesson', array('course_id' => $id));
        }
        elseif ($type == "section") {
            return $this->db->get_where('lesson', array('section_id' => $id));
        }
        elseif ($type == "lesson") {
            return $this->db->get_where('lesson', array('id' => $id));
        }
        else {
            return $this->db->get('lesson');
        }
    }

    public function add_course() {
        $outcomes = $this->input->post('outcomes');
        $requirements = $this->input->post('requirements');
        if (sizeof($outcomes) > 0) {
            unset($outcomes[1]);
        }
        if (sizeof($requirements) > 0) {
            unset($requirements[1]);
        }
        $data['title'] = html_escape($this->input->post('title'));
        $data['short_description'] = $this->input->post('short_description');
        $data['description'] = $this->input->post('description');
        $data['outcomes'] = json_encode(array_values($outcomes));
        $data['language'] = $this->input->post('language_made_in');
        $data['category_id'] = $this->input->post('category_id');
        $data['sub_category_id'] = $this->input->post('sub_category_id');
        $data['requirements'] = json_encode(array_values($requirements));
        $data['price'] = $this->input->post('price');
        $data['discount_flag'] = $this->input->post('discount_flag');
        $data['discounted_price'] = $this->input->post('discounted_price');
        $data['level'] = $this->input->post('level');
        $data['video_url'] = html_escape($this->input->post('course_overview_url'));
        $data['date_added'] = strtotime(date('D, d-M-Y'));
        $data['section'] = json_encode(array());
        $data['is_top_course'] = $this->input->post('is_top_course');
        $this->db->insert('course', $data);

        $course_id = $this->db->insert_id();
        if ($_FILES['course_thumbnail']['name'] != "") {
            move_uploaded_file($_FILES['course_thumbnail']['tmp_name'], 'uploads/thumbnails/course_thumbnails/'.$course_id.'.jpg');
        }

        $this->session->set_flashdata('flash_message', get_phrase('course_added'));
    }

    public function update_course($course_id) {
        $outcomes = $this->input->post('outcomes');
        $requirements = $this->input->post('requirements');
        $data['title'] = $this->input->post('title');
        $data['short_description'] = $this->input->post('short_description');
        $data['description'] = $this->input->post('description');
        $data['outcomes'] = json_encode(array_values($outcomes));
        $data['language'] = $this->input->post('language_made_in');
        $data['category_id'] = $this->input->post('category_id');
        $data['sub_category_id'] = $this->input->post('sub_category_id');
        $data['requirements'] = json_encode(array_values($requirements));
        $data['price'] = $this->input->post('price');
        $data['discount_flag'] = $this->input->post('discount_flag');
        $data['discounted_price'] = $this->input->post('discounted_price');
        $data['level'] = $this->input->post('level');
        $data['video_url'] = $this->input->post('course_overview_url');
        $data['last_modified'] = strtotime(date('D, d-M-Y'));

        $this->db->where('id', $course_id);
        $this->db->update('course', $data);

        if ($_FILES['course_thumbnail']['name'] != "") {
            move_uploaded_file($_FILES['course_thumbnail']['tmp_name'], 'uploads/thumbnails/course_thumbnails/'.$course_id.'.jpg');
        }
        $this->session->set_flashdata('flash_message', get_phrase('course_updated'));
    }

    public function get_courses($category_id = "", $sub_category_id = "") {
        if ($category_id > 0 && $sub_category_id > 0) {
            return $this->db->get_where('course', array('category_id' => $category_id, 'sub_category_id' => $sub_category_id));
        }else {
            return $this->db->get('course');
        }
    }

    public function get_my_courses_by_category_id($category_id) {
        $this->db->select('course_id');
        $course_lists_by_enroll = $this->db->get_where('enroll', array('user_id' => $this->session->userdata('user_id')))->result_array();
        $course_ids = array();
        foreach ($course_lists_by_enroll as $row) {
            if (!in_array($row['course_id'], $course_ids)) {
                array_push($course_ids, $row['course_id']);
            }
        }
        $this->db->where_in('id', $course_ids);
        $this->db->where('category_id', $category_id);
        return $this->db->get('course');
    }

    public function get_my_courses_by_search_string($search_string) {
        $this->db->select('course_id');
        $course_lists_by_enroll = $this->db->get_where('enroll', array('user_id' => $this->session->userdata('user_id')))->result_array();
        $course_ids = array();
        foreach ($course_lists_by_enroll as $row) {
            if (!in_array($row['course_id'], $course_ids)) {
                array_push($course_ids, $row['course_id']);
            }
        }
        $this->db->where_in('id', $course_ids);
        $this->db->like('title', $search_string);
        return $this->db->get('course');
    }

    public function get_courses_by_search_string($search_string) {
        $this->db->like('title', $search_string);
        return $this->db->get('course');
    }


    public function get_course_by_id($course_id = "") {
        return $this->db->get_where('course', array('id' => $course_id));
    }

    public function delete_course($course_id) {
        $this->db->where('id', $course_id);
        $this->db->delete('course');
    }

    public function get_top_courses() {
        return $this->db->get_where('course', array('is_top_course' => 1));
    }

    public function get_default_category_id() {
        $categories = $this->get_categories()->result_array();
        foreach ($categories as $category) {
            return $category['id'];
        }
    }

    public function get_default_sub_category_id($default_cateegory_id) {
        $sub_categories = $this->get_sub_categories($default_cateegory_id);
        foreach ($sub_categories as $sub_category) {
            return $sub_category['id'];
        }
    }

    public function add_section($course_id) {
        $data['title'] = html_escape($this->input->post('title'));
        $data['course_id'] = $course_id;
        $this->db->insert('section', $data);
        $section_id = $this->db->insert_id();

        $course_details = $this->get_course_by_id($course_id)->row_array();
        $previous_sections = json_decode($course_details['section']);

        if (sizeof($previous_sections) > 0) {
            array_push($previous_sections, $section_id);
            $updater['section'] = json_encode($previous_sections);
            $this->db->where('id', $course_id);
            $this->db->update('course', $updater);
        }else {
            $previous_sections = array();
            array_push($previous_sections, $section_id);
            $updater['section'] = json_encode($previous_sections);
            $this->db->where('id', $course_id);
            $this->db->update('course', $updater);
        }
    }

    public function edit_section($section_id) {
        $data['title'] = $this->input->post('title');
        $this->db->where('id', $section_id);
        $this->db->update('section', $data);
    }

    public function delete_section($course_id, $section_id) {
        $this->db->where('id', $section_id);
        $this->db->delete('section');

        $course_details = $this->get_course_by_id($course_id)->row_array();
        $previous_sections = json_decode($course_details['section']);

        if (sizeof($previous_sections) > 0) {
            $new_section = array();
            for ($i = 0; $i < sizeof($previous_sections); $i++) {
                if ($previous_sections[$i] != $section_id) {
                    array_push($new_section, $previous_sections[$i]);
                }
            }
            $updater['section'] = json_encode($new_section);
            $this->db->where('id', $course_id);
            $this->db->update('course', $updater);
        }
    }

    public function get_section($type_by, $id){
        $this->db->order_by("id", "asc");
        if ($type_by == 'course') {
            return $this->db->get_where('section', array('course_id' => $id));
        }elseif ($type_by == 'section') {
            return $this->db->get_where('section', array('id' => $id));
        }
    }

    public function serialize_section($course_id, $serialization) {
        $updater = array(
            'section' => $serialization
        );
        $this->db->where('id', $course_id);
        $this->db->update('course', $updater);
    }

    public function add_lesson() {
        $data['course_id'] = html_escape($this->input->post('course_id'));
        $data['title'] = html_escape($this->input->post('title'));
        $data['section_id'] = html_escape($this->input->post('section_id'));
        $data['video_url'] = html_escape($this->input->post('video_url'));
        $data['duration'] = html_escape($this->input->post('duration'));
        $video_details = $this->video_model->getVideoDetails($data['video_url']);
        $data['video_type'] = $video_details['provider'];
        $data['date_added'] = strtotime(date('D, d-M-Y'));
        $this->db->insert('lesson', $data);
        $inserted_id = $this->db->insert_id();
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/thumbnails/lesson_thumbnails/'.$inserted_id.'.jpg');
    }

    public function edit_lesson($lesson_id) {
        $data['course_id'] = html_escape($this->input->post('course_id'));
        $data['title'] = html_escape($this->input->post('title'));
        $data['section_id'] = html_escape($this->input->post('section_id'));
        $data['video_url'] = html_escape($this->input->post('video_url'));
        $data['duration'] = html_escape($this->input->post('duration'));
        $video_details = $this->video_model->getVideoDetails($data['video_url']);
        $data['video_type'] = $video_details['provider'];
        $data['date_added'] = strtotime(date('D, d-M-Y'));

        $this->db->where('id', $lesson_id);
        $this->db->update('lesson', $data);

        if ($_FILES['thumbnail']['name'] != "") {
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'uploads/thumbnails/lesson_thumbnails'.$lesson_id.'.jpg');
        }
    }
    public function delete_lesson($lesson_id) {
        $this->db->where('id', $lesson_id);
        $this->db->delete('lesson');
    }

    public function update_frontend_settings() {
        $data['value'] = html_escape($this->input->post('banner_title'));
        $this->db->where('key', 'banner_title');
        $this->db->update('frontend_settings', $data);

        $data['value'] = html_escape($this->input->post('banner_sub_title'));
        $this->db->where('key', 'banner_sub_title');
        $this->db->update('frontend_settings', $data);


        $data['value'] = $this->input->post('about_us');
        $this->db->where('key', 'about_us');
        $this->db->update('frontend_settings', $data);

        $data['value'] = $this->input->post('terms_and_condition');
        $this->db->where('key', 'terms_and_condition');
        $this->db->update('frontend_settings', $data);

        $data['value'] = $this->input->post('privacy_policy');
        $this->db->where('key', 'privacy_policy');
        $this->db->update('frontend_settings', $data);
    }

    public function update_frontend_banner() {
        move_uploaded_file($_FILES['banner_image']['tmp_name'], 'uploads/frontend/home-banner.jpg');
    }

    public function handleWishList($course_id) {
        $wishlists = array();
        $user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
        if ($user_details['wishlist'] == "") {
            array_push($wishlists, $course_id);
        }else {
            $wishlists = json_decode($user_details['wishlist']);
            if (in_array($course_id, $wishlists)) {
                $container = array();
                foreach ($wishlists as $key) {
                    if ($key != $course_id) {
                        array_push($container, $key);
                    }
                }
                $wishlists = $container;
                // $key = array_search($course_id, $wishlists);
                // unset($wishlists[$key]);
            }else {
                array_push($wishlists, $course_id);
            }
        }

        $updater['wishlist'] = json_encode($wishlists);
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('users', $updater);
    }

    public function is_added_to_wishlist($course_id = "") {
        if ($this->session->userdata('user_login') == 1) {
            $wishlists = array();
            $user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
            $wishlists = json_decode($user_details['wishlist']);
            if (in_array($course_id, $wishlists)) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }

    public function getWishLists() {
        $user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
        return json_decode($user_details['wishlist']);
    }

    public function get_latest_10_course() {
        $this->db->order_by("id", "desc");
        $this->db->limit('10');
        return $this->db->get('course')->result_array();
    }

    public function enroll_student($user_id){
        $purchased_courses = $this->session->userdata('cart_items');
        foreach ($purchased_courses as $purchased_course) {
            $data['user_id'] = $user_id;
            $data['course_id'] = $purchased_course;
            $data['date_added'] = strtotime(date('D, d-M-Y'));
            $this->db->insert('enroll', $data);
        }
    }
    public function course_purchase($user_id, $method, $amount_paid) {
        $purchased_courses = $this->session->userdata('cart_items');
        foreach ($purchased_courses as $purchased_course) {
            $data['user_id'] = $user_id;
            $data['payment_type'] = $method;
            $data['course_id'] = $purchased_course;
            $course_details = $this->get_course_by_id($purchased_course)->row_array();
            if ($course_details['discount_flag'] == 1) {
                $data['amount'] = $course_details['discounted_price'];
            }else {
                $data['amount'] = $course_details['price'];
            }
            $data['date_added'] = strtotime(date('D, d-M-Y'));
            $this->db->insert('payment', $data);
        }
    }

    public function get_default_lesson($section_id) {
        $this->db->order_by('id',"asc");
        $this->db->limit(1);
        $this->db->where('section_id', $section_id);
        return $this->db->get('lesson');
    }

    public function get_courses_by_wishlists() {
        $wishlists = $this->getWishLists();
        $this->db->where_in('id', $wishlists);
        return $this->db->get('course');
    }


    public function get_courses_of_wishlists_by_search_string($search_string) {
        $wishlists = $this->getWishLists();
        $this->db->where_in('id', $wishlists);
        $this->db->like('title', $search_string);
        return $this->db->get('course');
    }

    public function get_total_duration_of_lesson_by_course_id($course_id) {
        $total_duration = 0;
        $lessons = $this->crud_model->get_lessons('course', $course_id)->result_array();
        foreach ($lessons as $lesson) {
            $time_array = explode(':', $lesson['duration']);
            $hour_to_seconds = $time_array[0] * 60 * 60;
            $minute_to_seconds = $time_array[1] * 60;
            $seconds = $time_array[2];
            $total_duration += $hour_to_seconds + $minute_to_seconds + $seconds;
        }
        return gmdate("H:i:s", $total_duration).' '.get_phrase('hours');
    }

    public function get_total_duration_of_lesson_by_section_id($section_id) {
        $total_duration = 0;
        $lessons = $this->crud_model->get_lessons('section', $section_id)->result_array();
        foreach ($lessons as $lesson) {
            $time_array = explode(':', $lesson['duration']);
            $hour_to_seconds = $time_array[0] * 60 * 60;
            $minute_to_seconds = $time_array[1] * 60;
            $seconds = $time_array[2];
            $total_duration += $hour_to_seconds + $minute_to_seconds + $seconds;
        }
        return gmdate("H:i:s", $total_duration).' '.get_phrase('hours');
    }

    public function rate($data) {
        if ($this->db->get_where('rating', array('user_id' => $data['user_id'], 'ratable_id' => $data['ratable_id'], 'ratable_type' => $data['ratable_type']))->num_rows() == 0) {
            $this->db->insert('rating', $data);
        }else {
            $checker = array('user_id' => $data['user_id'], 'ratable_id' => $data['ratable_id'], 'ratable_type' => $data['ratable_type']);
            $this->db->where($checker);
            $this->db->update('rating', $data);
        }
    }

    public function get_user_specific_rating($ratable_type = "", $ratable_id = "") {
        return $this->db->get_where('rating', array('ratable_type' => $ratable_type, 'user_id' => $this->session->userdata('user_id'), 'ratable_id' => $ratable_id))->row_array();
    }

    public function get_ratings($ratable_type = "", $ratable_id = "", $is_sum = false) {
        if ($is_sum) {
            $this->db->select_sum('rating');
            return $this->db->get_where('rating', array('ratable_type' => $ratable_type, 'ratable_id' => $ratable_id));

        }else {
            return $this->db->get_where('rating', array('ratable_type' => $ratable_type, 'ratable_id' => $ratable_id));
        }
    }

    public function get_percentage_of_specific_rating($rating = "", $ratable_type = "", $ratable_id = "") {
        $number_of_user_rated = $this->db->get_where('rating', array(
            'ratable_type' => $ratable_type,
            'ratable_id'   => $ratable_id
        ))->num_rows();

        $number_of_user_rated_the_specific_rating = $this->db->get_where( 'rating', array(
            'ratable_type' => $ratable_type,
            'ratable_id'   => $ratable_id,
            'rating'       => $rating
        ))->num_rows();

        //return $number_of_user_rated.' '.$number_of_user_rated_the_specific_rating;
        if ($number_of_user_rated_the_specific_rating > 0) {
            $percentage = ($number_of_user_rated_the_specific_rating / $number_of_user_rated) * 100;
        }else {
            $percentage = 0;
        }
        return floor($percentage);
    }

    ////////private message//////
    function send_new_private_message() {
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));

        $reciever   = $this->input->post('reciever');
        $sender     = $this->session->userdata('user_id');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();
        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code                        = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender']              = $sender;
            $data_message_thread['reciever']            = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('message', $data_message);

        return $message_thread_code;
    }

    function send_reply_message($message_thread_code) {
        $message    = html_escape($this->input->post('message'));
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $sender     = $this->session->userdata('user_id');

        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('message', $data_message);
    }

    function mark_thread_messages_read($message_thread_code) {
        // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

    function count_unread_message_of_thread($message_thread_code) {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }

    public function get_last_message_by_message_thread_code($message_thread_code) {
        $this->db->order_by('message_id','desc');
        $this->db->limit(1);
        $this->db->where(array('message_thread_code' => $message_thread_code));
        return $this->db->get('message');
    }

	 public function kodepos($param1 = "") {
        if ($param1 != "") {
            $this->db->where('kodepos', $param1);
        }else{
        $this->db->where('kodepos', '');
		}
        return $this->db->get('kodepos');
		
    }

    function curl_request($code = '') {

       /*  $product_code = $code;

        $personal_token = "FkA9UyDiQT0YiKwYLK3ghyFNRVV9SeUn";
        $url = "https://api.envato.com/v3/market/author/sale?code=".$product_code;
        $curl = curl_init($url);

        //setting the header for the rest of the api
        $bearer   = 'bearer ' . $personal_token;
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Authorization: ' . $bearer;

        $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:'.$product_code.'.json';
        $ch_verify = curl_init( $verify_url . '?code=' . $product_code );

        curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
        curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec( $ch_verify );
        curl_close( $ch_verify );

        $response = json_decode($cinit_verify_data, true);

        if (count($response['verify-purchase']) > 0) {
            return true;
        } else {
            return false;
        } */
  	}
	 public function perusahaan($id= '') {
		// return $this->db->get('type_pendaftaran');
		if ($id > 0) {
            return $this->db->get_where('type_pendaftaran', array('id_type' => $id));
        }else {
            return $this->db->get('type_pendaftaran');
        }
		
		
	 }
	 
	 public function get_perusahaan($id) {
        return $this->db->get_where('id_type', array('id' => $id));
    }
}
