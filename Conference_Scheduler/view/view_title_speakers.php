<!DOCTYPE html>
<!-- SQL Query for title info
SELECT CONCAT(speakers.fname," ", speakers.lname), speakers.email, title.title_name
FROM speakers JOIN title_speakers on speakers.speakerID = title_speakers.speakerID
			  JOIN title on title_speakers.titleID
			  JOIN conference_speakers on title_speakers.titleID = conference_speakers.titleID
WHERE conference_titleID = :conference_titleID
ORDER BY title.title_name
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
