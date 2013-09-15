$(function() {
	var overlay = $('<div id="overlay"></div>');
	$('.x').click(function() {
		$('.popup').hide();
		overlay.appendTo(document.body).remove();
		return false;
	});

	$('.click').click(function() {
		overlay.show();
		overlay.appendTo(document.body);
		$('.popup').show();
		return false;
	});
});
$(function() {
	var overlay = $('<div id="overlay"></div>');
	$('.x').click(function() {
		$('.popup_signup').hide();
		overlay.appendTo(document.body).remove();
		return false;
	});

	$('.signup').click(function() {
		overlay.show();
		overlay.appendTo(document.body);
		$('.popup_signup').show();
		return false;
	});
});