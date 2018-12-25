<?php

class Blogmodel extends CI_Model {

    public $title;
    public $description;
    public $description_short;
    public $meta_keys;
    public $meta_description;
    public $date;

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->library('ion_auth');
    }

    public function get($id){
        return $this->db->get_where('blogs', array('blogs_id' => $id))->row();
    }

    public function getBySlug($slug){
        return $this->db->get_where('blogs', array('slug' => $slug))->row();
    }

    public function getAll() {
        $query = $this->db->get('blogs');
        return $query->result();
    }

    public function insert($data) {
        $this->title = $data['title'];
        $slugs = self::slugify($data['title']);
        $q = $this->db->from('blogs')->where('slug', $slugs)->get();
        if($q->num_rows() > 0) {
            $slugs .= '_' . time();
        }
        $this->slug = $slugs;
        $this->description = isset($data['description']) ? $data['description'] : '';
        $this->description_short = isset($data['description_short']) ? $data['description_short'] : '';
        $this->meta_keys = isset($data['meta_keys']) ? $data['meta_keys'] : '';
        $this->meta_description = isset($data['meta_description']) ? $data['meta_description'] : '';
        $this->date = date('Y-m-d');

        $this->db->insert('blogs', $this);
    }

    public function update($id, $data) {
        $this->title = $data['title'];
        $this->description = isset($data['description']) ? $data['description'] : '';
        $this->description_short = isset($data['description_short']) ? $data['description_short'] : '';
        $this->meta_keys = isset($data['meta_keys']) ? $data['meta_keys'] : '';
        $this->meta_description = isset($data['meta_description']) ? $data['meta_description'] : '';
        $this->date = date('Y-m-d');
        $slugs = self::slugify($data['title']);
        $q = $this->db->from('blogs')->where('slug', $slugs)->get();
        if($q->num_rows() > 0) {
            $res = $q->result();
            if($res[0]->blogs_id != $id) {
                $slugs .= '_' . time();
            }
        }
        $this->slug = $slugs;
        $this->db->update('blogs', $this, array('blogs_id' => $id));
    }

    public function delete($id){
        $this->db->delete('blogs', array('blogs_id' => $id));
    }

    public static function slugify($text)
    {
        $translation = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm',
            'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh',
            'щ' => 'sch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'і' => 'i',
            'ї' => 'yi', 'є' => 'ye', 'ґ' => 'g', 'е' => 'e',
            '\'' => '', '"' => '', '`' => '', 'ь' => '', 'ъ' => ''
        ];
        $text = trim($text);
        $text = mb_convert_case($text, MB_CASE_LOWER);
        $text = strtr($text, $translation);
        $text = preg_replace('~(\W+)~', '-', $text);
        $text = trim($text, '-');
        return $text;
    }
}
