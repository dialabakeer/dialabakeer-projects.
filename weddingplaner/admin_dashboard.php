<?php
session_start();
require_once "dbconnect.php";

/* ===== COUNTS ===== */
$bookings = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM bookings"))[0];
$decor    = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM decor_requests"))[0];
$djs      = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM dj_requests"))[0];
$cakes    = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM cake_orders"))[0];
$messages = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM contact_messages"))[0];

/* ===== LATEST REQUESTS ===== */
$latest = mysqli_query($conn,"
    SELECT full_name, email, created_at, 'Decor' AS type FROM decor_requests
    UNION
    SELECT full_name, email, created_at, 'DJ' FROM dj_requests
    UNION
    SELECT cake AS full_name, '' AS email, created_at, 'Cake' FROM cake_orders
    ORDER BY created_at DESC
    LIMIT 10
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body{
            margin:0;
            font-family:Poppins;
            background:#f5f0e9;
        }
        .sidebar{
            width:250px;
            height:100vh;
            background:#fff;
            position:fixed;
            left:0;top:0;
            padding:30px 20px;
            box-shadow:4px 0 20px rgba(0,0,0,.08);
        }
        .sidebar h2{
            text-align:center;
            color:#c9a78a;
            margin-bottom:40px;
        }
        .sidebar a{
            display:block;
            padding:12px 15px;
            margin-bottom:10px;
            color:#555;
            text-decoration:none;
            border-radius:10px;
        }
        .sidebar a:hover{
            background:#c9a78a;
            color:white;
        }
        .main{
            margin-left:270px;
            padding:40px;
        }
        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
            gap:25px;
        }
        .card{
            background:white;
            padding:30px;
            border-radius:20px;
            text-align:center;
            box-shadow:0 15px 40px rgba(0,0,0,.1);
        }
        .card i{
            font-size:36px;
            color:#c9a78a;
        }
        .card h3{
            font-size:32px;
            margin:10px 0;
        }
        table{
            width:100%;
            background:white;
            border-radius:15px;
            margin-top:50px;
            overflow:hidden;
        }
        th,td{
            padding:15px;
            text-align:left;
        }
        th{
            background:#c9a78a;
            color:white;
        }
        tr:nth-child(even){
            background:#f9f6f2;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="#"><i class="fa fa-chart-line"></i> Dashboard</a>
    <a href="#"><i class="fa fa-calendar"></i> Bookings</a>
    <a href="#"><i class="fa fa-palette"></i> Decor</a>
    <a href="#"><i class="fa fa-music"></i> DJs</a>
    <a href="#"><i class="fa fa-cake"></i> Cakes</a>
    <a href="#"><i class="fa fa-envelope"></i> Messages</a>
</div>

<div class="main">
    <h1>Welcome Admin 👑</h1>

    <div class="cards">
        <div class="card"><i class="fa fa-calendar"></i><h3><?= $bookings ?></h3><p>Bookings</p></div>
        <div class="card"><i class="fa fa-palette"></i><h3><?= $decor ?></h3><p>Decor</p></div>
        <div class="card"><i class="fa fa-music"></i><h3><?= $djs ?></h3><p>DJs</p></div>
        <div class="card"><i class="fa fa-cake"></i><h3><?= $cakes ?></h3><p>Cakes</p></div>
        <div class="card"><i class="fa fa-envelope"></i><h3><?= $messages ?></h3><p>Messages</p></div>
    </div>

    <h2 style="margin-top:60px;">Latest Requests</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Date</th>
        </tr>
        <?php while($row=mysqli_fetch_assoc($latest)): ?>
            <tr>
                <td><?= htmlspecialchars($row['full_name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= $row['type'] ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>

</body>
</html>
