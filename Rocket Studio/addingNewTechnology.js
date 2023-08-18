// Слушател за натискане на бутона "Запис на CV"

let technologyButton = document.querySelector(".technologyButton");
technologyButton.addEventListener("click", () => {
  document
    .querySelector(".technologySubmit")
    .addEventListener("click", function (e) {
      e.preventDefault();

      var technology = document.getElementById("technologyInput").value;

      var data = {
        technology: technology,
      };

      fetch("addingNewTechnology.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      })
        .then((response) => response.json())
        .then((result) => {
          console.log(result.message);
        })
        .catch((error) => {
          console.error("Възникна грешка:", error);
        });
    });
});
