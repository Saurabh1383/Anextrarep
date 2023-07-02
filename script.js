document.getElementById("userForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
  
    var form = document.getElementById("userForm");
    var formData = new FormData(form);
  
    // Send the form data to PHP using AJAX or fetch API
    // You can also modify the code to use a JavaScript framework/library
  
    fetch("insert.php", {
      method: "POST",
      body: formData
    })
      .then(function(response) {
        return response.text();
      })
      .then(function(data) {
        console.log(data); // Display response from PHP
        // Optionally, show a success message or redirect to another page
      })
      .catch(function(error) {
        console.error(error);
        // Handle errors
      });
  });
  