<?= $this->include('templates/navbar') ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - shubham_project</title>
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
        h1 {
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }
        input, select {
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
        .results-container {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        .result-item {
            background: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .result-item img, .result-item video {
            width: 250px;
            border-radius: 8px;
        }
        .error-message {
            color: red;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Search Images/Videos</h1>

    <form action="/search/fetch" method="post">
        <input type="text" name="query" placeholder="Search..." value="<?= esc($query ?? '') ?>" required>
        <select name="type">
            <option value="photo" <?= isset($type) && $type === 'photo' ? 'selected' : '' ?>>Image</option>
            <option value="video" <?= isset($type) && $type === 'video' ? 'selected' : '' ?>>Video</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <?php if (isset($results)) : ?> 
        <?php if (!empty($results)) : ?>
            <h2>Results for "<?= esc($query) ?>"</h2>
            <div class="results-container">
                <?php foreach ($results as $item) : ?>
                    <div class="result-item">
                        <?php if ($type === 'video' && isset($item['videos']['medium']['url'])) : ?>
                            <video controls>
                                <source src="<?= esc($item['videos']['medium']['url']) ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php elseif ($type === 'photo' && isset($item['previewURL'])) : ?>
                            <img src="<?= esc($item['previewURL']) ?>" alt="Search Result">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="error-message">No results found.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>

</body>
</html>
