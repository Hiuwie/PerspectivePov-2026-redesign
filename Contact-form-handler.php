<?php

function enquiry_result($status, $http_status = 200) {
    header('Cache-Control: no-store');
    if (strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false) {
        http_response_code($http_status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['status' => $status]);
    } else {
        // Only known local pages may receive the submission result.
        $home = ($_POST['return_page'] ?? '') === 'home';
        $page = $home ? 'index.html' : 'services.html';
        $anchor = '#contact';
        $redirect_status = $status === 'invalid' ? 'error' : $status;
        $campaign = enquiry_attribution();
        unset($campaign['landing_url']);
        $query = http_build_query(array_merge(['status' => $redirect_status], $campaign), '', '&', PHP_QUERY_RFC3986);
        header('Location: ' . $page . '?' . $query . $anchor, true, 303);
    }
    exit;
}

function enquiry_field($name) {
    return isset($_POST[$name]) && is_string($_POST[$name]) ? trim($_POST[$name]) : '';
}

function enquiry_attribution() {
    $fields = ['landing_url', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'utm_id', 'gclid', 'gbraid', 'wbraid', 'fbclid'];
    $attribution = [];
    foreach ($fields as $key) {
        $value = preg_replace('/[\r\n\x00]/', ' ', enquiry_field($key));
        if ($value !== '') $attribution[$key] = substr($value, 0, $key === 'landing_url' ? 8192 : 512);
    }
    return $attribution;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    exit;
}

if (enquiry_field('company_website') !== '') enquiry_result('invalid', 422);

$name = enquiry_field('name');
$visitor_email = enquiry_field('email');
$message = enquiry_field('message');
$package = enquiry_field('package');
$packages = ['', 'Starter', 'Business', 'Professional', 'Updates & Maintenance'];

if ($name === '' || strlen($name) > 480 || preg_match('/[\r\n]/', $name)
    || !filter_var($visitor_email, FILTER_VALIDATE_EMAIL) || strlen($visitor_email) > 254
    || preg_match('/[\r\n]/', $visitor_email)
    || $message === '' || strlen($message) > 20000
    || !in_array($package, $packages, true)) {
    enquiry_result('invalid', 422);
}

$brand_email = 'design@perspectivepov.co.za';
$subject = 'Perspective POV website enquiry';
$email_body = "Name: $name\nEmail: $visitor_email\n"
    . 'Package: ' . ($package !== '' ? $package : 'Not specified') . "\n\n"
    . "Message:\n$message\n";
$attribution = enquiry_attribution();
if ($attribution) {
    $email_body .= "\nCampaign attribution (visitor-supplied):\n";
    foreach ($attribution as $key => $value) $email_body .= "$key: $value\n";
}
$headers = "From: Perspective POV <$brand_email>\r\n"
    . "Reply-To: $visitor_email\r\n"
    . "MIME-Version: 1.0\r\nContent-Type: text/plain; charset=UTF-8\r\n";

if (mail($brand_email, $subject, $email_body, $headers)) enquiry_result('success');

// Keep visitor details out of web-accessible diagnostic files.
error_log('Perspective POV: website enquiry mail transport failed.');
enquiry_result('error', 500);
