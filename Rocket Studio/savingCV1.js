document.getElementById("submitButton").addEventListener("click", function () {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var dateOfBirth = document.getElementById("dateOfBirth").value;
  var university = document.getElementById("university").value;
  var technology = document.getElementById("technology").value;

  var data = {
    fname: fname,
    lname: lname,
    dateOfBirth: dateOfBirth,
    university: university,
    technology: technology,
  };

  fetch("savingCV.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => {
      return response.json();
    })
    .then((result) => {
      console.log(result.message);
    })
    .catch((error) => {
      console.error("Възникна грешка:", error);
    });
});
