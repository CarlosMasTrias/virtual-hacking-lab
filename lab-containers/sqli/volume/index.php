<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaked Database of the Most Famous Cybercriminals</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #1a1a1a;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            font-size: 2rem;
            color: #ff6f61;
            margin-bottom: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        input[type="text"] {
            padding: 0.75rem;
            border: 2px solid #ff6f61;
            background-color: #333;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 1rem;
            color: #e0e0e0;
            text-align: center;
            width: 100%;
            max-width: 300px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #ffa07a;
        }

        button {
            background-color: #ff6f61;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ffa07a;
        }

        .results {
            margin-top: 2rem;
            width: 100%;
            max-width: 1000px;
        }

        .results h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #ff6f61;
        }

        .result-item {
            background-color: #333;
            padding: 0.75rem;
            margin-bottom: 0.5rem;
            border-radius: 8px;
            border: 1px solid #444;
        }

        .result-item:last-child {
            margin-bottom: 0;
        }

        .no-results {
            color: #e74c3c;
            font-weight: bold;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <h1>Leaked Database of the Most Famous Cybercriminals</h1>
    <form method="GET">
        <label for="id">Search by ID:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">Search</button>
    </form>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Conexión a la base de datos
        $conn = new mysqli("mysql-db", "root", "rootpass_1234", "webapp");

        // Comprobación de la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Vulnerable SQL Query
        $sql = "SELECT id, username, secondname FROM users WHERE id = '$id'";
        echo "<p><em>Query: $sql</em></p>";
        $result = $conn->query($sql);

        echo '<div class="results">';
        if ($result->num_rows > 0) {
            echo "<h2>Results:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='result-item'>";
                echo "ID: " . $row["id"] . " - Username: " . $row["username"] . " - Second Name: " . $row["secondname"];
                echo "</div>";
            }
        } else {
            echo "<p class='no-results'>No results found</p>";
        }
        echo '</div>';

        $conn->close();
    }
    ?>
</body>
</html>
