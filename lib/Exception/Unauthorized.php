<?php

namespace ERoseway\Exception;


class Unauthorized extends APIException
{

    public $doc_str = 'The API credentials provided are not valid.';

}
