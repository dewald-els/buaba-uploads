<?php
/**
 * Created by PhpStorm.
 * User: dewald
 * Date: 2/28/2017
 * Time: 5:03 PM
 */
namespace Bauba
{
    class NewsArticle
    {
        public $news_id;
        public $news_title;
        public $news_summary;
        public $year;
        public $content;
        public $date_created;

        public function __construct()
        {
        }

    }
}