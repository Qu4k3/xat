function searchUser() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('inputSearch');
    filter = input.value.toUpperCase();
    ul = document.getElementById("usersList");
    li = ul.getElementsByTagName('li');


    $("#usersList").show();

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function(){
    $("#usersList li a").click(function(){
        var value = $(this).html();
        var input = $('#inputReceiver');
        input.val(value);
        $("#usersList").hide();
    });
});