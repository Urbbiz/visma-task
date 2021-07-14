<?php
namespace Syllable\App;

use Psr\Log\Logger;
use Syllable\App;
use Syllable\Service\SyllableAlgorithm;
use Syllable\Service\SyllableResult;
use Syllable\PatternModel\PatternExtractor;
use Syllable\PatternModel\PatternCollection;
use Syllable\IO\UserInput;



class Application
{
    public function runApp ()
    {

        
        $userInput = new UserInput;
         $SyllableAlgorithm = new SyllableAlgorithm();
         
        
        echo "if you want to syllable SENTENCE, press 1, else you will directed to WORD syllable"."\n";
        $input = trim(fgets(STDIN, 1024));

        if($input == 1){
            Echo "You chose to syllable SENTENCE". "\n";
           
            $givenSentence = $userInput->getInputSentence();  // paduoda ivesta zodi
            $sentenceToWordArray = $userInput->getSentenceWordsInArray($givenSentence);
           
            $patternExtractor = new PatternExtractor();
        $patternsResult = $patternExtractor->getPatterns(DIR."data/inputfile.txt"); // issitraukiam txt failo turini.
        $sylableSentence='';
            foreach ($sentenceToWordArray as $word){
                $syllableWord=$SyllableAlgorithm->syllable($word, $patternsResult);
                $sylableSentence.= $syllableWord->dashResult;
                echo $syllableWord->dashResult." ";
            }
            exit(0);
        }

//        $d=mktime();
//        echo "Created date is " . date("Y-m-d h:i:sa", $d);
            $logger = new Logger();
//        $logger->log(""," test message time of message:".date("Y-m-d h:i:sa", $d)."\n");
            


        // $userInput = new UserInput;
        $givenWord = $userInput->getInputWord();  // paduoda ivesta zodi

        $startTime = microtime(true); // laiko pradzia

        $patternExtractor = new PatternExtractor();
        $patternsResult = $patternExtractor->getPatterns(DIR."data/inputfile.txt"); // issitraukiam txt failo turini.



        // $SyllableAlgorithm = new SyllableAlgorithm();
        $syllableResult=$SyllableAlgorithm->syllable($givenWord, $patternsResult);

        echo  "Syllable result: ". $syllableResult->dashResult . "\n";   // parodo isskiemenuota zodi.

        // var_dump($syllableResult);


        $endTime = microtime(true); //laiko pabaiga
        $executionTime = round($endTime - $startTime, 4); // programos veikimo laikas suapvalintas iki 4 skaiciu po kablelio
        echo "Execution time: $executionTime seconds";

        $logger->info( "Syllable method took{$executionTime} seconds, syllabed word; {$givenWord}.");
    }

}