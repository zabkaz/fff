
$(".btn-services").click(function () {
    $objednavka = $(this);
    $objednanie = $objednavka.next();
    $objednanie.slideToggle(500);
});


//counter
$(".counter").bind('keyup mouseup', function() {	
    $count = $(this);
    $formWrapper = $count.next();
	$element = $formWrapper.find('span');
	$cena = parseFloat($element.attr("item-value"));
	$element.text(parseFloat($count.val()) * $cena + " Kč");	
});