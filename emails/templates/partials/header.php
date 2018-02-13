<?php
/**
 * email header
 *
 * @version	1.0
 * @since 1.4
 * @package	Wordpress Social Invitations
 * @author Timersys
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$wrapper = "
	background-color:".$settings['body_bg'].";
	width:100%;
	-webkit-text-size-adjust:none !important;
	margin:0;
	padding: 70px 0 70px 0;
";
$border_radius = $settings['template'] == 'boxed' ? '6px' : '0px';
$template_container = "
	-webkit-box-shadow:0 0 0 3px rgba(0,0,0,0.025) !important;
	box-shadow:0 0 0 3px rgba(0,0,0,0.025) !important;
	-webkit-border-radius:$border_radius !important;
	background-color: #fafafa;
";
$template_header = "
	background-color: ".$settings['header_bg'].";
	color: #f1f1f1;
	border-bottom: 0;
	font-family:Proximanova;
	font-weight:bold;
	line-height:100%;
	vertical-align:middle;
";
$body_content = "
	background-color: ".$settings['email_body_bg'].";
";
$body_content_inner = "
	color: ".$settings['body_text_color'].";
	font-family:Proximanova;
	font-size: ".$settings['body_text_size']."px;
	line-height:150%;
	text-align:left;
";
$header_content_h1 = "
	color: ".$settings['header_text_color'].";
	margin:0;
	display:block;
	font-family:Proximanova;
	font-size: ".$settings['header_text_size']."px;
	font-weight:bold;
	text-align:".$settings['header_aligment'].";
	line-height: 150%;
";
$header_content_h1_a = "
	color: ".$settings['header_text_color'].";
	text-decoration: none;
";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo get_bloginfo('charset');?>" />
<title><?php echo get_bloginfo('name'); ?></title>
<style type="text/css">
@font-face {
	font-family: 'Proximanova';
	font-style: normal;
	font-weight: 200;
	src: local('Proximanova Light'), local('Proximanova-Light'), url(http://www.vmware.com/etc/clientlibs/vmwaredevapp/cclamp/fonts/proximanova-light-webfont.woff2) format('woff');
}
@font-face {
	font-family: 'Proximanova';
	font-style: normal;
	font-weight: 400;
	src: local('Proximanova Regular'), local('Proximanova-Regular'), url(http://www.vmware.com/etc/clientlibs/vmwaredevapp/cclamp/fonts/proximanova-reg-webfont.woff2) format('woff');
}
@font-face {
	font-family: 'Proximanova';
	font-style: normal;
	font-weight: 700;
	src: local('Proximanova Semibold'), local('Proximanova-Semibold'), url(http://www.vmware.com/etc/clientlibs/vmwaredevapp/cclamp/fonts/proximanova-sbold-webfont.woff2) format('woff');
}
@font-face {
	font-family: 'Proximanova';
	font-style: normal;
	font-weight: 800;
	src: local('Proximanova Bold'), local('Proximanova-Bold'), url(https://www.vmware.com/content/dam/vmwaredesigns/fonts/proximanova-bold.woff) format('woff');
}
#outlook a { padding: 0; }
.ReadMsgBody { width: 100%; }
.ExternalClass { width: 100%; }
.ExternalClass * { line-height:100%; }
body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #737571; font-family: Proximanova, Arial;font-size:18px;line-height:22px; }
img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
p { display: block; margin: 13px 0; }
td img { max-width: 100%; height: auto; outline: none; border: none; }
.mobile { display: none; }
a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}
@media only screen and (max-width:480px) {
	#body { padding: 0 !important; }
	.main { width: 100% !important; }
	.desktop { display: none !important; }
	.mobile { display: block !important; }
	.padding { padding: 20px !important; }
	.title {font-size: 30px !important; }
	.top {font-size: 16px !important; }
	.smallpadbottom { padding-bottom: 10px !important; }
	.nopadbottom { padding-bottom: 0 !important; }
	.sharepadimg { padding: 20px 0 10px 20px !important; }
	.sharepadimg img { width: 40px !important; }
	.mobilefull { display: block !important; width: 100% !important; padding: 0 !important; }
	.mobilefull img { display: block !important; width: 100% !important; }
    .button tr { display: block !important;  width: 100% !important; border-bottom: none !important; }
    .button td { display: block !important; width: 100% !important; padding: 10px 0 !important; text-align: center !important; }
}
#template_body a {
	color: <?= $settings['body_href_color'];?>;
}
</style>
<style type="text/css" id="custom-css">
<?= $settings['custom_css'];?>
</style>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
<div id="body" style="<?php echo $wrapper; ?>">
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;" class="main">
	<tr>
		<td>

			<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" id="template_header" style="width:100%; <?php echo $template_header; ?>">
				<tr>
					<td style="padding:20px 50px;" class="padding">
						<h1 style="<?php echo $header_content_h1; ?>" id="logo">
							<a style="<?php echo $header_content_h1_a;?>" href="<?php echo apply_filters( 'mailtpl/templates/header_logo_url', home_url());?>" title="<?php echo apply_filters( 'mailtpl/templates/header_logo_url_title', !empty($settings['header_logo_text']) ?do_shortcode( strip_tags($settings['header_logo_text']) ) : get_bloginfo('name') );?>"><?php if( !empty($settings['header_logo']) ) {
								echo '<img style="max-width:100%;" src="'.apply_filters( 'mailtpl/templates/header_logo', $settings['header_logo'] ).'" alt="'. apply_filters( 'mailtpl/templates/header_logo_alt', !empty($settings['header_logo_text']) ? do_shortcode( strip_tags($settings['header_logo_text']) ) : get_bloginfo( 'description' ) ) .'"/>';
								} elseif ( !empty( $settings['header_logo_text'] ) ) {
									echo do_shortcode($settings['header_logo_text']);
								} else {
									echo get_bloginfo('name');
								}  ?>
							</a>
						</h1>
					</td>
				</tr>
			</table>

		</td>
	</tr>
	<tr>
		<td>

			<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:100%;">
				<tr>
					<td style="color: #737571; font-family: Proximanova, Arial;font-size:18px;line-height:22px;text-align:left; padding: 10px 50px 30px 50px; <?php echo $body_content; ?>" class="padding">

        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
            	<tr>
                	<td valign="top">
						<div style="<?php echo $body_content_inner; ?>" id="mailtpl_body">