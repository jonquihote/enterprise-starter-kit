<?php

namespace Enterprise\Base\Enums;

enum UserCredentialTypesEnum: string
{
    case USERNAME = 'username';
    case EMAIL = 'email';
    case PHONE = 'phone';
}
