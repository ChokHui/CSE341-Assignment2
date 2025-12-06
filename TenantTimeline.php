<?php
  include ('dbconfig.php');
  // include ('TenantUpdatedStatus.php');

  // Retrieve the reportNo from the URL parameter
  $reportNo = $_GET['reportNo'];

  // Retrieve the report number from the database based on the reportNo
  $query = "SELECT reportNo FROM feedback WHERE reportNo = '$reportNo'";
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://api.fontshare.com/v2/css?f[]=general-sans@500,600,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./styles/modern-normalize.css">
  <link rel="stylesheet" type="text/css" href="./styles/style.css">
  <link rel="stylesheet" type="text/css" href="./styles/TenantTimelineComponents/timeline.css">
  <link rel="stylesheet" type="text/css" href="./styles/utils.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Tenant Feedback Form - Tenant Timeline</title>
</head>
<body>
  <header>
    <?php
      require_once ('TenantHeader.php');
    ?>
  </header>
  <main>
    <section class="timeline container">
      <p class="timeline__subtitle">Form Number: <?php echo $row['reportNo']; ?></p>
      <ul id="timeline">
        <script>
          // JavaScript code to fetch and display the feedback timeline
          const urlParams = new URLSearchParams(window.location.search);
          const reportNo = urlParams.get('reportNo');
    
          fetch('fetchTimelineData.php?reportNo=' + reportNo)
            .then(response => response.json())
            .then(data => {
              const timeline = document.getElementById('timeline');
        
              // Iterate over the data and create timeline items
              data.forEach(item => {
                const timelineItem = document.createElement('li');
                timelineItem.className = 'timeline-item';
        
                // Start of Date Container
                const date = document.createElement('div');
                date.className = 'timeline-item__date';
                date.textContent = item.date;

                const dateContainer = document.createElement('div');
                dateContainer.className = 'timeline-item__date-container';
                dateContainer.appendChild(date);
                // End of Date Container
        
                // Start of Info Container
                const status = document.createElement('span');
                status.className = 'timeline-item__status timeline-item__status-red';
                status.textContent = item.status;

                // Check if the status text is "completed" and update the class accordingly
                if (item.status === 'Completed') {
                  status.classList.remove('timeline-item__status-red');
                  status.classList.add('timeline-item__status-green');
                }

                const lineBreak = document.createElement('br');

                const commentBy = document.createElement('span');
                commentBy.className = 'timeline-item__commentBy';
                commentBy.textContent = item.commentBy;

                const lineBreak2 = document.createElement('br');

                const details = document.createElement('span');
                details.className = 'timeline-item__details';
                details.textContent = item.details;

                const lineBreak3 = document.createElement('br');

                const lineBreak4 = document.createElement('br');
        
                const infoContainer = document.createElement('div');
                infoContainer.className = 'timeline-item__info-container';
                infoContainer.appendChild(status);
                infoContainer.appendChild(lineBreak);
                infoContainer.appendChild(commentBy);
                infoContainer.appendChild(lineBreak2);
                infoContainer.appendChild(details);
                infoContainer.appendChild(lineBreak3);
                infoContainer.appendChild(lineBreak4);
                // End of Info Container

                // Start of Progression Container
                const roundDot = document.createElement('div');
                roundDot.className = 'timeline-item__round-dot';
                
                const verticalLine = document.createElement('div');
                verticalLine.className = 'timeline-item__vertical-line';

                const progressionContainer = document.createElement('div');
                progressionContainer.className = 'timeline-item__progression-container';
                progressionContainer.appendChild(verticalLine);
                progressionContainer.appendChild(roundDot);
                // End of Progression Container

                timelineItem.appendChild(dateContainer);
                timelineItem.appendChild(progressionContainer);
                timelineItem.appendChild(infoContainer);
        
                timeline.appendChild(timelineItem);
              });
            })
            .catch(error => console.error(error));
        </script>
      </ul>
    </section>
  </main>
</body>
</html>