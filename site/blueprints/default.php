<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: true
files: true
fields:
  title:
    label: Titre
    type:  text
 	text:
 		label: Texte
 		type: markdown
	ressourcesmedia: 
		label: Images
		type: selector
		mode: multiple
		types:
			- all