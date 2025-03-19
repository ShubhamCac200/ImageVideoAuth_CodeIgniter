<?= $this->include('templates/navbar') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - shubham_project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }
        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            border: 3px solid #007BFF;
        }
        .profile img:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>


<div class="container">
    <h1>Welcome, <?= $name ?></h1>

    <div class="profile">
        
        <a href="/profile">
            <img src="/uploads/<?= $profile_picture ?>" alt="Profile Picture">
        </a>
        <p>Click on your profile picture to update details.</p>
    </div>
</div>

</body>
</html>
