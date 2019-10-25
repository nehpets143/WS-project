var users = ["user","admin"]
var password = ["user","admin"]

function getInfo() {
    var user = document.getElementById("user").value
    var pword = document.getElementById("pword").value

    if(user == users[0] && pword == password[0])
    {
        alert("Welcome "+users[0] )
    }else if(user == users[1] && pword == password[1])
    {
        alert("Welcome "+users[1] )
    }else if(user==users[0]&&pword!=users[0])
    {
        alert("Invalid Password")
    }else if(user==users[1]&&pword!=users[1])
    {
        alert("Invalid Password")
    }
    else
    {
        alert("Unauthorized Access!")    
    }

    
}