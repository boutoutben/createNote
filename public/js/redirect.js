function redirectPost(action){

    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    
    var form = document.createElement("form");

    // Set the form's method to POST
    form.method = "POST";
    form.action = action;

    // Create a hidden input field for the CSRF token
    var csrfInput = document.createElement("input");
    csrfInput.type = "hidden";
    csrfInput.name = "_token"; // Laravel expects the CSRF token to be named "_token"
    csrfInput.value = csrfToken;

    // Append the CSRF token input to the form
    form.appendChild(csrfInput);

    document.body.appendChild(form);

    form.submit();
}