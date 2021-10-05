<?php

/**
 * @package  TeachingAndLearningStuffBasicProject
 */

namespace Inc;



/**
 * Show Name
 *
 * example class implementation shows name of company
 */
// Class ShowName extends Show {}
Class ShowName {
	#########################
	# Properties 			#
	#########################
	private	$companyName	= "Teaching & Learning Stuff";
	public	$companySlogan	= "Smart Starts Here";



	#########################
	# Initializers 			#
	#########################
	function __construct(){
		// parent::__construct($args); // call parent's contructor
		echo "<div class='classConstructor'>ShowName class constructor called</div>";

		return true;
	}
	
	function __destruct(){
		echo "<div class='classDestructor'>ShowName class destructor called</div>";

		return true;
	}





	#########################
	# Getters & Setters		#
	#########################
	/**
	 * Set company name
	 *
	 * @param string $companyName
	 */
	public function setCompanyName(string $companyName) : void {
		$this->companyName = $companyName;
	}

	final public function getCompanyName() : string {
		return $this->companyName;
	}
	
	final public function getSlogan() : string {
		return $this->companySlogan;
	}
	
	
	
	
	
	#########################
	# Methods				#
	#########################
	// [static] functions can be called without creating an object
	// Class::method()
	public static function buildEmailLink(string $emailAddress="") : string {
		// return $this->companyName; // ERROR: can not use $this-> in a static function
		echo "<p>static method called.  <code>\$this-></code> is not available in static methods.</p>";
		return "<a href='mailto:$emailAddress'>Send us an Email</a>";
	}



	// [public] setPublicNote() and setPrivateNote() are publicly accessible stub functions that both call a protected method setNote
	public function setPublicNote($theNote){
		return $this->setNote($theNote, 'public');
	}
	public function setPrivateNote($thePrivateNote){
		return $this->setNote($thePrivateNote, 'private');
	}
	
	
	
	/* PROTECTED functions only available inside class */
	protected function setNote($theNote, $theScope='public'){
		return true;
	}
}

?>