<h4><?php _e( 'Update My Information', 'vmw' ); ?></h4>

<form name="updateuser" action="<?php the_permalink(); ?>" method="POST">

	<?php $current_user = wp_get_current_user(); ?>

	<label for="fname"><?php _e( 'First Name' , 'vmw' ); ?>
		<input type="text" id="fname" value="<?php echo get_user_meta( $current_user->ID, 'first_name', true ); ?>" name="fname" />
	</label>

	<label for="lname"><?php _e( 'Last Name' , 'vmw' ); ?>
		<input type="text" id="lname" value="<?php echo get_user_meta( $current_user->ID, 'last_name', true ); ?>" name="lname" />
	</label>

	<label for="tel"><?php _e( 'Phone' , 'vmw' ); ?>
		<input type="tel" id="tel" value="<?php echo get_user_meta( $current_user->ID, '_user_phone', true ); ?>" name="tel" />
	</label>

	<label for="company"><?php _e( 'Company' , 'vmw' ); ?>
		<input type="text" id="company" value="<?php echo get_user_meta( $current_user->ID, '_user_company', true ); ?>" name="company" />
	</label>

	<label for="web"><?php _e( 'Website' , 'vmw' ); ?>
		<input type="text" id="web" value="<?php echo get_user_meta( $current_user->ID, 'url', true ); ?>" name="web" />
	</label>

	<label for="country"><?php _e( 'Country' , 'vmw' ); ?>
		<?php $country =  get_user_meta( $current_user->ID, '_user_country', true ); ?>
		<select name="country" id="country">
			<option value="Afghanistan" <?php if ($country == 'Afghanistan' ) echo 'selected' ; ?>>Afghanistan</option>
			<option value="Albania" <?php if ($country == 'Albania' ) echo 'selected' ; ?>>Albania</option>
			<option value="Algeria" <?php if ($country == 'Algeria' ) echo 'selected' ; ?>>Algeria</option>
			<option value="American Samoa" <?php if ($country == 'American Samoa' ) echo 'selected' ; ?>>American Samoa</option>
			<option value="Andorra" <?php if ($country == 'Andorra' ) echo 'selected' ; ?>>Andorra</option>
			<option value="Angola" <?php if ($country == 'Angola' ) echo 'selected' ; ?>>Angola</option>
			<option value="Antigua and Barbuda" <?php if ($country == 'Antigua and Barbuda' ) echo 'selected' ; ?>>Antigua and Barbuda</option>
			<option value="Argentina" <?php if ($country == 'Argentina' ) echo 'selected' ; ?>>Argentina</option>
			<option value="Armenia" <?php if ($country == 'Armenia' ) echo 'selected' ; ?>>Armenia</option>
			<option value="Australia" <?php if ($country == 'Australia' ) echo 'selected' ; ?>>Australia</option>
			<option value="Austria" <?php if ($country == 'Austria' ) echo 'selected' ; ?>>Austria</option>
			<option value="Azerbaijan" <?php if ($country == 'Azerbaijan' ) echo 'selected' ; ?>>Azerbaijan</option>
			<option value="Bahamas" <?php if ($country == 'Bahamas' ) echo 'selected' ; ?>>Bahamas</option>
			<option value="Bahrain" <?php if ($country == 'Bahrain' ) echo 'selected' ; ?>>Bahrain</option>
			<option value="Bangladesh" <?php if ($country == 'Bangladesh' ) echo 'selected' ; ?>>Bangladesh</option>
			<option value="Barbados" <?php if ($country == 'Barbados' ) echo 'selected' ; ?>>Barbados</option>
			<option value="Belarus" <?php if ($country == 'Belarus' ) echo 'selected' ; ?>>Belarus</option>
			<option value="Belgium" <?php if ($country == 'Belgium' ) echo 'selected' ; ?>>Belgium</option>
			<option value="Belize" <?php if ($country == 'Belize' ) echo 'selected' ; ?>>Belize</option>
			<option value="Benin" <?php if ($country == 'Benin' ) echo 'selected' ; ?>>Benin</option>
			<option value="Bermuda" <?php if ($country == 'Bermuda' ) echo 'selected' ; ?>>Bermuda</option>
			<option value="Bhutan" <?php if ($country == 'Bhutan' ) echo 'selected' ; ?>>Bhutan</option>
			<option value="Bolivia" <?php if ($country == 'Bolivia' ) echo 'selected' ; ?>>Bolivia</option>
			<option value="Bosnia and Herzegovina" <?php if ($country == 'Bosnia and Herzegovina' ) echo 'selected' ; ?>>Bosnia and Herzegovina</option>
			<option value="Botswana" <?php if ($country == 'Botswana' ) echo 'selected' ; ?>>Botswana</option>
			<option value="Brazil" <?php if ($country == 'Brazil' ) echo 'selected' ; ?>>Brazil</option>
			<option value="Brunei" <?php if ($country == 'Brunei' ) echo 'selected' ; ?>>Brunei</option>
			<option value="Bulgaria" <?php if ($country == 'Bulgaria' ) echo 'selected' ; ?>>Bulgaria</option>
			<option value="Burkina Faso" <?php if ($country == 'Burkina Faso' ) echo 'selected' ; ?>>Burkina Faso</option>
			<option value="Burundi" <?php if ($country == 'Burundi' ) echo 'selected' ; ?>>Burundi</option>
			<option value="Cambodia" <?php if ($country == 'Cambodia' ) echo 'selected' ; ?>>Cambodia</option>
			<option value="Cameroon" <?php if ($country == 'Cameroon' ) echo 'selected' ; ?>>Cameroon</option>
			<option value="Canada" <?php if ($country == 'Canada' ) echo 'selected' ; ?>>Canada</option>
			<option value="Cape Verde" <?php if ($country == 'Cape Verde' ) echo 'selected' ; ?>>Cape Verde</option>
			<option value="Cayman Islands" <?php if ($country == 'Cayman Islands' ) echo 'selected' ; ?>>Cayman Islands</option>
			<option value="Central African Republic" <?php if ($country == 'Central African Republic' ) echo 'selected' ; ?>>Central African Republic</option>
			<option value="Chad" <?php if ($country == 'Chad' ) echo 'selected' ; ?>>Chad</option>
			<option value="Chile" <?php if ($country == 'Chile' ) echo 'selected' ; ?>>Chile</option>
			<option value="China" <?php if ($country == 'China' ) echo 'selected' ; ?>>China</option>
			<option value="Colombia" <?php if ($country == 'Colombia' ) echo 'selected' ; ?>>Colombia</option>
			<option value="Comoros" <?php if ($country == 'Comoros' ) echo 'selected' ; ?>>Comoros</option>
			<option value="Congo, Democratic Republic of the" <?php if ($country == 'Congo, Democratic Republic of the') echo 'selected'; ?>>Congo, Democratic Republic of the</option>
			<option value="Congo, Republic of the" <?php if ($country == 'Congo, Republic of the') echo 'selected'; ?>>Congo, Republic of the</option>
			<option value="Costa Rica" <?php if ($country == 'Costa Rica' ) echo 'selected' ; ?>>Costa Rica</option>
			<option value="Côte d\'Ivoire" <?php if ($country == 'Côte d\'Ivoire' ) echo 'selected' ; ?>>Côte d\'Ivoire</option>
			<option value="Croatia" <?php if ($country == 'Croatia' ) echo 'selected' ; ?>>Croatia</option>
			<option value="Cuba" <?php if ($country == 'Cuba' ) echo 'selected' ; ?>>Cuba</option>
			<option value="Curaçao" <?php if ($country == 'Curaçao' ) echo 'selected' ; ?>>Curaçao</option>
			<option value="Cyprus" <?php if ($country == 'Cyprus' ) echo 'selected' ; ?>>Cyprus</option>
			<option value="Czech Republic" <?php if ($country == 'Czech Republic' ) echo 'selected' ; ?>>Czech Republic</option>
			<option value="Denmark" <?php if ($country == 'Denmark' ) echo 'selected' ; ?>>Denmark</option>
			<option value="Djibouti" <?php if ($country == 'Djibouti' ) echo 'selected' ; ?>>Djibouti</option>
			<option value="Dominica" <?php if ($country == 'Dominica' ) echo 'selected' ; ?>>Dominica</option>
			<option value="Dominican Republic" <?php if ($country == 'Dominican Republic' ) echo 'selected' ; ?>>Dominican Republic</option>
			<option value="East Timor" <?php if ($country == 'East Timor' ) echo 'selected' ; ?>>East Timor</option>
			<option value="Ecuador" <?php if ($country == 'Ecuador' ) echo 'selected' ; ?>>Ecuador</option>
			<option value="Egypt" <?php if ($country == 'Egypt' ) echo 'selected' ; ?>>Egypt</option>
			<option value="El Salvador" <?php if ($country == 'El Salvador' ) echo 'selected' ; ?>>El Salvador</option>
			<option value="Equatorial Guinea" <?php if ($country == 'Equatorial Guinea' ) echo 'selected' ; ?>>Equatorial Guinea</option>
			<option value="Eritrea" <?php if ($country == 'Eritrea' ) echo 'selected' ; ?>>Eritrea</option>
			<option value="Estonia" <?php if ($country == 'Estonia' ) echo 'selected' ; ?>>Estonia</option>
			<option value="Ethiopia" <?php if ($country == 'Ethiopia' ) echo 'selected' ; ?>>Ethiopia</option>
			<option value="Faroe Islands" <?php if ($country == 'Faroe Islands' ) echo 'selected' ; ?>>Faroe Islands</option>
			<option value="Fiji" <?php if ($country == 'Fiji' ) echo 'selected' ; ?>>Fiji</option>
			<option value="Finland" <?php if ($country == 'Finland' ) echo 'selected' ; ?>>Finland</option>
			<option value="France" <?php if ($country == 'France' ) echo 'selected' ; ?>>France</option>
			<option value="French Polynesia" <?php if ($country == 'French Polynesia' ) echo 'selected' ; ?>>French Polynesia</option>
			<option value="Gabon" <?php if ($country == 'Gabon' ) echo 'selected' ; ?>>Gabon</option>
			<option value="Gambia" <?php if ($country == 'Gambia' ) echo 'selected' ; ?>>Gambia</option>
			<option value="Georgia" <?php if ($country == 'Georgia' ) echo 'selected' ; ?>>Georgia</option>
			<option value="Germany" <?php if ($country == 'Germany' ) echo 'selected' ; ?>>Germany</option>
			<option value="Ghana" <?php if ($country == 'Ghana' ) echo 'selected' ; ?>>Ghana</option>
			<option value="Greece" <?php if ($country == 'Greece' ) echo 'selected' ; ?>>Greece</option>
			<option value="Greenland" <?php if ($country == 'Greenland' ) echo 'selected' ; ?>>Greenland</option>
			<option value="Grenada" <?php if ($country == 'Grenada' ) echo 'selected' ; ?>>Grenada</option>
			<option value="Guam" <?php if ($country == 'Guam' ) echo 'selected' ; ?>>Guam</option>
			<option value="Guatemala" <?php if ($country == 'Guatemala' ) echo 'selected' ; ?>>Guatemala</option>
			<option value="Guinea" <?php if ($country == 'Guinea' ) echo 'selected' ; ?>>Guinea</option>
			<option value="Guinea-Bissau" <?php if ($country == 'Guinea-Bissau' ) echo 'selected' ; ?>>Guinea-Bissau</option>
			<option value="Guyana" <?php if ($country == 'Guyana' ) echo 'selected' ; ?>>Guyana</option>
			<option value="Haiti" <?php if ($country == 'Haiti' ) echo 'selected' ; ?>>Haiti</option>
			<option value="Honduras" <?php if ($country == 'Honduras' ) echo 'selected' ; ?>>Honduras</option>
			<option value="Hong Kong" <?php if ($country == 'Hong Kong' ) echo 'selected' ; ?>>Hong Kong</option>
			<option value="Hungary" <?php if ($country == 'Hungary' ) echo 'selected' ; ?>>Hungary</option>
			<option value="Iceland" <?php if ($country == 'Iceland' ) echo 'selected' ; ?>>Iceland</option>
			<option value="India" <?php if ($country == 'India' ) echo 'selected' ; ?>>India</option>
			<option value="Indonesia" <?php if ($country == 'Indonesia' ) echo 'selected' ; ?>>Indonesia</option>
			<option value="Iran" <?php if ($country == 'Iran' ) echo 'selected' ; ?>>Iran</option>
			<option value="Iraq" <?php if ($country == 'Iraq' ) echo 'selected' ; ?>>Iraq</option>
			<option value="Ireland" <?php if ($country == 'Ireland' ) echo 'selected' ; ?>>Ireland</option>
			<option value="Israel" <?php if ($country == 'Israel' ) echo 'selected' ; ?>>Israel</option>
			<option value="Italy" <?php if ($country == 'Italy' ) echo 'selected' ; ?>>Italy</option>
			<option value="Jamaica" <?php if ($country == 'Jamaica' ) echo 'selected' ; ?>>Jamaica</option>
			<option value="Japan" <?php if ($country == 'Japan' ) echo 'selected' ; ?>>Japan</option>
			<option value="Jordan" <?php if ($country == 'Jordan' ) echo 'selected' ; ?>>Jordan</option>
			<option value="Kazakhstan" <?php if ($country == 'Kazakhstan' ) echo 'selected' ; ?>>Kazakhstan</option>
			<option value="Kenya" <?php if ($country == 'Kenya' ) echo 'selected' ; ?>>Kenya</option>
			<option value="Kiribati" <?php if ($country == 'Kiribati' ) echo 'selected' ; ?>>Kiribati</option>
			<option value="North Korea" <?php if ($country == 'North Korea' ) echo 'selected' ; ?>>North Korea</option>
			<option value="South Korea" <?php if ($country == 'South Korea' ) echo 'selected' ; ?>>South Korea</option>
			<option value="Kosovo" <?php if ($country == 'Kosovo' ) echo 'selected' ; ?>>Kosovo</option>
			<option value="Kuwait" <?php if ($country == 'Kuwait' ) echo 'selected' ; ?>>Kuwait</option>
			<option value="Kyrgyzstan" <?php if ($country == 'Kyrgyzstan' ) echo 'selected' ; ?>>Kyrgyzstan</option>
			<option value="Laos" <?php if ($country == 'Laos' ) echo 'selected' ; ?>>Laos</option>
			<option value="Latvia" <?php if ($country == 'Latvia' ) echo 'selected' ; ?>>Latvia</option>
			<option value="Lebanon" <?php if ($country == 'Lebanon' ) echo 'selected' ; ?>>Lebanon</option>
			<option value="Lesotho" <?php if ($country == 'Lesotho' ) echo 'selected' ; ?>>Lesotho</option>
			<option value="Liberia" <?php if ($country == 'Liberia' ) echo 'selected' ; ?>>Liberia</option>
			<option value="Libya" <?php if ($country == 'Libya' ) echo 'selected' ; ?>>Libya</option>
			<option value="Liechtenstein" <?php if ($country == 'Liechtenstein' ) echo 'selected' ; ?>>Liechtenstein</option>
			<option value="Lithuania" <?php if ($country == 'Lithuania' ) echo 'selected' ; ?>>Lithuania</option>
			<option value="Luxembourg" <?php if ($country == 'Luxembourg' ) echo 'selected' ; ?>>Luxembourg</option>
			<option value="Macedonia" <?php if ($country == 'Macedonia' ) echo 'selected' ; ?>>Macedonia</option>
			<option value="Madagascar" <?php if ($country == 'Madagascar' ) echo 'selected' ; ?>>Madagascar</option>
			<option value="Malawi" <?php if ($country == 'Malawi' ) echo 'selected' ; ?>>Malawi</option>
			<option value="Malaysia" <?php if ($country == 'Malaysia' ) echo 'selected' ; ?>>Malaysia</option>
			<option value="Maldives" <?php if ($country == 'Maldives' ) echo 'selected' ; ?>>Maldives</option>
			<option value="Mali" <?php if ($country == 'Mali' ) echo 'selected' ; ?>>Mali</option>
			<option value="Malta" <?php if ($country == 'Malta' ) echo 'selected' ; ?>>Malta</option>
			<option value="Marshall Islands" <?php if ($country == 'Marshall Islands' ) echo 'selected' ; ?>>Marshall Islands</option>
			<option value="Mauritania" <?php if ($country == 'Mauritania' ) echo 'selected' ; ?>>Mauritania</option>
			<option value="Mauritius" <?php if ($country == 'Mauritius' ) echo 'selected' ; ?>>Mauritius</option>
			<option value="Mexico" <?php if ($country == 'Mexico' ) echo 'selected' ; ?>>Mexico</option>
			<option value="Micronesia" <?php if ($country == 'Micronesia' ) echo 'selected' ; ?>>Micronesia</option>
			<option value="Moldova" <?php if ($country == 'Moldova' ) echo 'selected' ; ?>>Moldova</option>
			<option value="Monaco" <?php if ($country == 'Monaco' ) echo 'selected' ; ?>>Monaco</option>
			<option value="Mongolia" <?php if ($country == 'Mongolia' ) echo 'selected' ; ?>>Mongolia</option>
			<option value="Montenegro" <?php if ($country == 'Montenegro' ) echo 'selected' ; ?>>Montenegro</option>
			<option value="Morocco" <?php if ($country == 'Morocco' ) echo 'selected' ; ?>>Morocco</option>
			<option value="Mozambique" <?php if ($country == 'Mozambique' ) echo 'selected' ; ?>>Mozambique</option>
			<option value="Myanmar" <?php if ($country == 'Myanmar' ) echo 'selected' ; ?>>Myanmar</option>
			<option value="Namibia" <?php if ($country == 'Namibia' ) echo 'selected' ; ?>>Namibia</option>
			<option value="Nauru" <?php if ($country == 'Nauru' ) echo 'selected' ; ?>>Nauru</option>
			<option value="Nepal" <?php if ($country == 'Nepal' ) echo 'selected' ; ?>>Nepal</option>
			<option value="Netherlands" <?php if ($country == 'Netherlands' ) echo 'selected' ; ?>>Netherlands</option>
			<option value="New Zealand" <?php if ($country == 'New Zealand' ) echo 'selected' ; ?>>New Zealand</option>
			<option value="Nicaragua" <?php if ($country == 'Nicaragua' ) echo 'selected' ; ?>>Nicaragua</option>
			<option value="Niger" <?php if ($country == 'Niger' ) echo 'selected' ; ?>>Niger</option>
			<option value="Nigeria" <?php if ($country == 'Nigeria' ) echo 'selected' ; ?>>Nigeria</option>
			<option value="Northern Mariana Islands" <?php if ($country == 'Northern Mariana Islands' ) echo 'selected' ; ?>>Northern Mariana Islands</option>
			<option value="Norway" <?php if ($country == 'Norway' ) echo 'selected' ; ?>>Norway</option>
			<option value="Oman" <?php if ($country == 'Oman' ) echo 'selected' ; ?>>Oman</option>
			<option value="Pakistan" <?php if ($country == 'Pakistan' ) echo 'selected' ; ?>>Pakistan</option>
			<option value="Palau" <?php if ($country == 'Palau' ) echo 'selected' ; ?>>Palau</option>
			<option value="Palestine, State of" <?php if ($country == 'Palestine, State of') echo 'selected';?>>Palestine, State of</option>
			<option value="Panama" <?php if ($country == 'Panama' ) echo 'selected' ; ?>>Panama</option>
			<option value="Papua New Guinea" <?php if ($country == 'Papua New Guinea' ) echo 'selected' ; ?>>Papua New Guinea</option>
			<option value="Paraguay" <?php if ($country == 'Paraguay' ) echo 'selected' ; ?>>Paraguay</option>
			<option value="Peru" <?php if ($country == 'Peru' ) echo 'selected' ; ?>>Peru</option>
			<option value="Philippines" <?php if ($country == 'Philippines' ) echo 'selected' ; ?>>Philippines</option>
			<option value="Poland" <?php if ($country == 'Poland' ) echo 'selected' ; ?>>Poland</option>
			<option value="Portugal" <?php if ($country == 'Portugal' ) echo 'selected' ; ?>>Portugal</option>
			<option value="Puerto Rico" <?php if ($country == 'Puerto Rico' ) echo 'selected' ; ?>>Puerto Rico</option>
			<option value="Qatar" <?php if ($country == 'Qatar' ) echo 'selected' ; ?>>Qatar</option>
			<option value="Romania" <?php if ($country == 'Romania' ) echo 'selected' ; ?>>Romania</option>
			<option value="Russia" <?php if ($country == 'Russia' ) echo 'selected' ; ?>>Russia</option>
			<option value="Rwanda" <?php if ($country == 'Rwanda' ) echo 'selected' ; ?>>Rwanda</option>
			<option value="Saint Kitts and Nevis" <?php if ($country == 'Saint Kitts and Nevis' ) echo 'selected' ; ?>>Saint Kitts and Nevis</option>
			<option value="Saint Lucia" <?php if ($country == 'Saint Lucia' ) echo 'selected' ; ?>>Saint Lucia</option>
			<option value="Saint Vincent and the Grenadines" <?php if ($country == 'Saint Vincent and the Grenadines' ) echo 'selected' ; ?>>Saint Vincent and the Grenadines</option>
			<option value="Samoa" <?php if ($country == 'Samoa' ) echo 'selected' ; ?>>Samoa</option>
			<option value="San Marino" <?php if ($country == 'San Marino' ) echo 'selected' ; ?>>San Marino</option>
			<option value="Sao Tome and Principe" <?php if ($country == 'Sao Tome and Principe' ) echo 'selected' ; ?>>Sao Tome and Principe</option>
			<option value="Saudi Arabia" <?php if ($country == 'Saudi Arabia' ) echo 'selected' ; ?>>Saudi Arabia</option>
			<option value="Senegal" <?php if ($country == 'Senegal' ) echo 'selected' ; ?>>Senegal</option>
			<option value="Serbia" <?php if ($country == 'Serbia' ) echo 'selected' ; ?>>Serbia</option>
			<option value="Seychelles" <?php if ($country == 'Seychelles' ) echo 'selected' ; ?>>Seychelles</option>
			<option value="Sierra Leone" <?php if ($country == 'Sierra Leone' ) echo 'selected' ; ?>>Sierra Leone</option>
			<option value="Singapore" <?php if ($country == 'Singapore' ) echo 'selected' ; ?>>Singapore</option>
			<option value="Sint Maarten" <?php if ($country == 'Sint Maarten' ) echo 'selected' ; ?>>Sint Maarten</option>
			<option value="Slovakia" <?php if ($country == 'Slovakia' ) echo 'selected' ; ?>>Slovakia</option>
			<option value="Slovenia" <?php if ($country == 'Slovenia' ) echo 'selected' ; ?>>Slovenia</option>
			<option value="Solomon Islands" <?php if ($country == 'Solomon Islands' ) echo 'selected' ; ?>>Solomon Islands</option>
			<option value="Somalia" <?php if ($country == 'Somalia' ) echo 'selected' ; ?>>Somalia</option>
			<option value="South Africa" <?php if ($country == 'South Africa' ) echo 'selected' ; ?>>South Africa</option>
			<option value="Spain" <?php if ($country == 'Spain' ) echo 'selected' ; ?>>Spain</option>
			<option value="Sri Lanka" <?php if ($country == 'Sri Lanka' ) echo 'selected' ; ?>>Sri Lanka</option>
			<option value="Sudan" <?php if ($country == 'Sudan' ) echo 'selected' ; ?>>Sudan</option>
			<option value="Sudan, South" <?php if ($country == 'Sudan, South') echo 'selected';?>Sudan, South</option>
			<option value="Suriname" <?php if ($country == 'Suriname' ) echo 'selected' ; ?>>Suriname</option>
			<option value="Swaziland" <?php if ($country == 'Swaziland' ) echo 'selected' ; ?>>Swaziland</option>
			<option value="Sweden" <?php if ($country == 'Sweden' ) echo 'selected' ; ?>>Sweden</option>
			<option value="Switzerland" <?php if ($country == 'Switzerland' ) echo 'selected' ; ?>>Switzerland</option>
			<option value="Syria" <?php if ($country == 'Syria' ) echo 'selected' ; ?>>Syria</option>
			<option value="Taiwan" <?php if ($country == 'Taiwan' ) echo 'selected' ; ?>>Taiwan</option>
			<option value="Tajikistan" <?php if ($country == 'Tajikistan' ) echo 'selected' ; ?>>Tajikistan</option>
			<option value="Tanzania" <?php if ($country == 'Tanzania' ) echo 'selected' ; ?>>Tanzania</option>
			<option value="Thailand" <?php if ($country == 'Thailand' ) echo 'selected' ; ?>>Thailand</option>
			<option value="Togo" <?php if ($country == 'Togo' ) echo 'selected' ; ?>>Togo</option>
			<option value="Tonga" <?php if ($country == 'Tonga' ) echo 'selected' ; ?>>Tonga</option>
			<option value="Trinidad and Tobago" <?php if ($country == 'Trinidad and Tobago' ) echo 'selected' ; ?>>Trinidad and Tobago</option>
			<option value="Tunisia" <?php if ($country == 'Tunisia' ) echo 'selected' ; ?>>Tunisia</option>
			<option value="Turkey" <?php if ($country == 'Turkey' ) echo 'selected' ; ?>>Turkey</option>
			<option value="Turkmenistan" <?php if ($country == 'Turkmenistan' ) echo 'selected' ; ?>>Turkmenistan</option>
			<option value="Tuvalu" <?php if ($country == 'Tuvalu' ) echo 'selected' ; ?>>Tuvalu</option>
			<option value="Uganda" <?php if ($country == 'Uganda' ) echo 'selected' ; ?>>Uganda</option>
			<option value="Ukraine" <?php if ($country == 'Ukraine' ) echo 'selected' ; ?>>Ukraine</option>
			<option value="United Arab Emirates" <?php if ($country == 'United Arab Emirates' ) echo 'selected' ; ?>>United Arab Emirates</option>
			<option value="United Kingdom" <?php if ($country == 'United Kingdom' ) echo 'selected' ; ?>>United Kingdom</option>
			<option value="United States" <?php if ($country == 'United States' ) echo 'selected' ; ?>>United States</option>
			<option value="Uruguay" <?php if ($country == 'Uruguay' ) echo 'selected' ; ?>>Uruguay</option>
			<option value="Uzbekistan" <?php if ($country == 'Uzbekistan' ) echo 'selected' ; ?>>Uzbekistan</option>
			<option value="Vanuatu" <?php if ($country == 'Vanuatu' ) echo 'selected' ; ?>>Vanuatu</option>
			<option value="Vatican City" <?php if ($country == 'Vatican City' ) echo 'selected' ; ?>>Vatican City</option>
			<option value="Venezuela" <?php if ($country == 'Venezuela' ) echo 'selected' ; ?>>Venezuela</option>
			<option value="Vietnam" <?php if ($country == 'Vietnam' ) echo 'selected' ; ?>>Vietnam</option>
			<option value="Virgin Islands, British" <?php if ($country == 'Virgin Islands, British') echo 'selected' ; ?>>Virgin Islands, British</option>
			<option value="Virgin Islands, U.S." <?php if ($country == 'Virgin Islands, U.S.') echo 'selected' ; ?>>Virgin Islands, U.S.</option>
			<option value="Yemen" <?php if ($country == 'Yemen' ) echo 'selected' ; ?>>Yemen</option>
			<option value="Zambia" <?php if ($country == 'Zambia' ) echo 'selected' ; ?>>Zambia</option>
			<option value="Zimbabwe" <?php if ($country == 'Zimbabwe' ) echo 'selected' ; ?>>Zimbabwe</option>
		</select>
	</label>

	<label for="submit">
		<?php echo $referer; ?>
		<input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'vmw'); ?>" />
		<?php wp_nonce_field( 'update-user' ) ?>
		<input name="action" type="hidden" id="action" value="update-user" />
	</label>

</form>

<?php
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
		$fname = sanitize_text_field( $_POST['fname'] );
		$lname = sanitize_text_field( $_POST['lname'] );
		$web = sanitize_text_field( $_POST['web'] );
		$phone = sanitize_text_field( $_POST['tel'] );
		$company = sanitize_text_field( $_POST['company'] );
		$country = sanitize_text_field( $_POST['country'] );

		update_user_meta( $current_user->ID, 'first_name', $fname);
		update_user_meta( $current_user->ID, 'last_name', $lname);
		update_user_meta( $current_user->ID, 'url', $web);
		update_user_meta( $current_user->ID, '_user_phone', $phone);
		update_user_meta( $current_user->ID, '_user_company', $company);
		update_user_meta( $current_user->ID, '_user_country', $country);
	}
?>
