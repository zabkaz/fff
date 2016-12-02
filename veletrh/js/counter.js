//counter
$(".counter").bind('keyup mouseup', function() {	
	$count = $(this);
    $element = $count.parent().next().next();
	$cena = parseFloat($element.attr("item-value"));
	$element.text(parseFloat($count.val()) * $cena + " Kč");
});