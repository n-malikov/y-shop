<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    // для единой авторизации на обоих доменах
    // использование $params['cookieValidationKey']
    'cookieValidationKey' => '',
    'domain' => '.example.com',
    // для URL менеджера
    'frontendHostInfo' => 'https://example.com',
    'backendHostInfo' => 'https://backend.example.com',
];
