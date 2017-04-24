<?php if(!defined('KIRBY')) exit ?>

title: Effluves
pages: article
files: true
fields:
	title:
		label: Title
		type:  text
	text:
		label: Texte
		type: markdown			
	ressources:
		label: Images
		type: headline
	ressourcesmedia: 
		label: Images
		type: selector
		mode: multiple
		types:
			- all
	linkeddefinition:
		label: Définitions Liées
		type: multiselect
		required: true
		search: true
		options: query
		width: 1/3
		query:
			page: /
			fetch: pages
			template: page
	credits:
		label: Crédits
		type: markdown