<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center text-primary-500 mb-6">Login</h1>

        <form id="login_form" action="#" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500" required>
            </div>

            <button type="submit" class="w-full bg-primary-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500">Submit</button>
        </form>

        <p class="mt-4 text-center text-gray-600">Don't have an account? <a href="{{ config('app.url') }}/register" class="text-primary-500 hover:text-primary-600">Sign Up</a></p>
    </div>

    <script>
        const loginForm = document.getElementById('login_form');

        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(loginForm);

            fetch('{{ config('app.url') }}/api/login', {
                method: 'POST', // HTTP method
                body: formData, // Form data
                headers: {
                    'Accept': 'application/json', 
                    // 'Authorization': 'Bearer YOUR_TOKEN_HERE'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                
                if (data.success) {
                    // alert("Login successful!");
                    localStorage.setItem('token', data.data.token);
                    localStorage.setItem('user_id', data.data.id);
                    window.location.href = '{{ config('app.url') }}/taskdata';
                    
                } else {
                    alert("Login failed: " + data.message);
                    console.error(data);
                }
            })
            .catch(error => {
                // Handle network or other errors
                alert("An error occurred: " + error.message);
                console.error(error);
            });
        });
    </script>

</body>
</html>

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: {
                        50: "#f0f9ff",
                        100: "#e0f2fe",
                        200: "#bae6fd",
                        300: "#7dd3fc",
                        400: "#38bdf8",
                        500: "#0ea5e9",
                        600: "#0284c7",
                        700: "#0369a1",
                        800: "#075985",
                        900: "#0c4a6e"
                    }
                }
            }
        }
    };
</script>
