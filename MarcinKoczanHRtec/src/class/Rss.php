<?php
namespace MarcinKoczan;
    
    class Rss {
        private $data;
        
        public function __construct( $src ) {
            $this->data = simplexml_load_file($src);
        }
        
        //get news as array for saving by csv library
        public function  getNews() {
            $array = [];
            $array[0]['title'] = "title";
            $array[0]['description'] = "description";
            $array[0]['link'] = "link";
            $array[0]['pubDate'] = "pubDate";
            $array[0]['creator'] = "creator";
            
            $i = 1;
            
            foreach ( $this->data->channel->item as $value ) {
                $array[$i]['title'] = (string) $value->title;
                $array[$i]['description'] = (string) $value->description;
                $array[$i]['link'] = (string) $value->link;
                $array[$i]['pubDate'] = (string) date("Y-m-d H:i:s", strtotime($value->pubDate));
                $array[$i]['creator'] = $this->data->channel->title;
                
                $i++;
            }
            return $array;
            
        }
        
    }

?>