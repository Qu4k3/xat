$(document).ready(function() {

    $('#login').click(function(){
        var username = $('#username').val();
        var password = $('#password').val();
        if($.trim(username).length > 0 && $.trim(password).length > 0){
            $.ajax({
                url:"login-process.php",
                method:"POST",
                data:{username:username, password:password},
                cache:"false",
                beforeSend:function() {
                    $('#login').val("Conectando...");
                },
                success:function(data) {
                    $('#login').val("Login");
                    if (data=="1") {
                        $(location).attr('href','../index.php');
                    } else {
                        $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>The <strong>username</strong> or <strong>password</strong> you have entered is invalid</div>");
                    }
                }
            });
        } else {
            $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Oops!</strong> Please fill up the fields.</div>");
        };
    });

    $("#register").click(function(){
       var user = $("#username").val();
       var pass = $("#password").val();

       var data = "username=" + user + "&password=" + pass;

       $.ajax({
           method: "post",
           url: "register-process.php?",
           data: data,
           success:function(data){
               $("#result").html(data);
           }
       });

    });

});


function searchUser() {

    var input = document.getElementById('inputSearch');
    var filter = input.value.toUpperCase();
    var ul = document.getElementById("usersList");
    var li = ul.getElementsByTagName('li');

    $("#usersList").show();

    // Loop through all list items, and hide those who don't match the search query
    for (var i = 0; i < li.length; i++) {
        var a = li[i].getElementsByTagName("a")[0];
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
