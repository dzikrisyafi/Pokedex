<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pokemon_model extends CI_Model
{
    public function getPokemonImage($id)
    {
        $this->db->select('image');
        $this->db->from('pokemon');
        $this->db->where('pokemon_id', $id);
        return $this->db->get()->row_array();
    }

    public function getAllPokemon($page)
    {
        // $this->db->order_by('name', 'ASC');
        // return $this->db->get('pokemon')->result_array();
        $offset = 10 * $page;
        $limit = 10;

        $this->db->limit($limit, $offset);
        $this->db->order_by('name', 'ASC');
        return $this->db->get('pokemon')->result_array();
    }

    public function getPokemons($limit, $start)
    {
        $this->db->select('
            pokemon_id, image, pokemon.name as pname, category.name as cname, ability.name as aname
        ');
        $this->db->from('pokemon');
        $this->db->join('category', 'category.category_id=pokemon.category_id');
        $this->db->join('ability', 'ability.ability_id=pokemon.ability_id');
        $this->db->order_by('pokemon.name', 'ASC');
        return $this->db->get('', $limit, $start)->result_array();
    }

    public function getPokemonByID($id)
    {
        $this->db->select('
            pokemon_id, image, pokemon.name as pname, pokemon.description as pdesc, 
            category.name as cname, ability.name as aname, ability.description as adesc, bgcolor
        ');
        $this->db->from('pokemon');
        $this->db->join('category', 'category.category_id=pokemon.category_id');
        $this->db->join('ability', 'ability.ability_id=pokemon.ability_id');
        $this->db->where('pokemon_id', $id);
        return $this->db->get()->row_array();
    }

    public function countAllPokemon()
    {
        return $this->db->get('pokemon')->num_rows();
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

    public function editPokemon($data, $type, $id)
    {
        $this->db->trans_start();

        $this->db->where('pokemon_id', $id);
        $this->db->update('pokemon', $data);

        $this->db->delete('p_type', ['pokemon_id' => $id]);

        $result = array();
        foreach ($type as $key => $val) {
            $result[] = array(
                'pokemon_id' => $this->input->post('pokemon_id'),
                'type_id' => $_POST['type'][$key]
            );
        }

        $this->db->insert_batch('p_type', $result);
        $this->db->trans_complete();
    }

    public function deletePokemon($id)
    {
        $this->db->delete('pokemon', ['pokemon_id' => $id]);
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

    public function getTypesByPokemonID($id)
    {
        $this->db->select('type.id as id, name, bgcolor');
        $this->db->from('type');
        $this->db->join('p_type', 'p_type.type_id=type.id');
        $this->db->where('p_type.pokemon_id', $id);
        return $this->db->get()->result_array();
    }
}
