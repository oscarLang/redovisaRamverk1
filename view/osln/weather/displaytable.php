<?php



?>
<table>
    <thead>
        <tr>
            <th>Dag</th>
            <th>Summering</th>
            <th>Högsta temp °C</th>
            <th>Vind m/s</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($for["daily"]["data"] as $key => $value): ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$value["summary"]?></td>
                <td><?=$value["temperatureHigh"]?></td>
                <td><?=$value["windSpeed"]?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
