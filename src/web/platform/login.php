<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../db/example_database.php';

use \Firebase\JWT\JWT;
$message_jwt = [
    "iss" => 'http://localhost:3000',
    "aud" => ['d42df408-70f5-4b60-8274-6c98d3b9468d'],
    "sub" => '0ae836b9-7fc9-4060-006f-27b2066ac545',
    "exp" => time() + 60000000,
    "iat" => time(),
    "nonce" => $_REQUEST['nonce'],
    "https://purl.imsglobal.org/spec/lti/claim/deployment_id" => '8c49a5fa-f955-405e-865f-3d7e959e809f',
    "https://purl.imsglobal.org/spec/lti/claim/message_type" => "LtiResourceLinkRequest",
    "https://purl.imsglobal.org/spec/lti/claim/version" => "1.3.0",
    "https://purl.imsglobal.org/spec/lti/claim/target_link_uri" => "http://localhost:5860/api/lti-advantage-launch/9ntTTksxydg",
    "https://purl.imsglobal.org/spec/lti/claim/roles" => [
        "http://purl.imsglobal.org/vocab/lis/v2/membership#Learner"
    ],
    "https://purl.imsglobal.org/spec/lti/claim/resource_link" => [
        "id" => "100",
    ],
    "https://purl.imsglobal.org/spec/lti-nrps/claim/namesroleservice" => [
        "context_memberships_url" => "http://localhost:9001/platform/services/nrps",
        "service_versions" => ["2.0"]
    ],
    "https://purl.imsglobal.org/spec/lti-ags/claim/endpoint" => [
        "scope" => [
          "https://purl.imsglobal.org/spec/lti-ags/scope/lineitem",
          "https://purl.imsglobal.org/spec/lti-ags/scope/result.readonly",
          "https://purl.imsglobal.org/spec/lti-ags/scope/score"
        ],
        "lineitems" => "http://localhost:9001/platform/services/ags/lineitems.php",
    ],
    "https://purl.imsglobal.org/spec/lti/claim/context" => [
        "id" => "4",
        "title" => "CPS 435 Learning Analytics",
    ]
];

$database = new Example_Database();
$jwt = JWT::encode(
    $message_jwt,
    file_get_contents(__DIR__ . '/../../db/platform.key'),
    'RS256',
    'fcec4f14-28a5-4697-87c3-e9ac361dada5'
);
?>

<form id="auto_submit" action="<?= $_REQUEST['redirect_uri']; ?>" method="POST">
    <input type="hidden" name="id_token" value="<?= $jwt ?>" />
    <input type="hidden" name="state" value="<?= $_REQUEST['state']; ?>" />
</form>
<script>
    document.getElementById('auto_submit').submit();
</script>
