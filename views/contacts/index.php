<?php

use CodingChallenge\Models\Contact;

?>

<?php if(count($contacts) === 0): ?>
    <h2 style="text-align: center">You have no contacts in your address book!</h2>
<?php else: ?>

    <table class="full-width">

        <thead>
        <tr>
            <?php foreach ((new Contact())->getFields() as $fieldKey => $field): ?>
                <th>
                    <?php if($sortBy === $fieldKey): ?>
                        <a class="sort <?php echo ($sortDirection === 'desc') ? 'desc' : 'asc'; ?>"
                           href="?action=index&sortBy=<?php echo $fieldKey; ?>&sortDirection=<?php echo ($sortDirection === 'desc') ? 'asc' : 'desc'; ?>">
                            <?php echo $field['name']; ?>
                        </a>
                    <?php elseif($sortBy !== $fieldKey): ?>
                        <a class="sort" href="?action=index&sortBy=<?php echo $fieldKey; ?>"><?php echo $field['name']; ?></a>
                    <?php endif; ?>
                </th>
            <?php endforeach; ?>
            <th></th>
            <th></th>
        </tr>
        </thead>

        <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <?php foreach ($contact->getFields() as $field): ?>
                        <td title="<?php echo $field['value']; ?>"><?php echo limitString($field['value']); ?></td>
                    <?php endforeach; ?>
                    <th><a href="?action=show&id=<?php echo $contact->getIndex(); ?>">Show</a></th>
                    <th><a href="?action=edit&id=<?php echo $contact->getIndex(); ?>">Edit</a></th>
                    <th><a href="?action=delete&id=<?php echo $contact->getIndex(); ?>">Delete</a></th>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

<?php endif; ?>