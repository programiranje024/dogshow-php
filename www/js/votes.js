// Get the form element
const form = document.querySelector("form");

// Add event listener
form.addEventListener("submit", (e) => {
  // Prevent default action
  e.preventDefault();

  // Get the checked radio button
  const choice = document.querySelector("input[name=breed]:checked")?.value;

  // If no choice, alert the user
  if (!choice) {
    alert("Please select a breed!");
    return;
  }

  // Create the data to send
  const data = new FormData();
  data.append("id_breed", choice);

  // Send a POST request to the server (path: /ajax/vote.php)
  fetch("/ajax/vote.php", {
    method: "POST",
    body: data,
  })
    .then((response) => {
      if (!response.ok) {
        // If the response is not ok, alert the user
        alert("Error voting for the breed!");
      } else {
        // If the response is ok, reload the page
        alert("Thank you for voting!");
      }
    })
    .catch((_error) => {
      // If there is an error, alert the user
      alert("Error voting for the breed!");
    });
});
