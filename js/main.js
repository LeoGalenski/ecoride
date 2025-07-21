document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("search-form");
    if (form) {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const departure = document.getElementById("departure").value;
            const arrival = document.getElementById("arrival").value;
            const date = document.getElementById("date").value;
            console.log(`Recherche : ${departure} vers ${arrival} le ${date}`);
        });
    }
});