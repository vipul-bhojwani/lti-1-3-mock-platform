<?php

require_once __DIR__ . '/../../vendor/autoload.php';

?>

<form id="auto_submit" action="http://localhost:5860/api/oidc-login/9ntTTksxydg" method="POST">
    <input type="hidden" name="iss" value="http://localhost:3000" />
    <input type="hidden" name="target_link_uri" value="http://localhost:5860/api/lti-advantage-launch/9ntTTksxydg" />
    <input type="hidden" name="login_hint" value="12345" />
    <input type="hidden" name="lti_message_hint" value="12345" />
</form>
<script>
    document.getElementById('auto_submit').submit();
</script>
