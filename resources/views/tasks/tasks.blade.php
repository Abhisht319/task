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
                    {{-- <h2 class="text-2xl font-semibold text-gray-800">Dashboard Overview</h2>
                    <p class="text-gray-600">Welcome back, John! Here's what's happening today.</p> --}}
                </div>

                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table id="task_table" class="min-w-full table-auto">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Title</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Description</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Status</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Created At</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody id="task_table_body">

                        </tbody>
                    </table>
                </div>


            </main>
        </div>
    </div>
</body>

</html>

<script>
function fetchTasks() {
    const token = localStorage.getItem('token');
    const user_id = localStorage.getItem('user_id');

    if (!token) {
        window.location.href = '{{ config('app.url') }}/login';
        return;
    }

    fetch('{{ config('app.url') }}/api/tasks', {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`,
            'user_id': user_id,
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tasks = data.data;
            const taskTableBody = document.getElementById('task_table_body');
            taskTableBody.innerHTML = ''; 

            tasks.forEach(task => {
                const row = document.createElement('tr');
                
                const titleCell = document.createElement('td');
                titleCell.classList.add('px-4', 'py-2', 'text-sm', 'text-gray-700');
                titleCell.textContent = task.title;

                const descriptionCell = document.createElement('td');
                descriptionCell.classList.add('px-4', 'py-2', 'text-sm', 'text-gray-700');
                descriptionCell.textContent = task.description;

                const statusCell = document.createElement('td');
                statusCell.classList.add('px-4', 'py-2', 'text-sm', 'text-gray-700');
                statusCell.textContent = task.status === '0' ? 'Pending' : 'Completed';                 

                const createdAtCell = document.createElement('td');
                createdAtCell.classList.add('px-4', 'py-2', 'text-sm', 'text-gray-700');
                createdAtCell.textContent = new Date(task.created_at).toLocaleString(); 
                
                const actionCell = document.createElement('td');
                actionCell.classList.add('px-4', 'py-2', 'text-sm', 'text-gray-700');
                

                const editButton = document.createElement('button');
                editButton.setAttribute('data-id', task.id);
                editButton.classList.add('px-4', 'py-2', 'bg-blue-500', 'text-white', 'rounded', 'mr-2');
                editButton.textContent = 'Edit';
                editButton.addEventListener('click', () => {
                    window.location.href = '{{ config('app.url') }}/taskedit/' + task.id;

                });
                
                const deleteButton = document.createElement('button');
                deleteButton.classList.add('px-4', 'py-2', 'bg-red-500', 'text-white', 'rounded');
                deleteButton.textContent = 'Delete';
                deleteButton.addEventListener('click', () => {
                    deleteTask(task.id)
                });
                
                actionCell.appendChild(editButton);
                actionCell.appendChild(deleteButton);
                row.appendChild(titleCell);
                row.appendChild(descriptionCell);
                row.appendChild(statusCell);
                row.appendChild(createdAtCell);
                row.appendChild(actionCell);
                
                taskTableBody.appendChild(row);
            });
        } else {
            alert("Error fetching tasks: " + data.message);
        }
    })
    .catch(error => {
        // console.error("An error occurred:", error);
        // alert("An error occurred while fetching tasks.");
        // window.location.href = '{{ config('app.url') }}/login';
    });
}

// Optional: Function to handle task deletion
function deleteTask(taskId) {
    const token = localStorage.getItem('token');

    fetch('{{ config('app.url') }}/api/tasks/delete/' + taskId, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Task with ID ${taskId} deleted.`);
            const row = document.getElementById('task_' + taskId);
            row.remove();
            fetchTasks();
        } else {
            alert("Error deleting task: " + data.message);
        }
    })
    .catch(error => {
        console.error("An error occurred:", error);
        alert("An error occurred while deleting the task.");
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
