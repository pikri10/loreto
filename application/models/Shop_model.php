<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_Model
{   
    public function get_price(){
    $sql = "SELECT (price * 2) FROM item ORDER BY id";
    return $this->db->query($sql);
    }
}
