function changePass(){
    var newPass = document.getElementById('new').value;
    var confirm = document.getElementById('confirm').value;

    if(newPass === confirm){
        document.getElementById("result").innerText = "Suitable";
        document.getElementById("result").style.color = "green";
        window.location.href = '/login';
        return false;
    }else{
        document.getElementById("result").innerText = 'Password isn\'t match';
        document.getElementById("result").style.color = "red"        
        return false;
    }
}