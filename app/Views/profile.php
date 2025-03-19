<?= $this->include('templates/navbar') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - shubham_project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 500px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1, h2 {
            color: #333;
        }
        .success-message {
            color: green;
            margin-bottom: 10px;
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 3px solid #007BFF;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }
        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Profile</h1>

    <?php if (session()->getFlashdata('success')) : ?>
        <p class="success-message"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>


    <img src="/uploads/<?= $user['profile_picture'] ?>" alt="Profile Picture" class="profile-img">

    <form action="/profile/update" method="post" enctype="multipart/form-data">
        <input type="text" name="name" value="<?= $user['name'] ?>" required>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>
        <input type="file" name="profile_picture">
        <button type="submit">Update Profile</button>
    </form>

    <h2>Change Password</h2>
    
 
    <form action="/profile/change-password" method="post">
        <input type="password" name="current_password" placeholder="Current Password" required>
        <input type="password" name="new_password" placeholder="New Password" required>
        <button type="submit">Change Password</button>
    </form>
</div>

</body>
</html>
