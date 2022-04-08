<?php

namespace ERoseway\Exception;


class Forbidden extends APIException
{

    public $doc_str =
        'The request is not not allowed, most likely the HTTP method used ' .
        'to call the API endpoint is incorrect or the API key (via its ' .
        'associated clinic) does not have permission to call the endpoint ' .
        'and/or perform the action.';

}
