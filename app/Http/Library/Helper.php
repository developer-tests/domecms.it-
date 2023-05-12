<?php

use Stichoza\GoogleTranslate\GoogleTranslate;

/**
 * Fetch General Settings set for whole site
 */
function translateion($from,$to,$string){
        $tr = new GoogleTranslate();
        $tr->setSource($from); 
        $tr->setTarget($to);
        return $tr->translate($string);
}