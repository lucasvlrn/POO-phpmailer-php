change.addEventListener("click", () => {
  var theme = document.getElementById("body");
  var change = document.getElementById("change");
  var input = document.querySelectorAll(".input-text");
  var title = document.getElementById("title");

  if (change.checked) {
    theme.style.backgroundColor = "#f6f6f6";
    input.forEach((input_array) => {
      input_array.style.backgroundColor = "#f6f6f6";
      input_array.style.color = "#11191f";
    });
    title.style.color = "#11191f";
  } else {
    theme.style.backgroundColor = "#11191f";
    input.forEach((input_array) => {
      input_array.style.backgroundColor = "#11191f";
      input_array.style.color = "hsl(205, 16%, 77%)";
    });
    title.style.color = "hsl(205, 16%, 77%)";
  }
});
