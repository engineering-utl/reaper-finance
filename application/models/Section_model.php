<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_sections() {
        return $this->db->get('sections')->result();
    }

    public function get_section_contents($section_id) {
        $this->db->where('section_id', $section_id);
        return $this->db->get('section_contents')->result();
    }

    public function update_section_content($content_id, $content) {
        $this->db->where('id', $content_id);
        $this->db->update('section_contents', $content);
    }

    public function add_section_content($section_id, $content) {
        $data = [
            'section_id' => $section_id,
            'content_type' => $content['content_type'],
            'content' => $content['content']
        ];
        $this->db->insert('section_contents', $data);
    }

    public function delete_section_content($content_id) {
        $content = $this->db->get_where('section_contents', ['id' => $content_id])->row();
        if ($content && $content->content_type == 'image') {
            $path = FCPATH . 'images/' . $content->content;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->db->where('id', $content_id);
        $this->db->delete('section_contents');
    }

    public function get_content($content_id) {
        return $this->db->get_where('section_contents', ['id' => $content_id])->row();
    }

    public function get_sections_with_contents() {
    $sections = $this->get_sections();
    foreach ($sections as &$section) {
        $section->contents = $this->get_section_contents($section->id);
    }
    return $sections;
}
}
