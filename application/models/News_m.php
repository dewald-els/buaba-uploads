<?php

/**
 * Created by PhpStorm.
 * User: forest-sumo
 * Date: 2017/03/14
 * Time: 11:53 PM
 */
class News_m extends CI_Model
{

    private $table = 'news';
    private $pk = 'news_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = NULL)
    {
        if (is_null($id)) {
            $news = $this->db->get($this->table);
        } else {
            $this->db->where(array($this->pk => $id));
            $news = $this->db->get($this->table);
        }

        return $news;
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
    }

}
