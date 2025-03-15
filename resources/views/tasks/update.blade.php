<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-primary-800 text-white hidden md:block">
            <div class="p-4 flex items-center space-x-2">
                <i class="fas fa-shapes text-2xl"></i>
                <h1 class="text-xl font-bold">DashPanel</h1>
            </div>
            <div class="mt-6">
                <div class="px-4 py-2 bg-primary-700">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 p-4 w-64">
                <div class="flex items-center space-x-2">
                    <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=75&fm=jpg&w=64&w=64&fit=max"
                        alt="User" class="rounded-full" />
                    <div>
                        {{-- <div class="font-semibold">John Doe</div>
                        <div class="text-sm text-gray-300">Administrator</div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="bg-white shadow-sm">
                <div class="px-4 py-3 flex justify-between items-center">
                    <div class="flex items-center md:hidden">
                        <button class="text-gray-500 focus:outline-none">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="flex-1 md:flex md:items-center md:justify-between">
                        <div class="relative">
                            <input type="text" placeholder="Search..."
                                class="w-full md:w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none" />
                            <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="relative p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <i class="fas fa-bell"></i>
                                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                            <button class="relative p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <i class="fas fa-envelope"></i>
                                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-100">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Dashboard Overview</h2>
                    <p class="text-gray-600">Welcome back, John! Here's what's happening today.</p>
                </div>

                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <div class="bg-white rounded-lg p-6 shadow-lg">
                        <h2 class="text-2xl font-bold mb-4">Add Task</h2>

                        <form id="taskForm">
                            <!-- Task Title -->
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                                <input type="text" id="title" name="title"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Enter task title" required />
                            </div>

                            <!-- Task Description -->
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Task
                                    Description</label>
                                <textarea id="description" name="description"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Enter task description" required></textarea>
                            </div>

                            <!-- Task Status -->
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="status" name="status"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                    <option value="0">Pending</option>
                                    <option value="1">In progress</option>
                                    <option value="2">Completed</option>
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-between">
                                <input type="hidden" id="user_id" name="user_id">
                                <input type="hidden" id="task_id" name="task_id">
                                <button type="button" id="closeModalBtn"
                                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Save Task
                                </button>
                            </div>
                        </form>
                    </div>

                </div>


            </main>
        </div>
    </div>
</body>

</html>

<script>
    const url = window.location.href;
    const id = url.split('/').pop();
    const taskId = parseInt(id, 10);

    const token = localStorage.getItem('token');
    const user_id = localStorage.getItem('user_id');

    document.getElementById("user_id").value = user_id;

    const taskForm = document.getElementById('taskForm');

    taskForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(taskForm);

        fetch('{{ config('app.url') }}/api/tasks/update/' + taskId, {
                method: 'post', // HTTP method
                body: formData, // Form data
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // alert("Login successful!");
                    localStorage.setItem('token', data.data.token);
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

    function fetchTasks() {
        const token = localStorage.getItem('token');

        if (!token) {
            window.location.href = '{{ config('app.url') }}/login';
            return;
        }

        fetch('{{ config('app.url') }}/api/tasks/edit/' + taskId, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => response.json())
            .then(data => {

                console.log(data);
                if (data.success) {
                    data = data.task;
                    
             document.getElementById("title").value = data.title;
             document.getElementById("description").value = data.description;
             document.getElementById("status").value = data.status;
             document.getElementById("task_id").value = taskId;



                } else {
                    alert("Error fetching tasks: " + data.message);
                }
            })
            .catch(error => {
                console.error("An error occurred:", error);
                // window.location.href = '{{ config('app.url') }}/login';
            });
    }

    window.onload = fetchTasks;
</script>




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
