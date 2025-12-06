<?php
include('dbconfig.php');

$reportNo = $_GET['reportNo'];

$queryFeedback = "SELECT 'feedback' AS source, reportNo, 'Form Created' AS status, 'Tenant' AS commentBy, 'Details: Refer to form' AS details, FROM_UNIXTIME(UNIX_TIMESTAMP(reportNo), '%d %M %Y %H:%i:%s') AS date FROM feedback WHERE reportNo = '$reportNo'
                  UNION ALL
                  SELECT 'updated' AS source, reportNo, status, commentBy, CONCAT('Details: ', details), DATE_FORMAT(date, '%d-%m-%Y %H:%i:%s') AS date FROM updated WHERE reportNo = '$reportNo'
                  ORDER BY 
                  CASE WHEN source = 'feedback' THEN reportNo END ASC,
                  CASE WHEN source IN ('updated') THEN 
                    CONCAT(
                      SUBSTRING(date, 7, 4), -- Year
                      SUBSTRING(date, 4, 4), -- Month
                      SUBSTRING(date, 1, 2), -- Date
                      SUBSTRING(date, 12)    -- Time (HH:mm:ss format)
                    ) 
                  END DESC
                  ";

                  
$result = mysqli_query($connect, $queryFeedback);

$data = array();

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }

  echo json_encode($data);
} else {
  $error = mysqli_error($connect);
  $response = array('error' => $error);
  echo json_encode($response);
}
?>