<?php

namespace ERoseway\Exception;


class InvalidRequest extends APIException
{

    public $doc_str =
        'Not a valid request, most likely a missing or invalid parameter.';

}
