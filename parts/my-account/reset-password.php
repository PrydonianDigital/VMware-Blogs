<h3 class="sectionTitle"><?php _e( 'Reset Password', 'vmw' ); ?></h3>

	<?php
		$key = $_GET['rp_key'];
		$login = $_GET['login'];
		if( $_GET['login'] === 'invalidkey' || $_GET['login'] === 'expiredkey' ) {
	?>
	<h6><?php _e( 'The link you clicked on has expired', 'vmw' ); ?></h6>
	<?php
		} else {
	?>

	<form name="resetpassform" id="resetpassform" action="<?php echo site_url( 'wp-login.php?action=resetpass' ); ?>" method="post" autocomplete="off">

		<input type="hidden" name="rp_key" value="<?php echo esc_attr( $_GET['key'] ); ?>">
		<input type="hidden" id="user_login" value="<?php echo esc_attr( $_GET['login'] ); ?>" autocomplete="off" />

		<?php if ( count( $attributes['errors'] ) > 0 ) : ?>
			<?php foreach ( $attributes['errors'] as $error ) : ?>
				<p>
					<?php echo $error; ?>
				</p>
			<?php endforeach; ?>
		<?php endif; ?>

		<label for="pwd1"><?php _e( 'New password', 'vmw' ) ?>
			<input type="password" name="pdw1" id="pdw1" class="input" size="20" value="" autocomplete="off" />
		</label>

		<label for="pass2"><?php _e( 'Repeat new password', 'vmw' ) ?>
			<input type="password" name="pdw2" id="pdw2" class="input" size="20" value="" autocomplete="off" />
		</label>

		<div id="errors"></div>

		<p class="description"><?php echo wp_get_password_hint(); ?></p>

		<p class="resetpass-submit">
			<input type="submit" name="submit" id="resetpass-button" class="button" value="<?php _e( 'Reset Password', 'vmw' ); ?>" />
			<input name="action" type="hidden" id="action" value="resetpass" />
		</p>

	</form>

	<?php
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && $_POST['action'] == 'resetpass' ) {
			$rp_key = $_GET['rp_key'];
			$rp_login = $_GET['rp_login'];

			$user = check_password_reset_key( $rp_key, $rp_login );

			if ( ! $user || is_wp_error( $user ) ) {
				if ( $user && $user->get_error_code() === 'expired_key' ) {
					wp_redirect( home_url( '/my-account/reset-password?login=expiredkey' ) );
				} else {
					wp_redirect( home_url( '/my-account/reset-password?login=invalidkey' ) );
				}
				exit;
			}

			if ( isset( $_POST['pwd1'] ) ) {
				if ( $_POST['pwd1'] != $_POST['pwd2'] ) {
					// Passwords don't match
					$redirect_url = home_url( '/my-account/reset-password' );

					$redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
					$redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
					$redirect_url = add_query_arg( 'error', 'password_reset_mismatch', $redirect_url );

					wp_redirect( $redirect_url );
					exit;
				}

				if ( empty( $_POST['pwd1'] ) ) {
					// Password is empty
					$redirect_url = home_url( '/my-account/reset-password' );

					$redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
					$redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
					$redirect_url = add_query_arg( 'error', 'password_reset_empty', $redirect_url );

					wp_redirect( $redirect_url );
					exit;

				}

				// Parameter checks OK, reset password
				reset_password( $user, $_POST['pwd1'] );
				wp_redirect( home_url( '/my-account/reset-password?password=changed' ) );
			} else {
				echo "Invalid request.";
			}

			exit;
		}
	?>
	<?php
		}
	?>

