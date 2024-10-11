function toggleEdit() {
    // Hide text spans and show input fields
    document.getElementById('username-text').style.display = 'none';
    document.getElementById('name-text').style.display = 'none';
    document.getElementById('nim-text').style.display = 'none';
    document.getElementById('email-text').style.display = 'none';
    document.getElementById('phone-text').style.display = 'none';

    document.getElementById('username-input').style.display = 'block';
    document.getElementById('name-input').style.display = 'block';
    document.getElementById('nim-input').style.display = 'block';
    document.getElementById('email-input').style.display = 'block';
    document.getElementById('phone-input').style.display = 'block';

    document.getElementById('edit-btn').style.display = 'none';
    document.getElementById('save-btn').style.display = 'inline';
}

function saveBio() {
    // Save input values to the text spans
    document.getElementById('username-text').textContent = document.getElementById('username-input').value;
    document.getElementById('name-text').textContent = document.getElementById('name-input').value;
    document.getElementById('nim-text').textContent = document.getElementById('nim-input').value;
    document.getElementById('email-text').textContent = document.getElementById('email-input').value;
    document.getElementById('phone-text').textContent = document.getElementById('phone-input').value;

    // Hide input fields and show text spans again
    document.getElementById('username-text').style.display = 'inline';
    document.getElementById('name-text').style.display = 'inline';
    document.getElementById('nim-text').style.display = 'inline';
    document.getElementById('email-text').style.display = 'inline';
    document.getElementById('phone-text').style.display = 'inline';

    document.getElementById('username-input').style.display = 'none';
    document.getElementById('name-input').style.display = 'none';
    document.getElementById('nim-input').style.display = 'none';
    document.getElementById('email-input').style.display = 'none';
    document.getElementById('phone-input').style.display = 'none';

    document.getElementById('edit-btn').style.display = 'inline';
    document.getElementById('save-btn').style.display = 'none';
}
