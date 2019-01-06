jQuery(function($) {

$( '.apwpultimate-audio-player-grid' ).each(function( index ) {
  	var player_id = $(this).attr('id');
  $("#"+player_id).jPlayer({
    loop: false
});
});

});
