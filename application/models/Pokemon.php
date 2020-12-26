<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pokemon extends CI_Model
{

    public function getPokemons()
    {
        $this->db->select('
            pokemon_id, image, pokemon.name as pname, category.name as cname, ability.name as aname
        ');
        $this->db->from('pokemon');
        $this->db->join('category', 'category.category_id=pokemon.category_id');
        $this->db->join('ability', 'ability.ability_id=pokemon.ability_id');
        return $this->db->get()->result_array();
    }

    public function insertPokemon($data, $type)
    {
        $this->db->trans_start();
        $this->db->insert('pokemon', $data);
        $pokemon_id = $this->db->insert_id();
        $result = array();
        foreach ($type as $key => $val) {
            $result[] = array(
                'pokemon_id' => $pokemon_id,
                'type_id' => $_POST['type'][$key]
            );
        }

        $this->db->insert_batch('p_type', $result);
        $this->db->trans_complete();
    }

    public function getCategories()
    {
        return $this->db->get('category')->result_array();
    }

    public function getAbilities()
    {
        return $this->db->get('ability')->result_array();
    }

    public function getTypes()
    {
        return $this->db->get('type')->result_array();
    }
}
