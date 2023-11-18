document.addEventListener("DOMContentLoaded", function() {
    // Get references to the button and countdown elements
    var button = document.getElementById("myButton1");
    var countdownElement = document.getElementById("countdown1");

    // Set the initial countdown value
    var countdownValue = 10;

    // Function to update the countdown element
    function updateCountdown() {
        countdownElement.textContent = " " + countdownValue;
    }

    // Function to show the button
    function showButton() {
        button.style.display = "block";
        countdownElement.style.display = "none"; // Hide the countdown
    }

    // Start the countdown
    updateCountdown();
    var countdownInterval = setInterval(function() {
        countdownValue--;
        updateCountdown();

        // If countdown reaches 0, show the button and stop the interval
        if (countdownValue === 0) {
            showButton();
            clearInterval(countdownInterval);
        }
    }, 1000); // Update every 1 second (1000 milliseconds)
});
//With this code, the button will be hidden initially, and when the page loads, it will start a 10-second countdown. After the countdown reaches 0, the button will be displayed.


//Second countdown 

document.addEventListener("DOMContentLoaded", function() {
    // Get references to the button and countdown elements
    var button = document.getElementById("myButton2");
    var countdownElement = document.getElementById("countdown2");

    // Set the initial countdown value
    var countdownValue = 10;

    // Function to update the countdown element
    function updateCountdown() {
        countdownElement.textContent = " " + countdownValue;
    }

    // Function to show the button
    function showButton() {
        button.style.display = "block";
        countdownElement.style.display = "none"; // Hide the countdown
    }

    // Start the countdown
    updateCountdown();
    var countdownInterval = setInterval(function() {
        countdownValue--;
        updateCountdown();

        // If countdown reaches 0, show the button and stop the interval
        if (countdownValue === 0) {
            showButton();
            clearInterval(countdownInterval);
        }
    }, 1000); // Update every 1 second (1000 milliseconds)
});
//With this code, the button will be hidden initially, and when the page loads, it will start a 10-second countdown. After the countdown reaches 0, the button will be displayed.








