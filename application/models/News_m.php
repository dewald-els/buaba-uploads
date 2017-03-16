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

    public function save($article)
    {
        $this->db->insert($this->table, $article);
        return $this->db->insert_id();
    }

    public function disable($news_id)
    {
        $this->db->where(array(
            $this->pk => $news_id
        ));
        $this->db->update($this->table, array('is_active' => '0'));
    }

    public function enable($news_id)
    {
        $this->db->where(array(
            $this->pk => $news_id
        ));
        $this->db->update($this->table, array('is_active' => '1'));
    }

}
