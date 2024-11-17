function changePass(){
    var newPass = document.getElementById('new').value;
    var confirm = document.getElementById('confirm').value;

    if(newPass === confirm){
        document.getElementById("result").innerText = "Suitable";
        document.getElementById("result").style.color = "green";
        window.location.href = '/succPass';
        return false;
    }else{
        document.getElementById("result").innerText = 'Password isn\'t match';
        document.getElementById("result").style.color = "red";        
        return false;
    }
}

function sendOtp(){
    var gmail = document.getElementById('email').value;

    // Simulasi login
    if (gmail === 'bernadyaaa@gmail.com') {
        window.location.href = '/otp'; // Pindah ke halaman home
        return false; // Mencegah form di-submit ulang
    } else {
        document.getElementById("result").innerText = 'Email not found';
        document.getElementById("result").style.color = "red";
        return false; // Mencegah form di-submit
    }
}