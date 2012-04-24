<?php
/**
 * @author : Guillaume Guerin
 *
 * Description : Html Tag Class
 * 
 * @license MIT
 * @link https://github.com/GecTeam/PhpBootstrap
 * @copyright GecTeam 2012
 * @version 1.0
 */

namespace Library;

/**
 * 
 * Generique HTML Tag
 * @author Guillaume
 *
 */
class Tag {
	
	/**************************************************************************
	 *						INTANCE VAR (private)
	 *************************************************************************/
	
	/**
	 * @example {"background-color" -> "white", ...}
	 * @var array of string (dic)
	 */
	private $_cssProperty;
	/** 
	 * @example {"oneclick(){}", ...}
	 * @var array of string (dict)
	 */
	private $_javascript;
	/**
	 * @example {"charset" -> "UTF8"}
	 * @var array of string (dict)
	 */
	private $_option;
	/**
	 * @example {Tag(), Tag()}
	 * @var array
	 */
	private $_content;
	/**
	 * @var boolean true if it's unitary tag
	 */
	private $_unitaryTag;
	/**
	 * @example "p" or "body"
	 * @var string
	 */
	private $_name;
	/**
	 @var boolean true if this is just text
	 */
	private $_textOnly;
	
	
	/**************************************************************************
	 * 							Consctructor
	 *************************************************************************/
	
	/**
	 * 
	 * Construct of Tag
	 * @param string $name @example html
	 * 
	 * optional :
	 * @param array of string $option @example {key->val, {"chaset"->"UTF8"}
	 * @param array $content @example {Tag(), Tag()}
	 * @param boolean $unitaryTag
	 * @param array of string $javascript
	 * @param array of string $cssProperty
	 * @param boolean $textOnly
	 */
	public function __construct($name, $option = NULL, $content = NULL,
	$unitaryTag = false, $javascript = NULL, $cssProperty = NULL,
	$textOnly = false) {
		if ($name == NULL or !is_string($name)) {
			throw new \InvalidArgumentException("String is require!");
		}
		$this->name = $name;
		
		$this->option = $option;
		$this->content = $content;
		$this->unitaryTag = $unitaryTag;
		$this->javascript = $javascript;
		$this->cssProperty = $cssProperty;
		$this->textOnly = $textOnly;
	}
	
	/**
	 * 
	 * @return string html code
	 */
	public function getHtml() {
		if ($this->textOnly) {
			return $content;
		}
		
		$html = "<" . $this->name . " ";
		$html .= $this->compileCSS();
		$html .= $this->compileJavascript();
		$html .= $this->compileOption();
		
		if ($this->_unitaryTag)
			return $html . '/>';
		if ($this->_content != NULL) {
			foreach ($this->_content as $value) {
				$hmtl .= $value->getHtml();
			}
		}
			
		return $html . '</' . $this->_name . '>'; 
		
	}
	
	private function compileCSS() {
		if ($this->_cssProperty == NULL)
			return "";
		$html = "style=\"";
		foreach ($this->_cssProperty as $key => $value) {
			$html .= $key . '=' . $value . ';';
		}
		
		 return $html . '"';
	}
	
	private function compileJavascript() {
		if ($this->_javascript == NULL)
			return "";
		$html = "";
		foreach ($this->_javascript as $key => $value) {
			$html .= $key . '="' . $value . '" '; 
			
		}
		
		return $html;
		
	}
	
	private function compileOption() {
		if ($this->_option == NULL)
				return "";
		$html = "";
		foreach ($this->_option as $key => $value) {
			$html .= $key . '="' . $value . '" '; 	
		}
		return $html;
	}
}

?>