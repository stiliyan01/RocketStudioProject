var newUniversityButton = document.querySelector(".uniButton");

newUniversityButton.addEventListener("click", () => {
  document
    .getElementById("universitySubmit")
    .addEventListener("click", function (e) {
      e.preventDefault();

      var name = document.getElementById("universityName").value;
      var grade = document.getElementById("universityGrade").value;

      var data = {
        name: name,
        grade: grade,
      };

      fetch("addingNewUniversity.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      })
        .then((response) => response.json())
        .then((result) => {
          console.log(result);
        })
        .catch((error) => {
          console.error("Възникна грешка:", error);
        });
    });
});
