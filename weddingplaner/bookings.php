<?php
require_once "dbconnect.php";

$sql = "
SELECT
    dj_requests.id,
    dj_requests.full_name,
    dj_requests.email,
    dj_requests.phone,
    dj_requests.wedding_date,
    dj_requests.details,
    dj_requests.created_at,
    djs.name AS dj_name
FROM dj_requests
JOIN djs ON dj_requests.dj_id = djs.id
ORDER BY dj_requests.created_at DESC
";

$result = mysqli_query($conn, $sql);
?>
