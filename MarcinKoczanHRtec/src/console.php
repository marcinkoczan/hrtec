<?php
namespace MarcinKoczan;

    require __DIR__.'/class/Rss.php';
    require __DIR__.'/class/Simple.php';
    require __DIR__.'/class/Extended.php';
    
    const SIMPLE = 'csv:simple';
    const EXTENDED = 'csv:extended';
    
    if (!isset($argv[2]) || !isset($argv[3])) {
        echo "Podaj poprawne polecenie! Np. csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main eksport_prosty.csv  \n";
        return;
    }
    
    //url validating
    if ( !filter_var($argv[2], FILTER_VALIDATE_URL) ) {
        echo "Podaj poprawny adres URL \n";
        return;
    }
    
    //get URL
    $Rss = new Rss($argv[2]);
    
    //commands-simple or extended generating
    switch ($argv[1]) {
        
        case SIMPLE:
            
            $Simple = new Simple($argv[3], $Rss->getNews());
            $Simple->saveFile();
            break;
        
        case EXTENDED:
            
            $Extended = new Extended($argv[3], $Rss->getNews());
            $Extended->saveFile();
            break;
        
        case "help":
            
            echo "Składnia polecenia ma postać: csv:simple URL PATH \n";
            break;
        
        default:
           echo  "Podaj poprawne polecenie! Np. csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main eksport_prosty.csv  \n";
            
    }
    
?>
