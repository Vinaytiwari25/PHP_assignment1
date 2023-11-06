<!DOCTYPE html>
<html>
<head>
    <title>List of Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #007bff;
        }
        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #e0e0e0;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #e6e6e6;
        }
        th, td:hover {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .hidden-row {
            display: none;
        }
        .show-details {
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>List of Users</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=user_information_db", "root", "");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Error: " . $e->getMessage());
                }

                
                $stmt = $pdo->query("SELECT name, email, gender, city FROM user_information");

                
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr class='show-details'>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                    echo "</tr>";
                    echo "<tr class='hidden-row'>";
                    echo "<td colspan='4'>";
                    
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>
