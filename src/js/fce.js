function showAlert(txt, url) {
    let confirmation = confirm(txt);
    if (confirmation) {
        window.location.href = url;
    }
}
