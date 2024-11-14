const otpInputs = document.querySelectorAll('.otp-box');

otpInputs.forEach((input, index) => {
    input.addEventListener('input', () => {
        if (input.value.length === 1 && index < otpInputs.length - 1) {
            otpInputs[index + 1].focus();
        }
    });
});

const correctOTP = "1234"; // OTP yang benar

function verifyOTP() {
    // Ambil semua elemen input OTP
    const otpInputs = document.querySelectorAll('.otp-box');
    let enteredOTP = "";

    // Gabungkan nilai dari setiap input menjadi satu string
    otpInputs.forEach(input => {
        enteredOTP += input.value;
    });

    // Cek apakah OTP yang dimasukkan sesuai dengan OTP yang benar
    if (enteredOTP === correctOTP) {
        document.getElementById("result").innerText = "OTP sesuai. Verifikasi berhasil!";
        document.getElementById("result").style.color = "green";
        
        otpInputs.forEach(input => input.value = "");
        otpInputs[0].focus();

        window.location.href = '/change-password';
        return false;
    } else {
        document.getElementById("result").innerText = "OTP tidak sesuai. Coba lagi.";
        document.getElementById("result").style.color = "red";
        
        otpInputs.forEach(input => input.value = "");
        otpInputs[0].focus();

        return false;
    }
}