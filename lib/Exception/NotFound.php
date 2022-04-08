<?php

namespace ERoseway\Exception;


class NotFound extends APIException
{

    public $doc_str =
        'The endpoint you are calling or the document you referenced ' .
        'doesn\'t exist.';

}
