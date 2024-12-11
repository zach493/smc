function toggleDetails(box) {
    const details = box.querySelector('.journal-details');
    if (details.style.display === 'none' || details.style.display === '') {
        details.style.display = 'block'; // Show the details
    } else {
        details.style.display = 'none'; // Hide the details
    }
}

function showDownloadPopup() {
    // This will display the alert when the user tries to click the "Download Link"
    alert("You must be a member to download.");
}


