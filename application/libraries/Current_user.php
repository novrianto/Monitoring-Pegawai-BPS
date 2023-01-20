<?php
class Current_user {
    public $user = [];
    public $is_logged = false;

    public function __construct() {
        $CI =& get_instance();

        $token = $CI->session->userdata('user_token');
        if( $token ) {
            $curr = $CI->db->get_where('users', ['MD5(username)' => $token])->row_array();
            if( !empty($curr) ) {
                $curr['full_name'] = $curr['first_name'] . ' ' . $curr['last_name'];
                $this->user = $curr;
                $this->is_logged = true;
            }
        }
    }
}
?>