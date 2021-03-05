function fun(){
    var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;

    if(name != "" && password != ""){
        alert("Login Successful");
        document.getElementById("name").value = "";
        password = document.getElementById("password").value = "";
    }else{
        alert("Please Provide the Login Details.");
    }

}


function check(){
    // var name = document.getElementById("name").value;
    // var password = document.getElementById("password").value;

    // if(name != "" && password != ""){
    //     alert("Login Successful");
    //     document.getElementById("name").value = "";
    //     password = document.getElementById("password").value = "";
    // }else{
    //     alert("Please Provide the Login Details.");
    // }


    alert("You have click on this checkbox !");
}

// $('#exportbutton').hide();
$(".select-on-check-all").click(function () {
    if ($(this).is(":checked")) {
    $("#exportbutton").show();
    false;
    }
    else if (($(this).is(":unchecked"))) {
    $(".exportbutton").hide();
    }
    else {
    $(".exportbutton").hide();
    }
    });
