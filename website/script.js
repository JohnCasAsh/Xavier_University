// Login form: Terms check
document.querySelectorAll('form').forEach(function(form){
    form.onsubmit = function (e) {
        var checkbox = document.getElementById('terms');
        if (checkbox && !checkbox.checked) {
            alert('You must accept the Terms of Use.');
            e.preventDefault();
        }
    };
});

// Navbar search animation
document.addEventListener('DOMContentLoaded', function() {
    const searchIcon = document.getElementById('searchIcon');
    const navbar = document.querySelector('.navbar');
    const navInput = document.getElementById('navSearchInput');
    const closeBtn = document.getElementById('closeSearchBtn');

    function openSearch() {
        navbar.classList.add('show-search');
        setTimeout(() => navInput.focus(), 370);
    }
    function closeSearch() {
        navbar.classList.remove('show-search');
    }

    if (searchIcon) searchIcon.addEventListener('click', openSearch);
    if (closeBtn) closeBtn.addEventListener('click', closeSearch);

    // Optional: close on Escape key
    if (navInput) {
        navInput.addEventListener('keydown', function(e){
            if(e.key === "Escape") closeSearch();
        });
    }
    
});

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    // Toggle the password visibility
    const type = password.type === "password" ? "text" : "password";
    password.type = type;

    // Toggle the icon
    if (type === "password") {
        togglePassword.innerHTML = '<i class="fa-solid fa-eye"></i>';
    } else {
        togglePassword.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    }
});


