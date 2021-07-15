require("./bootstrap");

/**
 * DELETE POST CONFIRM
 */

const delForm = document.querySelectorAll(".delete-post-form");
//console.log(delForm);

delForm.forEach(form => {
    form.addEventListener("submit", function (e) {
        const resp = confirm("You really want to delete this post?");
        console.log(resp);

        if (!resp) {
            e.preventDefault();
        }
    });
});

const btnRegister = document.getElementById("register");

if (btnRegister) {
    btnRegister.addEventListener("click", function (el) {
        const name = document.getElementById("name").value;
        if (name === "") {
            alert("Insert Name");
        } else if (name.length > 30) {
            alert("Name is too long");
        }

        const surname = document.getElementById("surname").value;
        if (surname === "") {
            alert("Insert Surname");
        } else if (surname.length > 30) {
            alert("Surname is too long");
        }

        const piva = document.getElementById("piva").value;
        if (piva === "") {
            alert("Insert Piva");
        } else if (piva.length < 11) {
            alert("P.IVA must be  11");
        } else if (piva.length > 16) {
            alert("P.IVA must be  16");
        }

        const email = document.getElementById("email").value;
        if (email === "") {
            alert("Insert email");
        } else if (!email.includes("@")) {
            alert("Insert a valid email");
        }

        const password = document.getElementById("password").value;
        const confPassword = document.getElementById("password-confirm").value;
        if (password === "") {
            alert("Insert password");
        } else if (password.length < 8) {
            alert("Your password is too short");
        } else if (password !== confPassword) {
            alert("Your password does not match");
            el.preventDefault();
        }
    });
}


const btnCreate = document.getElementById("createRestaurant");

if (btnCreate) {
    btnCreate.addEventListener("click", function (ele) {
        const name = document.getElementById("name").value;
        if (name === "") {
            alert("Insert Restaurant Name");
        } else if (name.length > 30) {
            alert("Name is too long");
        }
        const address = document.getElementById("address").value;
        if (address === "") {
            alert("Insert address");
        }
        const city = document.getElementById("city").value;
        if (city === "") {
            alert("Insert city");
        }
        const cap = document.getElementById("cap").value;
        if (cap === "") {
            alert("Insert cap");
        } else if (cap.length > 5) {
            alert('Cap is invalid');
        }
        const phone_number = document.getElementById("phone_number").value;
        if (phone_number === "") {
            alert("Insert a phone number");
            ele.preventDefault();
        } else if (phone_number.length > 20) {
            alert('Phone number is too long');
            ele.preventDefault();
        }
        /* const cuisine = document.querySelectorAll("cuisines");
        if (!cuisine.checked) {
            alert("Please select a cuisine");
            el.preventDefault();
        } */
    });
}

const btnPlate = document.getElementById("createPlate");

if (btnPlate) {
    btnPlate.addEventListener("click", function (elem) {
        const name = document.getElementById("name").value;
        if (name === "") {
            alert("Insert Plate name");
        }
        const description = document.getElementById("description").value;
        if (description === "") {
            alert("Insert Plate description");
        }
        const price = document.getElementById("price").value;
        if (price === "") {
            alert("Insert Plate price");
            elem.preventDefault();
        }
    });
}