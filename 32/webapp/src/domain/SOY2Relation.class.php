<?php
/**
 * @table soy2_relation
 */
class SOY2Relation {

	/**
	 * @column sample_id
	 */
	private $sampleId;

	private $text;

	function getSampleId(){
		return $this->sampleId;
	}
	function setSampleId($sampleId){
		$this->sampleId = $sampleId;
	}

	function getText(){
		return $this->text;
	}
	function setText($text){
		$this->text = $text;
	}
}