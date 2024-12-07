// function toggleEdit() {
//     // Get elements
//     const editBtn = document.getElementById('edit-btn');
//     const saveBtn = document.getElementById('save-btn');

//     const inputs = document.querySelectorAll('input');
//     const spans = document.querySelectorAll('span');

//     // Toggle visibility
//     inputs.forEach(input => input.style.display = 'block');
//     spans.forEach(span => span.style.display = 'none');

//     // Show Save button, hide Edit button
//     editBtn.style.display = 'none';
//     saveBtn.style.display = 'inline-block';
// }

// function saveBio() {
//     // Get elements
//     const editBtn = document.getElementById('edit-btn');
//     const saveBtn = document.getElementById('save-btn');

//     const inputs = document.querySelectorAll('input');
//     const spans = document.querySelectorAll('span');

//     // Update text and toggle visibility
//     inputs.forEach((input, index) => {
//         spans[index].textContent = input.value;
//         input.style.display = 'none';
//     });

//     spans.forEach(span => span.style.display = 'inline');

//     // Show Edit button, hide Save button
//     editBtn.style.display = 'inline-block';
//     saveBtn.style.display = 'none';
// }
