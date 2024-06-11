document.querySelectorAll('.adopt-button').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const petId = this.getAttribute('href').split('=')[1];

        fetch('check_login.php')
            .then(response => response.json())
            .then(data => {
                if (data.isAuthenticated) {
                    window.location.href = `adopt.php?petId=${petId}`;
                } else {
                    alert('You need to log in first!');
                    window.location.href = `login.php?redirect=adopt&petId=${petId}`;
                }
            });
    });
});
