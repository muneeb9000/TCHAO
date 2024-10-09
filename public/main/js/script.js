//menu icon
// Select the hamburger and the nav
const hamburger = document.querySelector('.hamburger');
const nav = document.querySelector('nav');

// Add event listener to toggle 'nav-open' class on click
hamburger.addEventListener('click', () => {
  nav.classList.toggle('nav-open');
});
const navItems = document.querySelectorAll('.nav-item');
navItems.forEach(item => {
  item.addEventListener('click', () => {
    // Remove 'nav-open' class to close the menu
    nav.classList.remove('nav-open');
  });
});
//active section
function showSection(sectionId) {
  // Hide all sections
  const sections = document.querySelectorAll(".section");
  sections.forEach((section) => {
    section.classList.remove("active");
  });

  // Show the selected section
  const sectionToShow = document.getElementById(sectionId);
  sectionToShow.classList.add("active");

  // Update the URL hash without refreshing the page
  window.location.hash = sectionId;
}

// When page loads or refreshes, check the URL hash and show the correct section
function handleHashChange() {
  // Get the current hash value (without the # symbol)
  const hash = window.location.hash.replace("#", "");

  // If hash is empty, default to 'home'
  const sectionToShow = hash || "home";

  // Show the correct section
  showSection(sectionToShow);
}

// Attach event listener for hash changes (for back/forward navigation)
window.addEventListener("hashchange", handleHashChange);

// Call the function on page load to show the correct section
handleHashChange();
//slick slider
$(".sliders").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
       arrows:false
      },
    },
   
  ],
});
//registration and login
document.getElementById('registrationForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission
  
  // Get form values
  let firstName = document.getElementById('firstName').value;
  let lastName = document.getElementById('lastName').value;
  let email = document.getElementById('regEmail').value;
  let phone = document.getElementById('phone').value;
  let password = document.getElementById('regPassword').value;
  
  // Simple validation
  let isValid = true;

  // Clear previous error messages
  document.getElementById('firstNameError').innerText = '';
  document.getElementById('lastNameError').innerText = '';
  document.getElementById('emailError').innerText = '';
  document.getElementById('phoneError').innerText = '';
  document.getElementById('passwordError').innerText = '';
  
  if (!firstName) {
    document.getElementById('firstNameError').innerText = 'First Name is required';
    isValid = false;
  }
  
  if (!lastName) {
    document.getElementById('lastNameError').innerText = 'Last Name is required';
    isValid = false;
  }
  
  if (!email) {
    document.getElementById('emailError').innerText = 'Email is required';
    isValid = false;
  }
  
  if (!phone) {
    document.getElementById('phoneError').innerText = 'Phone No is required';
    isValid = false;
  }
  
  if (!password) {
    document.getElementById('passwordError').innerText = 'Password is required';
    isValid = false;
  }
  
  // If form is valid, transfer data to login form
  if (isValid) {
    document.getElementById('loginEmail').value = email;
    document.getElementById('loginPassword').value = password;
    alert('Registration successful! You can now login.');
  }
});

// Clear error messages on input
let inputs = document.querySelectorAll('input');
inputs.forEach(input => {
  input.addEventListener('input', function() {
    this.nextElementSibling.innerText = ''; // Clear error message on input
  });
});


//faqs
document.addEventListener('DOMContentLoaded', function() {
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach((item) => {
    const question = item.querySelector('.faq-question');

    question.addEventListener('click', function() {
      // Toggle active class for the clicked item
      item.classList.toggle('active');

      // Close other FAQ items
      faqItems.forEach((otherItem) => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
        }
      });
    });
  });
});
