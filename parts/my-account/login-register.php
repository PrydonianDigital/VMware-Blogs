<h4><?php _e( 'Hello Guest, please log in or register', 'vmw' ); ?></h4>

<div class="row align-center">

	<div class="column">

		<ul class="tabs" id="loginRegister" data-deep-link="true" data-update-history="true" data-deep-link-smudge="true" data-deep-link-smudge="500" data-tabs id="deeplinked-tabs">
			<li class="tabs-title is-active"><a href="#login" aria-selected="true"><?php _e( 'Log In' , 'vmw' ); ?></a></li>
			<li class="tabs-title"><a data-tabs-target="register" href="#register"><?php _e( 'Register' , 'vmw' ); ?></a></li>
			<li class="tabs-title"><a data-tabs-target="forgot" href="#forgot"><?php _e( 'Forgot Password' , 'vmw' ); ?></a></li>
		</ul>

		<div class="tabs-content" data-tabs-content="loginRegister">

			<div class="tabs-panel is-active" id="login">

				<h3 class="sectionTitle"><?php _e( 'Log In' , 'vmw' ); ?></h3>

				<div id="message">
					<?php
						if(! empty($err) ) :
							echo '<div class="callout alert">'.$err.'</div>';
						endif;
						if(! empty($success) ) :
							echo '<div class="callout success">'.$success.'</div>';
						endif;
					?>
				</div>

				<?php
					$args = array(
						'redirect' => $_SERVER['REQUEST_URI'],
						'id_username' => 'user',
						'id_password' => 'pass',
					);
					wp_login_form( $args );
				?>

			</div>

			<div class="tabs-panel" id="register">

				<h3 class="sectionTitle"><?php _e( 'Register', 'vmw' ); ?></h3>

				<?php
					$err = '';
					$success = '';
					global $wpdb, $PasswordHash, $current_user, $user_ID;
					if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
						$pwd1 = $wpdb->escape(trim($_POST['pwd1']));
						$pwd2 = $wpdb->escape(trim($_POST['pwd2']));
						$first_name = $wpdb->escape(trim($_POST['first_name']));
						$last_name = $wpdb->escape(trim($_POST['last_name']));
						$email = $wpdb->escape(trim($_POST['email']));
						$username = $wpdb->escape(trim($_POST['username']));
						if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "" || $last_name == "") {
							$err = __( 'Fill out all fields marked *', 'vmw' );
						} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$err = __( 'Invalid email address.', 'vmw' );
						} else if(email_exists($email) ) {
							$err = __( 'Email already exists.', 'vmw' );
						} else if($pwd1 <> $pwd2 ){
							$err = __( 'Password do not match.', 'vmw' );
						} else {
							$user_id = wp_insert_user( array ('first_name' => apply_filters('pre_user_first_name', $first_name), 'last_name' => apply_filters('pre_user_last_name', $last_name), 'user_pass' => apply_filters('pre_user_user_pass', $pwd1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber' ) );
							if( is_wp_error($user_id) ) {
								$err = __( 'Error on user creation.', 'vmw' );
							} else {
								do_action('user_register', $user_id);
								$success = __( 'You can now log in', 'vmw' );
								wp_safe_redirect( '#login' );
								exit;
							}
						}
					}
				?>

				<div id="message">
					<?php
						if(! empty($err) ) :
							echo '<div class="callout alert">'.$err.'</div>';
						endif;
						if(! empty($success) ) :
							echo '<div class="callout success">'.$success.'</div>';
						endif;
					?>
				</div>

				<form method="post">


					<label><?php _e( 'First Name', 'vmw' ); ?>*
						<input type="text" value="" name="first_name" id="first_name" /></label>

					<label for="last_name"><?php _e( 'Last Name', 'vmw' ); ?>*
						<input type="text" value="" name="last_name" id="last_name" /></label>

					<label><?php _e( 'Email', 'vmw' ); ?>*
						<input type="text" value="" name="email" id="email" /></label>

					<label><?php _e( 'Username', 'vmw' ); ?>*
						<input type="text" value="" name="username" id="username" /></label>

					<label><?php _e( 'Password', 'vmw' ); ?>*
						<input type="password" value="" name="pwd1" id="pwd1" /></label>

					<label><?php _e( 'Repeat Password', 'vmw' ); ?>*
						<input type="password" value="" name="pwd2" id="pwd2" /></label>

					<div id="errors"></div>

					<input type="submit" name="btnregister" class="button" value="<?php _e( 'Register', 'vmw' ); ?>" />
					<input type="hidden" name="task" value="register" />

				</form>

			</div>

			<div class="tabs-panel" id="forgot">

				<h3 class="sectionTitle"><?php _e( 'Password Reset', 'vmw' ); ?></h3>

				<p><?php _e( 'Enter your username or email to reset your password.', 'vmw' ) ?></p>

				<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
					<div class="username">
						<label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
						<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
					</div>
					<div class="login_fields">
						<?php do_action('login_form', 'resetpass'); ?>
						<input type="submit" name="user-submit" value="<?php _e( 'Reset my password', 'vmw' ); ?>" class="button" tabindex="1002" />
						<?php $reset = $_GET['reset']; if($reset == true) { _e( 'A message will be sent to your email address.', 'vmw' ); } ?>
						<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>#forgot" />
						<input type="hidden" name="user-cookie" value="1" />
					</div>
				</form>

			</div>

		</div>

	</div>

</div>