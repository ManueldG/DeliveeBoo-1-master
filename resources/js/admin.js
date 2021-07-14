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
