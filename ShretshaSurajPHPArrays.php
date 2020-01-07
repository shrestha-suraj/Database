<html lang="en">
<head>
<title>Suraj Table Demp</title>
</head>
<body>
<?php
    $CScourses = ['csci111', 'csci112', 'csci211', 'csci223', 'csci300', 'csci311', 'csci387','csci423', 'csci433', 'csci450', 'csci487'];
    $csci111 = ["code" => "CSCI 111", "title" => "Computer Science I", "semester" => "Fall & Spring"];
    $csci112 = ["code" => "CSCI 112", "title" => "Computer Science II", "semester" => "Fall & Spring"];
    $csci211 = ["code" => "CSCI 211", "title" => "Computer Science III", "semester" => "Fall & Spring"];
    $csci223 = ["code" => "CSCI 223", "title" => "Computer Organization & Assembly", "semester" => "Fall & Spring"];
    $csci300 = ["code" => "CSCI 300", "title" => "Social Responsiblity in Computer Science", "semester" => "Fall"];
    $csci311 = ["code" => "CSCI 311", "title" => "Models of Computation", "semester" => "Fall"];
    $csci387 = ["code" => "CSCI 387", "title" => "Software Design and Developement", "semester" => "Spring"];
    $csci423 = ["code" => "CSCI 423", "title" => "Introduction to Operating System", "semester" => "Fall"];
    $csci433 = ["code" => "CSCI 433", "title" => "Algorithm and Dta structure", "semester" => "Spring"];
    $csci450 = ["code" => "CSCI 450", "title" => "Organization of Programming Languages", "semester" => "Fall"];
    $csci487 = ["code" => "CSCI 487", "title" => "Senior Project", "semester" => "Fall & Spring"];
?>
<table>
    <tbody>
        <tr><td>Code</td><td>Title</td><td>Semester Offered</td></tr>
<?php
    foreach($CScourses as $cc) {
    echo " <tr><td>". ${$cc}['code']."</td><td>". ${$cc}['title']."</td><td>". ${$cc}['semester']." </td></tr>";
}
?>
    </tbody>
</table>
</body>
</html>
