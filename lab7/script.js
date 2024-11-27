$(document).ready(function() {
    
    $('#register-btn').click(function() {
        window.location.href = 'register.html';
    });

    $('#login-btn').click(function() {
        window.location.href = 'login.html';
    });

    
    $('#profile-btn').click(function() {
        window.location.href = 'profile_edit.php';
    });

    
    $('#register-form').submit(function(e) {
        e.preventDefault();
        const username = $('#username').val();
        const email = $('#email').val();
        const password = $('#password').val();
        const confirmPassword = $('#confirm-password').val();

        if (password !== confirmPassword) {
            $('#error-message').text('Паролі не співпадають');
            return;
        }

        if (!validateEmail(email)) {
            $('#error-message').text('Невірний формат електронної пошти');
            return;
        }

        
        $.ajax({
            url: 'register.php',
            method: 'POST',
            data: { username, email, password },
            success: function(response) {
                if (response === 'success') {
                    window.location.href = 'index.html'; 
                } else {
                    $('#error-message').text(response); 
                }
            }
        });
    });

    
    $('#login-form').submit(function(e) {
        e.preventDefault();
        const email = $('#email').val();
        const password = $('#password').val();

        if (!validateEmail(email)) {
            $('#login-error-message').text('Невірний формат електронної пошти');
            return;
        }

        
        $.ajax({
            url: 'login.php',
            method: 'POST',
            data: { email, password },
            success: function(response) {
                if (response === 'success') {
                    window.location.href = 'index.html'; 
                } else {
                    $('#login-error-message').text(response); 
                }
            }
        });
    });

    
    function validateEmail(email) {
        const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return regex.test(email);
    }
});
