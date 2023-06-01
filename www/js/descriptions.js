// Get the form element
const form = document.querySelector("form");
// Get the id_breed select
const breed = document.querySelector("#id_breed");
// Get the description input
const description = document.querySelector("#description");

function setError(id, error = "") {
  if (error) {
    document.getElementById(id).classList.add("error");
    document.getElementById(`${id}_error`).innerHTML = error;
  } else {
    document.getElementById(id).classList.remove("error");
    document.getElementById(`${id}_error`).innerHTML = "";
  }
}

// Add an event listener to the form
form.addEventListener("submit", (e) => {
  // Prevent the default behaviour of the form
  e.preventDefault();

  // Get the value of the breed select
  const breedValue = breed.value;
  // Get the value of the description input
  const descriptionValue = description.value;

  // Create a new FormData object
  const formData = new FormData();
  // Add the breed and description values to the formData object
  formData.append("id_breed", breedValue);
  formData.append("description", descriptionValue);

  // Reset the errors
  setError(breed.id);
  setError(description.id);
  setError("submit");

  // Check if the breed is empty
  if (!breedValue) {
    setError(breed.id, "Please select a breed");
    return;
  }

  // Check if the description is less than 8 characters
  if (descriptionValue.length < 8) {
    setError(
      description.id,
      "Please enter a description with at least 8 characters"
    );
    return;
  }

  // Send a POST request to the server (path: /insert-breed.php)
  fetch("/insert-breed.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      alert("You have successfully added a new breed description");
    })
    .catch((error) => {
      setError("submit", error.message);
    });
});
