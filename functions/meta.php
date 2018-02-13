<?php

	add_action( 'cmb2_init', 'lang' );
	function lang() {
		$prefix = '_lang_';
		$icons = new_cmb2_box( array(
			'id'				=> 'lang',
			'title'				=> __( 'Language Direction', 'vmw' ),
			'object_types'		=> array( 'post', 'page', 'carousel' ),
			'show_in_rest'		=> true,
			'context'			=> 'side',
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'dir',
			'desc'				=> __( 'Language Direction', 'vmw' ),
			'type'				=> 'radio',
			'options'			=> array(
				'ltr'			=> __( 'LTR', 'vmw' ),
				'rtl'			=> __( 'RTL', 'vmw' ),
			),
			'default'			=> 'ltr',
		) );
	}

	add_action( 'cmb2_init', 'address' );
	function address() {
		$prefix = '_address_';
		$address = new_cmb2_box( array(
			'id'				=> 'address',
			'title'				=> __( 'Location Address', 'vmw' ),
			'object_types'		=> array( 'location' ),
			'show_in_rest'		=> true,
		) );
		$address->add_field( array(
			'id'				=> $prefix . 'url',
			'desc'				=> __( 'Website', 'vmw' ),
			'type'				=> 'text_url',
		) );
		$address->add_field( array(
			'id'				=> $prefix . 'street',
			'desc'				=> __( 'Street Address', 'vmw' ),
			'type'				=> 'text',
		) );
		$address->add_field( array(
			'id'				=> $prefix . 'locality',
			'desc'				=> __( 'City', 'vmw' ),
			'type'				=> 'text',
		) );
		$address->add_field( array(
			'id'				=> $prefix . 'region',
			'desc'				=> __( 'Region', 'vmw' ),
			'type'				=> 'text',
		) );
		$address->add_field( array(
			'id'				=> $prefix . 'postcode',
			'desc'				=> __( 'Postal Code', 'vmw' ),
			'type'				=> 'text',
		) );
		$address->add_field( array(
			'id'				=> $prefix . 'country',
			'desc'				=> __( 'Country', 'vmw' ),
			'type'				=> 'text',
		) );
		$address->add_field( array(
			'id'				=> $prefix . 'img',
			'desc'				=> __( 'Photo', 'vmw' ),
			'type'				=> 'file',
		) );
	}

	add_action( 'cmb2_init', 'post_meta' );
	function post_meta() {
		$prefix = '_post_';
		$vmworld = new_cmb2_box( array(
			'id'				=> 'vmworld',
			'title'				=> __( 'VMWorld Info', 'vmw' ),
			'object_types'		=> array( 'post' ),
			'show_in_rest'		=> true,
		) );
		$vmworld->add_field( array(
			'id'				=> $prefix . 'start',
			'desc'				=> __( 'Start Date Of Event', 'vmw' ),
			'type'				=> 'text_date',
			'date_format'		=> 'd/m/Y',
		) );
		$vmworld->add_field( array(
			'id'				=> $prefix . 'end',
			'desc'				=> __( 'End Date Of Event', 'vmw' ),
			'type'				=> 'text_date',
			'date_format'		=> 'd/m/Y',
		) );
		$vmworld->add_field( array(
			'id'				=> $prefix . 'location',
			'type'				=> 'post_search_ajax',
			'desc'				=> __( 'Start typing location name', 'vmw' ),
			'limit'				=> 1,
			'sortable'			=> false,
			'query_args'		=> array(
				'post_type'			=> array( 'location' ),
				'post_status'		=> array( 'publish' ),
				'posts_per_page'	=> -1
			)
		) );
		$vmworld->add_field( array(
			'id'				=> $prefix . 'show',
			'desc'				=> __( 'Show Event Address', 'vmw' ),
			'type'				=> 'checkbox',
		) );
		$vmworld->add_field( array(
			'id'				=> $prefix . 'ticket',
			'desc'				=> __( 'Ticket Link', 'vmw' ),
			'type'				=> 'text',
		) );
		$hol = new_cmb2_box( array(
			'id'				=> 'hol',
			'title'				=> __( 'Hands-On Lab', 'vmw' ),
			'object_types'		=> array( 'post' ),
			'show_in_rest'		=> true,
		) );
		$hol->add_field( array(
			'id'				=> $prefix . 'hol',
			'desc'				=> __( 'URL of Hands-On Lab', 'vmw' ),
			'type'				=> 'text_url',
		) );
		$hol->add_field( array(
			'id'				=> $prefix . 'holtitle',
			'desc'				=> __( 'Hands-On Lab Title', 'vmw' ),
			'type'				=> 'text',
		) );
		$video = new_cmb2_box( array(
			'id'				=> 'video',
			'title'				=> __( 'Post Video', 'vmw' ),
			'object_types'		=> array( 'post' ),
			'show_in_rest'		=> true,
		) );
		$video->add_field( array(
			'id'				=> $prefix . 'video',
			'desc'				=> __( 'URL of video', 'vmw' ),
			'type'				=> 'oEmbed',
		) );
		$video->add_field( array(
			'id'				=> $prefix . 'desc',
			'desc'				=> __( 'Get the image for the video by taking the video ID and using the following URL: https://i.ytimg.com/vi/VIDEOID/maxresdefault.jpg' ,'vmw' ),
			'type'				=> 'title'
		) );
		$wp = new_cmb2_box( array(
			'id'				=> 'wp',
			'title'				=> __( 'Post White Paper', 'vmw' ),
			'object_types'		=> array( 'post' ),
			'show_in_rest'		=> true,
		) );
		$wp->add_field( array(
			'id'				=> $prefix . 'wp_title',
			'desc'				=> __( 'White Paper Title', 'vmw' ),
			'type'				=> 'text',
		) );
		$wp->add_field( array(
			'id'				=> $prefix . 'wp_desc',
			'desc'				=> __( 'White Paper Description', 'vmw' ),
			'type'				=> 'textarea',
		) );
		$wp->add_field( array(
			'id'				=> $prefix . 'wp_img',
			'desc'				=> __( 'White Paper Cover Image', 'vmw' ),
			'type'				=> 'file',
		) );
		$wp->add_field( array(
			'id'				=> $prefix . 'wp_file',
			'desc'				=> __( 'White Paper File', 'vmw' ),
			'type'				=> 'file',
		) );
		$wp->add_field( array(
			'id'				=> $prefix . 'wp_form',
			'desc'				=> __( 'Form', 'vmw' ),
			'type'				=> 'select',
			'show_option_none'	=> true,
			'options_cb'		=> 'jdn_gf_options',
		) );
	}

	add_action( 'cmb2_init', 'carousel_url' );
	function carousel_url() {
		$prefix = '_carousel_';
		$icons = new_cmb2_box( array(
			'id'				=> 'carousel',
			'title'				=> __( 'Carousel Link', 'vmw' ),
			'object_types'		=> array( 'carousel' ),
			'show_in_rest'		=> true,
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'url',
			'type'				=> 'post_search_ajax',
			'desc'				=> __( 'Start typing post title', 'vmw' ),
			'limit'				=> 1,
			'sortable'			=> false,
			'query_args'		=> array(
				'post_type'			=> array( 'post', 'page' ),
				'post_status'		=> array( 'publish' ),
				'posts_per_page'	=> -1
			)
		) );
		$icons->add_field( array(
			'id'				=> $prefix . 'blurb',
			'desc'				=> __( 'Slide Text', 'vmw' ),
			'type'				=> 'textarea',
		) );
	}

add_action( 'cmb2_init', 'yourprefix_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function yourprefix_register_user_profile_metabox() {
	$prefix = '_user_';
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile', 'vmw' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		//'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
	$cmb_user->add_field( array(
		'name'     => __( 'Extra Info', 'vmw' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Phone', 'vmw' ),
		'id'   => $prefix . 'phone',
		'type' => 'text',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Company', 'vmw' ),
		'id'   => $prefix . 'company',
		'type' => 'text',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Country', 'vmw' ),
		'id'   => $prefix . 'country',
		'type' => 'select',
		'options'	=> array(
'Afghanistan' => 'Afghanistan',
'Albania' => 'Albania',
'Algeria' => 'Algeria',
'American Samoa' => 'American Samoa',
'Andorra' => 'Andorra',
'Angola' => 'Angola',
'Antigua and Barbuda' => 'Antigua and Barbuda',
'Argentina' => 'Argentina',
'Armenia' => 'Armenia',
'Australia' => 'Australia',
'Austria' => 'Austria',
'Azerbaijan' => 'Azerbaijan',
'Bahamas' => 'Bahamas',
'Bahrain' => 'Bahrain',
'Bangladesh' => 'Bangladesh',
'Barbados' => 'Barbados',
'Belarus' => 'Belarus',
'Belgium' => 'Belgium',
'Belize' => 'Belize',
'Benin' => 'Benin',
'Bermuda' => 'Bermuda',
'Bhutan' => 'Bhutan',
'Bolivia' => 'Bolivia',
'Bosnia and Herzegovina' => 'Bosnia and Herzegovina',
'Botswana' => 'Botswana',
'Brazil' => 'Brazil',
'Brunei' => 'Brunei',
'Bulgaria' => 'Bulgaria',
'Burkina Faso' => 'Burkina Faso',
'Burundi' => 'Burundi',
'Cambodia' => 'Cambodia',
'Cameroon' => 'Cameroon',
'Canada' => 'Canada',
'Cape Verde' => 'Cape Verde',
'Cayman Islands' => 'Cayman Islands',
'Central African Republic' => 'Central African Republic',
'Chad' => 'Chad',
'Chile' => 'Chile',
'China' => 'China',
'Colombia' => 'Colombia',
'Comoros' => 'Comoros',
'Congo, Democratic Republic of the' => 'Congo, Democratic Republic of the',
'Congo, Republic of the' => 'Congo, Republic of the',
'Costa Rica' => 'Costa Rica',
'Côte d\'Ivoire' => 'Côte d\'Ivoire',
'Croatia' => 'Croatia',
'Cuba' => 'Cuba',
'Curaçao' => 'Curaçao',
'Cyprus' => 'Cyprus',
'Czech Republic' => 'Czech Republic',
'Denmark' => 'Denmark',
'Djibouti' => 'Djibouti',
'Dominica' => 'Dominica',
'Dominican Republic' => 'Dominican Republic',
'East Timor' => 'East Timor',
'Ecuador' => 'Ecuador',
'Egypt' => 'Egypt',
'El Salvador' => 'El Salvador',
'Equatorial Guinea' => 'Equatorial Guinea',
'Eritrea' => 'Eritrea',
'Estonia' => 'Estonia',
'Ethiopia' => 'Ethiopia',
'Faroe Islands' => 'Faroe Islands',
'Fiji' => 'Fiji',
'Finland' => 'Finland',
'France' => 'France',
'French Polynesia' => 'French Polynesia',
'Gabon' => 'Gabon',
'Gambia' => 'Gambia',
'Georgia' => 'Georgia',
'Germany' => 'Germany',
'Ghana' => 'Ghana',
'Greece' => 'Greece',
'Greenland' => 'Greenland',
'Grenada' => 'Grenada',
'Guam' => 'Guam',
'Guatemala' => 'Guatemala',
'Guinea' => 'Guinea',
'Guinea-Bissau' => 'Guinea-Bissau',
'Guyana' => 'Guyana',
'Haiti' => 'Haiti',
'Honduras' => 'Honduras',
'Hong Kong' => 'Hong Kong',
'Hungary' => 'Hungary',
'Iceland' => 'Iceland',
'India' => 'India',
'Indonesia' => 'Indonesia',
'Iran' => 'Iran',
'Iraq' => 'Iraq',
'Ireland' => 'Ireland',
'Israel' => 'Israel',
'Italy' => 'Italy',
'Jamaica' => 'Jamaica',
'Japan' => 'Japan',
'Jordan' => 'Jordan',
'Kazakhstan' => 'Kazakhstan',
'Kenya' => 'Kenya',
'Kiribati' => 'Kiribati',
'North Korea' => 'North Korea',
'South Korea' => 'South Korea',
'Kosovo' => 'Kosovo',
'Kuwait' => 'Kuwait',
'Kyrgyzstan' => 'Kyrgyzstan',
'Laos' => 'Laos',
'Latvia' => 'Latvia',
'Lebanon' => 'Lebanon',
'Lesotho' => 'Lesotho',
'Liberia' => 'Liberia',
'Libya' => 'Libya',
'Liechtenstein' => 'Liechtenstein',
'Lithuania' => 'Lithuania',
'Luxembourg' => 'Luxembourg',
'Macedonia' => 'Macedonia',
'Madagascar' => 'Madagascar',
'Malawi' => 'Malawi',
'Malaysia' => 'Malaysia',
'Maldives' => 'Maldives',
'Mali' => 'Mali',
'Malta' => 'Malta',
'Marshall Islands' => 'Marshall Islands',
'Mauritania' => 'Mauritania',
'Mauritius' => 'Mauritius',
'Mexico' => 'Mexico',
'Micronesia' => 'Micronesia',
'Moldova' => 'Moldova',
'Monaco' => 'Monaco',
'Mongolia' => 'Mongolia',
'Montenegro' => 'Montenegro',
'Morocco' => 'Morocco',
'Mozambique' => 'Mozambique',
'Myanmar' => 'Myanmar',
'Namibia' => 'Namibia',
'Nauru' => 'Nauru',
'Nepal' => 'Nepal',
'Netherlands' => 'Netherlands',
'New Zealand' => 'New Zealand',
'Nicaragua' => 'Nicaragua',
'Niger' => 'Niger',
'Nigeria' => 'Nigeria',
'Northern Mariana Islands' => 'Northern Mariana Islands',
'Norway' => 'Norway',
'Oman' => 'Oman',
'Pakistan' => 'Pakistan',
'Palau' => 'Palau',
'Palestine, State of' => 'Palestine, State of',
'Panama' => 'Panama',
'Papua New Guinea' => 'Papua New Guinea',
'Paraguay' => 'Paraguay',
'Peru' => 'Peru',
'Philippines' => 'Philippines',
'Poland' => 'Poland',
'Portugal' => 'Portugal',
'Puerto Rico' => 'Puerto Rico',
'Qatar' => 'Qatar',
'Romania' => 'Romania',
'Russia' => 'Russia',
'Rwanda' => 'Rwanda',
'Saint Kitts and Nevis' => 'Saint Kitts and Nevis',
'Saint Lucia' => 'Saint Lucia',
'Saint Vincent and the Grenadines' => 'Saint Vincent and the Grenadines',
'Samoa' => 'Samoa',
'San Marino' => 'San Marino',
'Sao Tome and Principe' => 'Sao Tome and Principe',
'Saudi Arabia' => 'Saudi Arabia',
'Senegal' => 'Senegal',
'Serbia' => 'Serbia',
'Seychelles' => 'Seychelles',
'Sierra Leone' => 'Sierra Leone',
'Singapore' => 'Singapore',
'Sint Maarten' => 'Sint Maarten',
'Slovakia' => 'Slovakia',
'Slovenia' => 'Slovenia',
'Solomon Islands' => 'Solomon Islands',
'Somalia' => 'Somalia',
'South Africa' => 'South Africa',
'Spain' => 'Spain',
'Sri Lanka' => 'Sri Lanka',
'Sudan' => 'Sudan',
'Sudan, South' => 'Sudan, South',
'Suriname' => 'Suriname',
'Swaziland' => 'Swaziland',
'Sweden' => 'Sweden',
'Switzerland' => 'Switzerland',
'Syria' => 'Syria',
'Taiwan' => 'Taiwan',
'Tajikistan' => 'Tajikistan',
'Tanzania' => 'Tanzania',
'Thailand' => 'Thailand',
'Togo' => 'Togo',
'Tonga' => 'Tonga',
'Trinidad and Tobago' => 'Trinidad and Tobago',
'Tunisia' => 'Tunisia',
'Turkey' => 'Turkey',
'Turkmenistan' => 'Turkmenistan',
'Tuvalu' => 'Tuvalu',
'Uganda' => 'Uganda',
'Ukraine' => 'Ukraine',
'United Arab Emirates' => 'United Arab Emirates',
'United Kingdom" selected="selected' => 'United Kingdom',
'United States' => 'United States',
'Uruguay' => 'Uruguay',
'Uzbekistan' => 'Uzbekistan',
'Vanuatu' => 'Vanuatu',
'Vatican City' => 'Vatican City',
'Venezuela' => 'Venezuela',
'Vietnam' => 'Vietnam',
'Virgin Islands, British' => 'Virgin Islands, British',
'Virgin Islands, U.S.' => 'Virgin Islands, U.S.',
'Yemen' => 'Yemen',
'Zambia' => 'Zambia',
'Zimbabwe' => 'Zimbabwe'
		)
	) );
}

	// Show On Filter
	function cmb_show_on_post_format( $display, $post_format ) {
		if ( ! isset( $post_format['show_on']['key'] ) ) {
			return $display;
		}
		$post_id = 0;
		if ( isset( $_GET['post'] ) ) {
			$post_id = $_GET['post'];
		} elseif ( isset( $_POST['post_ID'] ) ) {
			$post_id = $_POST['post_ID'];
		}
		if ( ! $post_id ) {
			return $display;
		}
		$value  = get_post_format($post_id);

		if ( empty( $post_format['show_on']['key'] ) ) {
			return (bool) $value;
		}
		return $value == $post_format['show_on']['value'];
	}
	add_filter( 'cmb2_show_on', 'cmb_show_on_post_format', 10, 2 );

	function jdn_gf_options() {
		$form_array = array();

		// Gravity Form
		if ( class_exists( 'RGFormsModel' ) ) {
			$forms = RGFormsModel::get_forms( null, 'title' );
			if( !empty( $forms ) && is_array( $forms ) ) {
				foreach( $forms as $form ) {
					if( isset( $form->title, $form->id ) )
						$form_array[ $form->id ] = $form->title;
				}
			}
		}

		return $form_array;
	}