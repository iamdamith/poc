<?php
return [
    'clientId'          => env('AZURE_CLIENT_ID', getenv('AZURE_CLIENT_ID')),
    'clientSecret'      => env('AZURE_CLIENT_SECRET', getenv('AZURE_CLIENT_SECRET')),
    'redirectUri'       => env('AZURE_REDIRECT_URI', getenv('AZURE_REDIRECT_URI')),
    'tenant'            => env('AZURE_TENANT_ID', getenv('AZURE_TENANT_ID')),
];