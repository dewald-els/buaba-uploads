<?php
/**
 * Created by PhpStorm.
 * User: forest-sumo
 * Date: 2017/03/16
 * Time: 12:20 AM
 */

class Document_m extends CI_Model {

    protected $table = 'doc';
    protected $pk = 'doc_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function save($document)
    {
        $insert_id = null;

        if (is_array($document))
        {
            $insert_id = [];
            foreach ($document as $doc)
            {
                $this->db->insert($this->table, $doc);
                array_push($insert_id, $this->db->insert_id());
            }
        }
        else 
        {
            $this->db->insert($this->table, $document);
            $insert_id = $this->db->insert_id();
        }

        return $insert_id;
    }

}