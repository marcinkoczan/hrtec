<?php
namespace MarcinKoczan;

require __DIR__.'/../../vendor/autoload.php';

abstract class Export extends parseCSV {
    protected $news;
    protected $filename;
    
    abstract function saveFile();
    
    //using parseCSV library to save data as csv
    protected function convertAndSave() {
        $this->save($this->filename, $this->news, true);
        echo "Plik został zapisany - ".$this->filename."\n";
    }
    
    //validating path
    protected function validatePath() {
        $pathArray = explode('.', $this->filename);
        
        //check the filename is not empty
        if ( empty( $pathArray[0] ) ) {
            echo "Proszę o podanie porawnej nazwy pliku \n";
            return false;
        }
        else {
            if ( end($pathArray) == 'csv' ) {
                return true;
            }
            else {
                if ( count($pathArray) > 1 ) {
                    array_pop($pathArray);
                    $this->filename = implode(' ', $pathArray);
                }
                $this->filename .= '.csv';
                echo "Złe rozszerzenie pliku lub jego brak. Zostało dodane rozszerzenie csv. \n";
                return true;
            }
        }
    }
    
    //check if file exists
    protected function exists() {
        if (file_exists($this->filename) == 1 ) {
            unlink($this->filename);
            echo "Plik ".$this->filename." został nadpisany \n";
            return true;
        }
        else {
            return true;
        }
    }
}
