<?php

// INDEX

?>

<table>
    <thead>
    <tr>
        <th>Index</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?php echo $contact['index']; ?></td>
            <td><?php echo $contact['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>