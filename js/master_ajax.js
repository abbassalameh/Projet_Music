function showUser(str)
{
$.get(
  "list_playlist_popup.php",
  { qq: str },
  function success(data) {
    $('#drop_the_nukes').html(data);
    $('#scrollbar2').tinyscrollbar();
  });
}
function dt(str1)
{
$.get(
  "dp.php",
  { qq: str1 },
  function success(data) {
    $('.ajax_here').html(data);
    $('#scrollbar1').tinyscrollbar();
  });
}
