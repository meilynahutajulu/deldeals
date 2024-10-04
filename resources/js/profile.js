document.addEventListener('DOMContentLoaded', function () {
    const editButton = document.querySelector('.edit-btn');
    const profileDetails = document.querySelector('.profile-details');
    
    editButton.addEventListener('click', function () {
        if (editButton.innerText === 'Edit') {
            // Convert profile details to input fields
            const username = document.createElement('input');
            username.type = 'text';
            username.value = '@bernadyaaa_1bulan';

            const name = document.createElement('input');
            name.type = 'text';
            name.value = 'Bernadya Simangunsong';

            const nim = document.createElement('input');
            nim.type = 'text';
            nim.value = '12S22000';

            const email = document.createElement('input');
            email.type = 'email';
            email.value = 'bernadyassssssss123x@gmail.com';

            const phone = document.createElement('input');
            phone.type = 'tel';
            phone.value = '08131234567';

            // Clear existing profile details
            profileDetails.innerHTML = '';

            // Append input fields to the profile details
            profileDetails.appendChild(createProfileRow('Username:', username));
            profileDetails.appendChild(createProfileRow('Nama:', name));
            profileDetails.appendChild(createProfileRow('NIM:', nim));
            profileDetails.appendChild(createProfileRow('Email:', email));
            profileDetails.appendChild(createProfileRow('No. Handphone:', phone));

            editButton.innerText = 'Save';
        } else {
            // Here you can add code to handle saving the data
            alert('Profile saved!');

            // After saving, switch back to view mode
            location.reload();
        }
    });

    function createProfileRow(labelText, inputField) {
        const row = document.createElement('div');
        row.classList.add('profile-row');

        const label = document.createElement('strong');
        label.innerText = labelText;
        row.appendChild(label);

        row.appendChild(inputField);
        return row;
    }
});
