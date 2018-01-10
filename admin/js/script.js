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
                      event.target.closest("tr").remove();
                    });
        }
    });
}
