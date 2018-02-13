$ = jQuery;

function displayMetaboxes($selectedElt) {
	var $selectedElt = $( "input[name='post_format']:checked" ).attr( 'id' );
	$( '#video' ).hide();
	$( '#wp' ).hide();
	$( '#hol' ).hide();
	$( '#vmworld' ).hide();
	console.log($selectedElt);
	if ( $selectedElt == 'post-format-video' )
		$( '#video' ).fadeIn();
	if ( $selectedElt == 'post-format-aside' )
		$( '#wp' ).fadeIn();
	if ( $selectedElt == 'post-format-status' )
		$( '#vmworld' ).fadeIn();
	if ( $selectedElt == 'post-format-link' )
		$( '#hol' ).fadeIn();
}

function displayLang($selectedLang) {
	var $selectedLang = $( '#post_lang_choice option:selected' ).val();
	$( '#lang' ).hide();
	if( $selectedLang == 'ar' || $selectedLang == 'he' )
		$( '#lang' ).fadeIn();
	else
		$( '#lang' ).hide();
}
$(function() {
	displayMetaboxes();
	displayLang();
	$( '.post-format' ).change( function() {
		displayMetaboxes();
	});
	$( '#post_lang_choice' ).on( 'change', function() {
		var $selectedLang = $(this).find(':selected').val();
		displayLang($selectedLang);
	});
});