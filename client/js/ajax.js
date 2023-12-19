/* submit form for cart shopping using AJAX */
function submitForm(id) {
    
    // recuperer les data de form 
    var formId = document.getElementById(id);
    var form = new FormData(formId);

    // open php file has requet to fill panier table
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "shoppingAction.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("yes");
        }
    }
    // send the data form 
    xhr.send(form);
}

/* submit form for favorite using AJAX */
function favSubmit(id) {
    // recuperer les data de form 
    var formId = document.getElementById(id);
    var form = new FormData(formId);

    // open php file has requet to fill panier table
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "favAction.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("yes");
        }
    }
    // send the data form 
    xhr.send(form);
}

function incrementQunti(formId) {
    // recuperer les data de form 
    var formId = document.getElementById(formId);
    var form = new FormData(formId);


    // open php file has requet to fill panier table
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "addQunt.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("yes");
        }
    }
    // send the data form 
    xhr.send(form);
}


function decrementQunti(formId) {
    // recuperer les data de form 
    var formId = document.getElementById(formId);
    var form = new FormData(formId);


    // open php file has requet to fill panier table
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "decrementQunt.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("yes");
        }
    }
    // send the data form 
    xhr.send(form);
}


