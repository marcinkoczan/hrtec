<?php
namespace MarcinKoczan;

class Extended extends Export {
    
    public function __construct($filename, $news) {
        $this->filename = $filename;
        $this->news = $news;
    }
    
    //save file, if exists add new data
    public function saveFile() {
        if ( $this->validatePath($this->filename ) ) {
            $this->convertAndSave($this->filename, $this->news);
        }
    }
    
}
