<?php
/*Clean up strings*/
class Sanitize extends Eloquent
    {   
        /*Set Global Properties (variable) for all Methods (Functions) */
        public $userInput;
        
        /*Method (function) to get the variable into the object*/
        public function setSanitize($userInput)
            {
                $this->userInput = $userInput;
            }
    
        /*Method to return the sanitized string*/
        public function getSanitize()
            {
                /*Code to strip any strange characters from user input*/
                $sanitize = $this->userInput;
                
                /*Set to US character set*/
                setlocale(LC_ALL, 'en_US.UTF8');

                /*Delimeter to replace spaces and other non normal characters*/
                $delimiter = '-';
                        
                /*Regex to remove special characters, etc*/
                $sanitize = iconv('UTF-8', 'ASCII//TRANSLIT', $sanitize);
                $sanitize = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $sanitize);
                $sanitize = preg_replace("/[\/_|+ -]+/", $delimiter, $sanitize);
                $sanitize = strtolower(trim($sanitize, $delimiter));
            
		        return $sanitize;
	         }
    
    }