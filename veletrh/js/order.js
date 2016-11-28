function objednavkaPdf() {	
	
	var doc = new jsPDF();
	doc.setFontSize(11);
	doc.addImage(imgData, 'JPEG', 0, 0, 210, 297);

	var area = 0;
	if(document.getElementById('area1').checked){
		area = 24000;
	}
	if(document.getElementById('area2').checked){
		area = 32000;
	}
	if(document.getElementById('area3').checked){
		area = 39800;
	}
	doc.text(160, 85, area + ' czk');
	
	var item = 0;
	item += document.getElementById('item1').value*300;
	item += document.getElementById('item2').value*300;
	item += document.getElementById('item3').value*400;
	item += document.getElementById('item4').value*400;
	item += document.getElementById('item5').value*450;
	item += document.getElementById('item6').value*450;
	doc.text(160, 98, item + ' czk');

	var presentation = 0;
	if(document.getElementById('presentation').checked){
		presentation = 8500;
	}
	doc.text(160, 111, presentation + ' czk');

	var advertising = 0;
	if(document.getElementById('advertising1').checked){
		advertising += 12000;
	}
	if(document.getElementById('advertising2').checked){
		advertising += 8000;
	}
	if(document.getElementById('advertising3').checked){
		advertising += 16000;
	}
	doc.text(160, 124, advertising + ' czk');

	var partner = 0;
	if(document.getElementById('partner1').checked){
		partner += 45000;
	}
	if(document.getElementById('partner2').checked){
		partner += 18000;
	}
	doc.text(160, 137, partner + ' czk');

	doc.setFontSize(13);
	var sum = partner + advertising + item + area + presentation;
	doc.text(160, 153, sum + ' czk');

	doc.save('jobch_objednavka.pdf');
	return false;
}