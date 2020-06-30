<?php
/**
 * @var $emails
 */

echo '<ul>';
foreach ($emails as $email) {
    $_email = $email['email'];
    echo "<li>email: $_email";
        if (isset($email['phones'])) {
            echo '<ul>';
            foreach ($email['phones'] as $phone) {
                echo "<li>phone: $phone</li>";
            }
            echo '</ul>';
        }
    echo '</li>';
}
echo '</ul>';
