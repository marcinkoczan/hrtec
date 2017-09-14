<?php
namespace MarcinKoczan;

require __DIR__.'/Export.php';

class Simple extends Export {
    
    public function __construct($filename, $news) {
        $this->filename = $filename;
        $this->news = $news;
    }
    
    //save file, if exists override
    public function saveFile() { 
        if ( $this->validatePath($this->filename ) ) {
            if ( $this->exists() ) {
                $this->convertAndSave($this->filename, $this->news);
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    
}

