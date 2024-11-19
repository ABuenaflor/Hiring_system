<?php 
// Check if the form is submitted and files are uploaded
if (isset($_FILES['certificates']) && !empty($_FILES['certificates']['name'][0])) {
    $filePaths = [];
    $uploadDir = 'uploads/';  // Set the directory to store files
    
    // Loop through each uploaded file
    foreach ($_FILES['certificates']['name'] as $key => $fileName) {
        $fileTmpName = $_FILES['certificates']['tmp_name'][$key];
        $fileSize = $_FILES['certificates']['size'][$key];
        $fileError = $_FILES['certificates']['error'][$key];
        
        // Validate the file (check if it's a PDF and no errors)
        if ($fileError === 0) {
            // Get file extension
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Check if the file is a PDF
            if ($fileExt === 'pdf') {
                // Generate a unique file name
                $uniqueFileName = uniqid('', true) . '.' . $fileExt;
                $filePath = $uploadDir . $uniqueFileName;
                
                // Move the uploaded file to the desired directory
                if (move_uploaded_file($fileTmpName, $filePath)) {
                    // Add the file path to the array
                    $filePaths[] = $filePath;
                } else {
                    echo "Error uploading file: $fileName";
                }
            } else {
                echo "Only PDF files are allowed!";
            }
        } else {
            echo "Error with file: $fileName";
        }
    }

    // After all files are uploaded, store the file paths in the database
    if (!empty($filePaths)) {
        // Convert the file paths array to a JSON string
        $filePathsJson = json_encode($filePaths);

        // SQL to insert the file paths into the credentials table
        $userId = 1;  // Example user ID, replace it with the actual one
        $query = "INSERT INTO credentials (user_id, certificates) VALUES ('$userId', '$filePathsJson')";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            echo "Files uploaded and stored successfully!";
        } else {
            echo "Error storing file paths in the database: " . mysqli_error($conn);
        }
    }
}


?>