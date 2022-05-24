<?php

use CodingChallenge\Models\Contact;

?>

<form action="?action=store" method="POST">
    <table class="full-width" style="max-width: 500px; margin: 0 auto">

        <tbody>
        <?php foreach ((new Contact())->getFields() as $fieldKey => $field): ?>
            <tr>
                <td><label for="<?php echo $fieldKey; ?>"><?php echo $field['name']; ?></label></td>
                <td>
                    <input value="<script>alert('<?php echo $fieldKey; ?>');</script>" name="<?php echo $fieldKey; ?>" id="<?php echo $fieldKey; ?>" type="text" />
                </td>
            </tr>
        <?php endforeach; ?>

            <tr class="bg-white">
                <td colspan="2">
                    <input class="full-width mt-1" type="submit">
                </td>
            </tr>

        </tbody>

    </table>
</form>
