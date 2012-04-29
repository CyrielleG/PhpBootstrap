<?php 

/**
 * 
 * 
 * @author Cyrielle&Eric
 * Description : Html Img Class
 * 
 * @license MIT
 * @link https://github.com/GecTeam/PhpBootstrap
 * @copyright GecTeam 2012
 * @version 1.0
 */

namespace Library;

	class Img extends Tag {
		
		/**
		 * 
		 * @param $src string chemin de l'image ex: c://Users/Moi/Images/Img.jpg
		 * @param $alt string texte alternatif à l'image ex: image de lion
		 * @param $title string titre de l'image(optionnel) ex: Lion d'Afrique
		 */
		function __construct($src, $alt, $title = NULL)
		{
			if(is_string($title)) {
				parent::__construct(img, array("src" => $src, "alt" => $alt,
				"title" => $title), NULL, true);
			} else {
				parent::__construct(img, array("src" => $src, "alt" => $alt), 
				NULL, true);
			}
		}	
	}	
?>