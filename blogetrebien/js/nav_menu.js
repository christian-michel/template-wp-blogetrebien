// Gestion de l'animation du menu responsive au format mobile

$( document ).ready(function() {

$("#menuMobile").addClass("js").before('<div class="barreMenuMobile"><span></span></div>');
$('.barreMenuMobile').click(function(e){
	e.preventDefault();
	$this=$(this);
	if($this.hasClass('is-opened')){
		$this.addClass('is-closed').removeClass('is-opened');
		$("#menuMobile:visible").slideUp('slow');
	}
	else {
		$this.removeClass('is-closed').addClass('is-opened');
		$("#menuMobile").slideDown('slow');
	}
});

	
});