document.getElementById('registerForm').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('password_confirmation').value;
    
    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        event.preventDefault();
    }
});

document.getElementById('password').addEventListener('input', function() {
    var password = this.value;
    var lengthCriteria = document.getElementById('length');
    var uppercaseCriteria = document.getElementById('uppercase');
    var numberCriteria = document.getElementById('number');
    var specialCriteria = document.getElementById('special');

    // Check if the password meets the length requirement
    if (password.length >= 8 && password.length <= 64) {
        lengthCriteria.classList.remove('invalid');
        lengthCriteria.classList.add('valid');
    } else {
        lengthCriteria.classList.remove('valid');
        lengthCriteria.classList.add('invalid');
    }

    // Check if the password has both uppercase and lowercase letters
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
        uppercaseCriteria.classList.remove('invalid');
        uppercaseCriteria.classList.add('valid');
    } else {
        uppercaseCriteria.classList.remove('valid');
        uppercaseCriteria.classList.add('invalid');
    }

    // Check if the password has at least one number
    if (password.match(/[0-9]/)) {
        numberCriteria.classList.remove('invalid');
        numberCriteria.classList.add('valid');
    } else {
        numberCriteria.classList.remove('valid');
        numberCriteria.classList.add('invalid');
    }

    // Check if the password has at least one special character
    if (password.match(/[^a-zA-Z0-9]/)) {
        specialCriteria.classList.remove('invalid');
        specialCriteria.classList.add('valid');
    } else {
        specialCriteria.classList.remove('valid');
        specialCriteria.classList.add('invalid');
    }
});
