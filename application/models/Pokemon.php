<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pokemon extends CI_Model
{
    public function insertPokemon($data)
    {
        $this->db->insert('pokemon', $data);
    }

    public function getCategories()
    {
        return $this->db->get('p_category')->result_array();
    }

    public function getAbilities()
    {
        return $this->db->get('p_ability')->result_array();
    }
}
