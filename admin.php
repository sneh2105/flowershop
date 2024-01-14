<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('flower.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            color: #333; /* Set the default text color */
        }

        .container {
            margin-top: 30px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-image: url('flower.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .nav-pills {
            background-color: #00997a; /* Primary Blue Color */
            border-radius: 8px;
            padding: 10px;
            margin-top: 20px;
        }

        .nav-item {
            margin-right: 10px;
        }

        .nav-link {
            cursor: pointer;
            color: #fff;
            font-weight: bold;
            background-color: #2980b9; /* Darker Blue Color */
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: #1c4966; /* Darker Shade of Blue */
            text-decoration: none;
        }

        .dashboard-container {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.95); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Additional Styling for Content */
        .form-container,
        .user-table {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2,
        .user-table h4 {
            color: #008b8b;
        }

        table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #008b8b;
            color: #fff;
        }

        td {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center mb-4">Admin Dashboard</h2>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" id="itemUploadTab" onclick="showTab('itemUpload')">Item Upload</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="userManagementTab" onclick="showTab('userManagement')">User Management</a>
            </li>
        </ul>

        <div class="dashboard-container">
            <div id="itemUploadTabContent">
                <!-- Content for Item Upload -->
                <?php include('item_upload.php'); ?>
            </div>
            <div id="userManagementTabContent" style="display: none;">
                <!-- Content for User Management -->
                <?php include('user_management.php'); ?>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            document.getElementById('itemUploadTabContent').style.display = (tabName === 'itemUpload') ? 'block' : 'none';
            document.getElementById('userManagementTabContent').style.display = (tabName === 'userManagement') ? 'block' : 'none';

            // Update active tab
            document.getElementById('itemUploadTab').classList.remove('active');
            document.getElementById('userManagementTab').classList.remove('active');

            if (tabName === 'itemUpload') {
                document.getElementById('itemUploadTab').classList.add('active');
            } else if (tabName === 'userManagement') {
                document.getElementById('userManagementTab').classList.add('active');
            }
        }
    </script>

    <!-- Bootstrap JS and jQuery (optional, for certain Bootstrap features) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
