<?php
for ($i = 1; $i <= 100; $i++) {
    echo "$i <br>";
}
for ($i = 0; $i <= 100; $i += 2) {
    echo "$i <br>";
}
for ($i = 1; $i <= 100; $i++) {
    echo "$i <br>";
    if ($i == 60) {
        break;
    }
}
