<?php
// This file is generated. Do not modify it manually.
return array(
	'block-projects' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-portfolio/block-projects',
		'version' => '0.1.0',
		'title' => 'Projects',
		'category' => 'widgets',
		'icon' => 'star-filled',
		'description' => 'Display a projects card with icon, percentage, and label with lightbox popup.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			
		),
		'textdomain' => 'blocks-portfolio',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'block-skill' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'blocks-portfolio/block-skill',
		'version' => '0.1.0',
		'title' => 'Skill Card',
		'category' => 'widgets',
		'icon' => 'star-filled',
		'description' => 'Display a skill card with icon, percentage, and label with lightbox popup.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'skillIcon' => array(
				'type' => 'string',
				'default' => '✨'
			),
			'skillPercentage' => array(
				'type' => 'string',
				'default' => '92%'
			),
			'skillLabel' => array(
				'type' => 'string',
				'default' => 'Figma'
			),
			'imageUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'imageDescription' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'textdomain' => 'blocks-portfolio',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	)
);
