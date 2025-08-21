<?php
include '../config/config.php';
include 'view_students.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Securely fetch ID

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Delete the record
        $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        // Reorder the remaining IDs
        $conn->query("SET @count = 0");
        $conn->query("UPDATE students SET id = @count := @count + 1");

        // Reset AUTO_INCREMENT to the next available ID
        $conn->query("ALTER TABLE students AUTO_INCREMENT = 1");

        // Commit transaction
        $conn->commit();

        echo "<script>alert('Record deleted successfully!'); window.location.href='view_students.php';</script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request!";
}
?>
