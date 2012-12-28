<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'wtf_';

global $meta_boxes;

$meta_boxes = array();


// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'themeinfo',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => 'Theme details',

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'download' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// List of meta fields
	'fields' => array(

		array(
			// Field name - Will be used as label
			'name'  => 'Theme demo',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}demo",
			// Field description (optional)
			'desc'  => 'Theme demo',
			'type'  => 'text',
			// Default value (optional)
			'std'   => '',
			
		),
		
		array(
			'name' => 'Theme description',
			'desc' => 'Small theme description',
			'id'   => "{$prefix}description",
			'type' => 'textarea',
			'cols' => '20',
			'rows' => '3',
		),
		
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => 'Theme designer',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}designer",
			// Field description (optional)
			'desc'  => 'Theme designer',
			'type'  => 'text',
			// Default value (optional)
			'std'   => 'Jinson',
			
		),
		
		array(
			// Field name - Will be used as label
			'name'  => 'Theme version',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}version",
			// Field description (optional)
			'desc'  => 'Theme version',
			'type'  => 'text',
			// Default value (optional)
			'std'   => '1.0.0',
			
		),		
		
		array(
			'name' => 'Release date',
			'id'   => "{$prefix}release",
			'type' => 'date',

			// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
			'js_options' => array(
				'appendText'      => '(yyyy-mm-dd)',
				'dateFormat'      => 'yy-mm-dd',
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),		
		
		array(
			'name' => 'Update date',
			'id'   => "{$prefix}update",
			'type' => 'date',

			// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
			'js_options' => array(
				'appendText'      => '(yyyy-mm-dd)',
				'dateFormat'      => 'yy-mm-dd',
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),		

	 array(
			// Field name - Will be used as label
			'name'  => 'Wordpress version',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}require",
			// Field description (optional)
			'desc'  => 'WordPress version required',
			'type'  => 'text',
			// Default value (optional)
			'std'   => 'WordPress 3+',
			
		),						
		array(
			'name'     => 'Layout',
			'id'       => "{$prefix}layout",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'Fixed' => 'Fixed',
				'Fluid' => 'Fluid',
				'Responsive' => 'Responsive',
			),
			// Select multiple values, optional. Default is false.
			'multiple' => false,
		),
		
		array(
			// Field name - Will be used as label
			'name'  => 'Columns',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}columns",
			// Field description (optional)
			'desc'  => 'Number of columns',
			'type'  => 'text',
			// Default value (optional)
			'std'   => '3 column',
			
		),	
		
				
		array(
			'name'     => 'Browsers',
			'id'       => "{$prefix}browser",
			'type' => 'checkbox_list',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'Firefox' => 'Firefox',
				'Opera' => 'Opera',
				'IE-8' => 'IE-8',
				'IE-9' => 'IE-9',
				'Chrome' => 'Chrome',
				'Safari' => 'Safari',
			),
			// Select multiple values, optional. Default is false.
			'multiple' => true,
		),
		
		array(
			// Field name - Will be used as label
			'name'  => 'Files included',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}files",
			// Field description (optional)
			'desc'  => 'Files included in the download',
			'type'  => 'text',
			// Default value (optional)
			'std'   => '',
			
		),	
		
		array(
			// Field name - Will be used as label
			'name'  => 'Documentation',
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}document",
			// Field description (optional)
			'desc'  => 'Is documentation included?',
			'type'  => 'text',
			// Default value (optional)
			'std'   => '',
			
		),	
		
		array(
			'name'             => 'Theme screenshots',
			'id'               => "{$prefix}screens",
			'type'             => 'plupload_image',
			'max_file_uploads' => 10,
			'desc'  => 'Upload screenshots of the theme. Use images with minimum 920px wide.',
		),


	),

	
);



/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function wtf_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'wtf_register_meta_boxes' );?>