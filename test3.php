<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editable Table with AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form action="code.php" method="POST">
        <div class="container mt-5">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>CRITERIA</th>
                        <th colspan="2">WEIGHT</th>
                        <th colspan="3">SUMMARY OF POINTS</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>%</th>
                        <th>Criteria Credit Points</th>
                        <th>SR</th>
                        <th>DRC</th>
                        <th>BERTC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td contenteditable="true" onBlur="saveToDatabase(this, 'educational_attainment', 1)">
                            <?php echo fetchValueFromDB('educational_attainment', 1); ?>
                        </td>
                        <td contenteditable="true" onBlur="saveToDatabase(this, 'weight_40', 1)">
                            <?php echo fetchValueFromDB('weight_40', 1); ?>
                        </td>
                        <td contenteditable="true" onBlur="saveToDatabase(this, 'credit_points', 1)">
                            <?php echo fetchValueFromDB('credit_points', 1); ?>
                        </td>
                        <td><input type="text" class="form-control" name="educ_attain_sr" onBlur="saveToDatabase(this, 'educ_attain_sr', 1)" value="<?php echo fetchValueFromDB('educ_attain_sr', 1); ?>"></td>
                        <td><input type="text" class="form-control" name="educ_attain_drc" onBlur="saveToDatabase(this, 'educ_attain_drc', 1)" value="<?php echo fetchValueFromDB('educ_attain_drc', 1); ?>"></td>
                        <td><input type="text" class="form-control" name="educ_attain_bertc" onBlur="saveToDatabase(this, 'educ_attain_bertc', 1)" value="<?php echo fetchValueFromDB('educ_attain_bertc', 1); ?>"></td>
                    </tr>
                    <!-- Additional rows can be added similarly -->
                </tbody>
            </table>
        </div>
    </form>

    <script>
        // AJAX function to save data to the database
        function saveToDatabase(editableObj, column, id) {
            $(editableObj).css("background", "#FFF url('loader.gif') no-repeat right");
            $.ajax({
                url: "code.php",
                type: "POST",
                data: 'column=' + column + '&value=' + editableObj.innerHTML + '&id=' + id,
                success: function(data) {
                    $(editableObj).css("background", "#FDFDFD");
                }
            });
        }
    </script>
</body>
</html>

<?php
// Database connection
$con = new mysqli("localhost", "username", "password", "database");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Function to fetch values from the database (used to populate the input fields)
function fetchValueFromDB($column, $id) {
    global $con;
    $sql = "SELECT $column FROM basic_ed_score WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row[$column];
}

// Handle the AJAX request to update the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['column']) && isset($_POST['value']) && isset($_POST['id'])) {
        $column = $_POST['column'];
        $value = $_POST['value'];
        $id = intval($_POST['id']);

        // Update the corresponding field in the database
        $sql = "UPDATE rankings SET $column = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("si", $value, $id);

        if ($stmt->execute()) {
            echo "Data updated successfully.";
        } else {
            echo "Error updating data: " . $con->error;
        }
        $stmt->close();
    }
}

$con->close();
?>

