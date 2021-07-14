require("./bootstrap");

/**
 * DELETE POST CONFIRM
 */

const delForm = document.querySelectorAll(".delete-post-form");
//console.log(delForm);

delForm.forEach(form => {
    form.addEventListener("submit", function(e) {
        const resp = confirm("You really want to delete this post?");
        console.log(resp);

        if (!resp) {
            e.preventDefault();
        }
    });
});

// const valName = document.querySelectorAll(".btn");

// valName.addEventListener("submit", function(e) {
//     const resp = "You really want to delete this post?";
//     console.log(resp);

//     if (!resp) {
//         e.preventDefault();
//     }
// });

const btnRegister = document.getElementById("register");

if (btnRegister) {
    btnRegister.addEventListener("click", function(e) {
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
        }
    });
}
