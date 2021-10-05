<?php

/**
 * @package  TeachingAndLearningStuffBasicProject
 */

namespace Inc;



/**
 * Counter
 *
 * example class implementation holds a counter
 *
 * Provide initial value on instantiation
 *
 * @param int $initialValue
 *
 */
// Class ShowName extends Show {}
Class Counter {
	#########################
	# Properties 			#
	#########################
	public $counter;


	#########################
	# Initializers 			#
	#########################
	/**
	 * @param int $initialValue
	 */
	function __construct(int $initialValue){
		// parent::__construct($args); // call parent's contructor
		
		$this->counter = $initialValue;
		
		echo "<div class='classConstructor'>Counter class constructor called with: $initialValue</div>";
		return true;
	}
	
	function __destruct(){
		echo "<div class='classDestructor'>Counter class destructor called</div>";
		return true;
	}



	#########################
	# Getters & Setters		#
	#########################
	public function getCounter() : int {
		return $this->counter;
	}




	#########################
	# Methods				#
	#########################
	/**
	 * Increase counter value by an integer
	 *
	 * @param int $value
	 */
	public function increaseCounter(int $value) : void {
		$this->counter += abs($value);
	}


	static function addNumbers(int ...$one) : int {
		$total = 0;
		foreach($one as $o){
			$total += $o;
		}
		return $total;
	}



}

?>