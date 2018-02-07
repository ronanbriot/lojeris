var deleteBtns = document.querySelectorAll("a.btn-danger");

for (var i = 0; i < deleteBtns.length; i++) {
    var button = deleteBtns[i];
    button.addEventListener("click", function (event) {
        event.preventDefault(); // Annule l'action par défaut

        var confirmation = confirm("Etes vous sur de vouloir supprimer ?");
        if (confirmation) {
            var url = this.getAttribute("href");
            fetch(url, {credentials: "same-origin"})
                    .then(function (response) {
                        if (response.ok) {
                            event.target.closest("tr").remove();
                        } else {
                            alert("Suppression impossible");
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
        }
    });
}

$(document).ready(function () {
    $('select').select2();
    $('table').DataTable();
    tinymce.init({ selector:'textarea' });
});
