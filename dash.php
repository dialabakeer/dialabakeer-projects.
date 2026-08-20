<?php
session_start();
require_once "dbconnect.php";

/* COUNTS */
$totalUsers  = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM wedding_accounts"))[0];
$totalDJ     = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM dj_requests"))[0];
$totalHotels = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM bookings"))[0];
$totalDecor  = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM decor_requests"))[0];
$totalCakes  = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM cake_orders"))[0];
$totalMsgs   = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM contact_messages"))[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root{
            --primary:#c9a78a;
            --primary-dark:#b39475;
            --accent:#e8d6c4;
            --text:#5d4e42;
            --bg:#fbf8f4;
            --card:#ffffff;
            --shadow: 0 8px 32px rgba(201, 167, 138, 0.15);
            --shadow-hover: 0 12px 48px rgba(201, 167, 138, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--bg) 0%, #f5ede4 100%);
            display: flex;
            min-height: 100vh;
            color: var(--text);
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #ffffff 0%, #fdfbf9 100%);
            padding: 40px 25px;
            box-shadow: 4px 0 24px rgba(0,0,0,.08);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            border-right: 3px solid var(--accent);
        }

        .sidebar h2 {
            font-family: 'Playfair Display', serif;
            color: var(--primary);
            text-align: center;
            margin-bottom: 45px;
            font-size: 28px;
            position: relative;
            padding-bottom: 15px;
        }

        .sidebar h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--primary), transparent);
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            border-radius: 16px;
            color: var(--text);
            text-decoration: none;
            margin-bottom: 12px;
            transition: all .3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .sidebar a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(90deg, var(--accent), var(--primary-dark));
            transition: width .3s ease;
            z-index: -1;
        }

        .sidebar a:hover::before,
        .sidebar a.active::before {
            width: 100%;
        }

        .sidebar a i {
            margin-right: 14px;
            color: var(--primary);
            font-size: 20px;
            transition: all .3s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: var(--primary-dark);
            transform: translateX(5px);
        }

        .sidebar a:hover i,
        .sidebar a.active i {
            transform: scale(1.15);
            color: var(--primary-dark);
        }

        .main {
            flex: 1;
            margin-left: 280px;
            padding: 45px;
            overflow: auto;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
            animation: fadeInUp 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--accent);
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 38px;
            color: var(--primary);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
            margin-bottom: 50px;
        }

        .stat {
            background: linear-gradient(135deg, var(--card) 0%, #fdfbf9 100%);
            border-radius: 24px;
            padding: 32px;
            box-shadow: var(--shadow);
            transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(201, 167, 138, 0.1);
        }

        .stat::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(201, 167, 138, 0.05) 0%, transparent 70%);
            transition: transform .6s ease;
        }

        .stat:hover::before {
            transform: translate(-25%, -25%);
        }

        .stat:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary);
        }

        .stat i {
            font-size: 42px;
            color: var(--primary);
            margin-bottom: 16px;
            transition: transform .3s ease;
        }

        .stat:hover i {
            transform: scale(1.1) rotate(-5deg);
        }

        .stat h3 {
            font-size: 38px;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 8px;
        }

        .stat p {
            font-size: 16px;
            color: var(--text);
            font-weight: 500;
            margin-bottom: 6px;
        }

        .stat span {
            font-size: 13px;
            color: #b09a85;
            font-weight: 300;
        }

        .chart-box {
            background: linear-gradient(135deg, white 0%, #fdfbf9 100%);
            border-radius: 32px;
            padding: 40px;
            box-shadow: var(--shadow);
            margin-bottom: 60px;
            border: 1px solid rgba(201, 167, 138, 0.1);
            transition: all .3s ease;
        }

        .chart-box:hover {
            box-shadow: var(--shadow-hover);
        }

        .chart-box h2 {
            font-family: 'Playfair Display', serif;
            color: var(--primary);
            margin-bottom: 12px;
            font-size: 30px;
        }

        .chart-box p {
            font-size: 15px;
            color: #8f8176;
            margin-bottom: 30px;
        }

        .data-table {
            background: linear-gradient(135deg, white 0%, #fdfbf9 100%);
            border-radius: 28px;
            padding: 35px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(201, 167, 138, 0.1);
            overflow: hidden;
        }

        .data-table h2 {
            font-family: 'Playfair Display', serif;
            color: var(--primary);
            margin-bottom: 25px;
            font-size: 30px;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
            border-radius: 16px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        table th {
            background: linear-gradient(135deg, var(--accent) 0%, #f0e4d7 100%);
            padding: 18px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--primary-dark);
            border-bottom: 3px solid var(--primary);
            font-size: 15px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        table th:first-child {
            border-top-left-radius: 16px;
        }

        table th:last-child {
            border-top-right-radius: 16px;
        }

        table td {
            padding: 18px 20px;
            border-bottom: 1px solid #f5f0eb;
            color: var(--text);
            font-size: 14px;
        }

        table tr {
            transition: all .3s ease;
        }

        table tbody tr:hover {
            background: linear-gradient(90deg, rgba(201, 167, 138, 0.05) 0%, transparent 100%);
            transform: scale(1.01);
        }

        table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 16px;
        }

        table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 16px;
        }

        .empty-msg {
            text-align: center;
            padding: 80px 20px;
            color: #b09a85;
        }

        .empty-msg i {
            font-size: 64px;
            margin-bottom: 20px;
            opacity: 0.3;
            color: var(--primary);
        }

        .empty-msg p {
            font-size: 18px;
            font-weight: 500;
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }

            .main {
                margin-left: 240px;
            }

            .stats {
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                border-right: none;
                border-bottom: 3px solid var(--accent);
            }

            .main {
                margin-left: 0;
                padding: 25px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="#" class="active" onclick="showSection('dashboard', this)">
        <i class="fas fa-chart-line"></i> Dashboard
    </a>
    <a href="#" onclick="showSection('users', this)">
        <i class="fas fa-users"></i> Users
    </a>
    <a href="#" onclick="showSection('dj', this)">
        <i class="fas fa-music"></i> DJ Requests
    </a>
    <a href="#" onclick="showSection('hotels', this)">
        <i class="fas fa-hotel"></i> Hotel Bookings
    </a>
    <a href="#" onclick="showSection('decor', this)">
        <i class="fas fa-paint-brush"></i> Decor Requests
    </a>
    <a href="#" onclick="showSection('cakes', this)">
        <i class="fas fa-cake"></i> Cake Orders
    </a>
    <a href="#" onclick="showSection('messages', this)">
        <i class="fas fa-envelope"></i> Messages
    </a>
</div>

<div class="main">

    <!-- DASHBOARD SECTION -->
    <div id="dashboard" class="section active">
        <div class="header">
            <h1>Welcome back, Admin 👑</h1>
        </div>

        <div class="stats">
            <div class="stat">
                <i class="fas fa-users"></i>
                <h3><?= $totalUsers ?></h3>
                <p>Total Registered Users</p>
                <span>All active accounts</span>
            </div>
            <div class="stat">
                <i class="fas fa-music"></i>
                <h3><?= $totalDJ ?></h3>
                <p>DJ Requests</p>
                <span>Music & entertainment</span>
            </div>
            <div class="stat">
                <i class="fas fa-hotel"></i>
                <h3><?= $totalHotels ?></h3>
                <p>Hotel Bookings</p>
                <span>Confirmed reservations</span>
            </div>
            <div class="stat">
                <i class="fas fa-paint-brush"></i>
                <h3><?= $totalDecor ?></h3>
                <p>Decor Requests</p>
                <span>Styling & themes</span>
            </div>
            <div class="stat">
                <i class="fas fa-cake"></i>
                <h3><?= $totalCakes ?></h3>
                <p>Cake Orders</p>
                <span>Custom designs</span>
            </div>
            <div class="stat">
                <i class="fas fa-envelope"></i>
                <h3><?= $totalMsgs ?></h3>
                <p>Messages</p>
                <span>Customer inquiries</span>
            </div>
        </div>

        <div class="chart-box">
            <h2>Platform Activity Overview</h2>
            <p>Real-time overview of all services activity across the system</p>
            <canvas id="activityChart" height="120"></canvas>
        </div>
    </div>

    <!-- USERS SECTION -->
    <div id="users" class="section">
        <div class="header">
            <h1>Users Management</h1>
        </div>
        <div class="data-table">
            <h2>All Users (<?= $totalUsers ?>)</h2>
            <div class="table-container">
                <?php
                $users = mysqli_query($conn, "SELECT * FROM wedding_accounts ORDER BY id DESC");
                if(mysqli_num_rows($users) > 0){
                    echo '<table>';
                    echo '<thead><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Created At</th></tr></thead>';
                    echo '<tbody>';
                    while($user = mysqli_fetch_assoc($users)){
                        echo '<tr>';
                        echo '<td>'.htmlspecialchars($user['id']).'</td>';
                        echo '<td>'.htmlspecialchars($user['full_name']).'</td>';
                        echo '<td>'.htmlspecialchars($user['email']).'</td>';
                        echo '<td>'.htmlspecialchars($user['created_at']).'</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                }else{
                    echo '<div class="empty-msg"><i class="fas fa-users"></i><p>No users found</p></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- DJ SECTION -->
    <div id="dj" class="section">
        <div class="header">
            <h1>DJ Requests</h1>
        </div>
        <div class="data-table">
            <h2>All DJ Requests (<?= $totalDJ ?>)</h2>
            <div class="table-container">
                <?php
                $dj = mysqli_query($conn, "SELECT * FROM dj_requests ORDER BY id DESC");
                if(mysqli_num_rows($dj) > 0){
                    echo '<table>';
                    echo '<thead><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Wedding Date</th><th>Details</th></tr></thead>';
                    echo '<tbody>';
                    while($djReq = mysqli_fetch_assoc($dj)){
                        echo '<tr>';
                        echo '<td>'.htmlspecialchars($djReq['id']).'</td>';
                        echo '<td>'.htmlspecialchars($djReq['full_name']).'</td>';
                        echo '<td>'.htmlspecialchars($djReq['email']).'</td>';
                        echo '<td>'.htmlspecialchars($djReq['phone']).'</td>';
                        echo '<td>'.htmlspecialchars($djReq['wedding_date']).'</td>';
                        echo '<td>'.htmlspecialchars($djReq['details']).'</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                }else{
                    echo '<div class="empty-msg"><i class="fas fa-music"></i><p>No DJ requests found</p></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- HOTELS SECTION -->
    <div id="hotels" class="section">
        <div class="header">
            <h1>Hotel Bookings</h1>
        </div>
        <div class="data-table">
            <h2>All Bookings (<?= $totalHotels ?>)</h2>
            <div class="table-container">
                <?php
                $hotels = mysqli_query($conn, "SELECT * FROM bookings ORDER BY id DESC");
                if(mysqli_num_rows($hotels) > 0){
                    echo '<table>';
                    echo '<thead><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Check-in</th><th>Check-out</th><th>Guests</th><th>Special Requests</th></tr></thead>';
                    echo '<tbody>';
                    while($hotel = mysqli_fetch_assoc($hotels)){
                        echo '<tr>';
                        echo '<td>'.htmlspecialchars($hotel['id']).'</td>';
                        echo '<td>'.htmlspecialchars($hotel['full_name']).'</td>';
                        echo '<td>'.htmlspecialchars($hotel['email']).'</td>';
                        echo '<td>'.htmlspecialchars($hotel['check_in']).'</td>';
                        echo '<td>'.htmlspecialchars($hotel['check_out']).'</td>';
                        echo '<td>'.htmlspecialchars($hotel['guests']).'</td>';
                        echo '<td>'.htmlspecialchars($hotel['special_requests']).'</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                }else{
                    echo '<div class="empty-msg"><i class="fas fa-hotel"></i><p>No bookings found</p></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- DECOR SECTION -->
    <div id="decor" class="section">
        <div class="header">
            <h1>Decor Requests</h1>
        </div>
        <div class="data-table">
            <h2>All Decor Requests (<?= $totalDecor ?>)</h2>
            <div class="table-container">
                <?php
                $decor = mysqli_query($conn, "SELECT dr.*, ds.name as decor_name 
                                          FROM decor_requests dr 
                                          LEFT JOIN decor_styles ds ON dr.decor_id = ds.id 
                                          ORDER BY dr.id DESC");

                if(mysqli_num_rows($decor) > 0){
                    echo '<table>';
                    echo '<thead><tr><th>ID</th><th>Customer Name</th><th>Email</th><th>Decor Type</th><th>Event Date</th><th>Total Price</th><th>Notes</th></tr></thead>';
                    echo '<tbody>';
                    while($decorReq = mysqli_fetch_assoc($decor)){
                        echo '<tr>';
                        echo '<td>'.htmlspecialchars($decorReq['id']).'</td>';
                        echo '<td>'.htmlspecialchars($decorReq['customer_name']).'</td>';
                        echo '<td>'.htmlspecialchars($decorReq['email']).'</td>';
                        echo '<td>'.htmlspecialchars($decorReq['decor_name'] ?? 'Not specified').'</td>';
                        echo '<td>'.htmlspecialchars($decorReq['event_date']).'</td>';
                        echo '<td>$'.number_format($decorReq['total_price'], 2).'</td>';
                        echo '<td>'.htmlspecialchars($decorReq['notes']).'</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                }else{
                    echo '<div class="empty-msg"><i class="fas fa-paint-brush"></i><p>No decor requests found</p></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- CAKES SECTION -->
    <div id="cakes" class="section">
        <div class="header">
            <h1>Cake Orders</h1>
        </div>
        <div class="data-table">
            <h2>All Cake Orders (<?= $totalCakes ?>)</h2>
            <div class="table-container">
                <?php
                $cakes = mysqli_query($conn, "SELECT * FROM cake_orders ORDER BY id DESC");
                if(mysqli_num_rows($cakes) > 0){
                    echo '<table>';
                    echo '<thead><tr><th>ID</th><th>Cake Name</th><th>Tiers</th><th>Flavor</th><th>Price</th><th>Order Date</th></tr></thead>';
                    echo '<tbody>';
                    while($cake = mysqli_fetch_assoc($cakes)){
                        echo '<tr>';
                        echo '<td>'.htmlspecialchars($cake['id']).'</td>';
                        echo '<td>'.htmlspecialchars($cake['cake_name']).'</td>';
                        echo '<td>'.htmlspecialchars($cake['tiers']).'</td>';
                        echo '<td>'.htmlspecialchars($cake['flavor']).'</td>';
                        echo '<td>'.htmlspecialchars($cake['price']).'</td>';
                        echo '<td>'.htmlspecialchars($cake['created_at']).'</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                }else{
                    echo '<div class="empty-msg"><i class="fas fa-cake"></i><p>No cake orders found</p></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- MESSAGES SECTION -->
    <div id="messages" class="section">
        <div class="header">
            <h1>Customer Messages</h1>
        </div>
        <div class="data-table">
            <h2>All Messages (<?= $totalMsgs ?>)</h2>
            <div class="table-container">
                <?php
                $messages = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY id DESC");
                if(mysqli_num_rows($messages) > 0){
                    echo '<table>';
                    echo '<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Address</th><th>Service</th><th>Message</th><th>Date</th></tr></thead>';
                    echo '<tbody>';
                    while($msg = mysqli_fetch_assoc($messages)){
                        echo '<tr>';
                        echo '<td>'.htmlspecialchars($msg['id']).'</td>';
                        echo '<td>'.htmlspecialchars($msg['name']).'</td>';
                        echo '<td>'.htmlspecialchars($msg['email']).'</td>';
                        echo '<td>'.htmlspecialchars($msg['address']).'</td>';
                        echo '<td>'.htmlspecialchars($msg['service']).'</td>';
                        echo '<td>'.htmlspecialchars(mb_substr($msg['message'], 0, 50)).'...</td>';
                        echo '<td>'.htmlspecialchars($msg['created_at']).'</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                }else{
                    echo '<div class="empty-msg"><i class="fas fa-envelope"></i><p>No messages found</p></div>';
                }
                ?>
            </div>
        </div>
    </div>

</div>

<script>
    // Chart with gradient
    const ctx = document.getElementById('activityChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(201, 167, 138, 0.4)');
    gradient.addColorStop(1, 'rgba(201, 167, 138, 0.05)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Users', 'DJ', 'Hotels', 'Decor', 'Cakes', 'Messages'],
            datasets: [{
                data: [
                    <?= $totalUsers ?>,
                    <?= $totalDJ ?>,
                    <?= $totalHotels ?>,
                    <?= $totalDecor ?>,
                    <?= $totalCakes ?>,
                    <?= $totalMsgs ?>
                ],
                borderColor: '#c9a78a',
                backgroundColor: gradient,
                tension: 0.45,
                fill: true,
                pointRadius: 7,
                pointBackgroundColor: '#c9a78a',
                pointBorderColor: '#fff',
                pointBorderWidth: 3,
                pointHoverRadius: 9,
                pointHoverBackgroundColor: '#b39475',
                pointHoverBorderWidth: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(93, 78, 66, 0.95)',
                    titleColor: '#e8d6c4',
                    bodyColor: '#ffffff',
                    padding: 15,
                    borderColor: '#c9a78a',
                    borderWidth: 2,
                    displayColors: false,
                    titleFont: {
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 16
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(201, 167, 138, 0.1)',
                        lineWidth: 1
                    },
                    ticks: {
                        color: '#8f8176',
                        font: {
                            size: 12
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#8f8176',
                        font: {
                            size: 13
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });

    // Show Section Function
    function showSection(sectionId, element) {
        // Hide all sections
        document.querySelectorAll('.section').forEach(sec => {
            sec.classList.remove('active');
        });

        // Remove active from all links
        document.querySelectorAll('.sidebar a').forEach(link => {
            link.classList.remove('active');
        });

        // Show selected section
        document.getElementById(sectionId).classList.add('active');

        // Add active to clicked link
        element.classList.add('active');
    }
</script>

</body>
</html>