<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - GameStore</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/reports.css">
</head>
<body>
    
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3">
        <h3 class="text-dark">Reports</h3>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="admin_dashboard.php" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link"><i class="fas fa-users"></i> Users</a>
            </li>
            <li class="nav-item">
                <a href="../actions/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>

<!-- Main content -->
        <div>
            <a href="admin_dashboard.php"><button class="btn btn-outline-dark">Back to Dashboard</button></a>
        </div>
<div class="main-content flex-grow-1">
        <!-- Header -->
        <header class="header d-flex justify-content-between">
            <h1>Welcome, Admin</h1>
            
        </header>
        <!-- Content -->
         
        <div class="content">
        
            <h2>Reports Stats</h2>
            <p>*data from last year</p>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            User Growth
                        </div>
                        <div class="card-body">
                            <canvas id="userGrowthChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Sales
                        </div>
                        <div class="card-body">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <!-- Chart.js for charts -->
    <script>
        // User Growth Chart
        var ctx = document.getElementById('userGrowthChart').getContext('2d');
        var userGrowthChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'User Growth',
                    data: [12, 19, 3, 5, 2, 3, 9],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Sales Chart
        var ctx2 = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 2, 3, 9],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
</body>
</html>