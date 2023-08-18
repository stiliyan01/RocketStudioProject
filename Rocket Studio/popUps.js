const openButtons = document.querySelectorAll(".openPopup");
const closeButtons = document.querySelectorAll(".close");

openButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const targetPopupId = this.getAttribute("data-target");
    const targetPopup = document.getElementById(targetPopupId);
    targetPopup.style.display = "block";
  });
});

closeButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const targetPopupId = this.getAttribute("data-target");
    const targetPopup = document.getElementById(targetPopupId);
    targetPopup.style.display = "none";
  });
});
