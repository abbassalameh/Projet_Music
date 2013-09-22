$(document).ready(
function() {$(".add_playlist").click(
function() {var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv');
newTextBoxDiv.after().html('<input type="text" name="playlist_name_input" class="playlist_name_input" value="" ><input type=submit name="submit_playlist_name" class="submit_playlist_name" value="Add playlist">');
$(".playlist_name_input").remove();
$(".submit_playlist_name").remove();
newTextBoxDiv.appendTo(".new_playlist");
});
});