<?php

/**
 * SampleClass short summary.
 *
 * SampleClass description.
 *
 * @version 1.0
 * @author Michael
 */
class SamplePersonClass
{
    // Create member variables and set some default values
    public $FirstName;
    public $LastName;
    private $Age = 0;
    public $myInt = 0;

    // ///////////////////////////
    public function HaveBirthday()
    {
        $this->Age = $this->Age + 1;

        return $this->Age;

    }

}