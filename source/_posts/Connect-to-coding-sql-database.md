---
title: Connect to coding sql database
urlname: index0
tags:
  - code
  - coding
categories:
  - daybreak
date: 2018-04-16 21:33:39
---
> Just a backup for coding connect to mysql datebase for myself.
<!-- more -->

index.php

```
<!DOCTYPE html>
<html>
    <body>

<?php
$mysqli = new mysqli($_ENV['MYSQL_HOST'] . ":" . $_ENV['MYSQL_PORT'],$_ENV['MYSQL_USERNAME'],$_ENV['MYSQL_PASSWORD'],$_ENV['MYSQL_DBNAME']);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* prepare statement */
if ($stmt = $mysqli->prepare("select id,title from dbtest")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($col1, $col2);

    /* fetch values */
    while ($stmt->fetch()) {
        printf("%s %s\n", $col1, $col2);
    }

    /* close statement */
    $stmt->close();
}
/* close connection */
$mysqli->close();

?>

    </body>
</html>
```


