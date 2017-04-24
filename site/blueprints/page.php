<?php if(!defined('KIRBY')) exit ?>

title: Article
pages: false
files: true
fields: 
	title:
		label: Titre de la définition
		type:  title
	text:
		label: texte
		type: markdown
	citation:
		label: Citation
		type: markdown
	labo:
		label: Labo
		type: tags
		width: 1/2
	ouverture:
		label: Ouverture publique
		type: tags
		width: 1/2
	geolocalisation:
		label: Géolocalisation
		type: tags
		width: 1/2	
	traduction:
		label: Traduction
		type: text
		width: 1/2
	collect:
	  label: Collecte
	  type: markdown
	publication:
		label: Publication
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



