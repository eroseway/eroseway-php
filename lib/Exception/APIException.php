<?php

namespace ERoseway\Exception;


/**
 * Base API exception.
 */
class APIException extends \Exception
{

    public $doc_str = 'An error occurred while processing an API the request.';

    // The status code associated with the error
    public $status_code;

    // A hint providing additional information as to why this error occurred.
    public $hint;

    // A dictionary of errors relating to the arguments (parameters) sent
    // to the API endpoint (e.g `{'arg_name': ['error1', ...]}`).
    public $arg_errors;

    public function __construct($status_code, $hint=NULL, $arg_errors=NULL) {
        parent::__construct();

        $this->status_code = $status_code;
        $this->hint = $hint;
        $this->arg_errors = $arg_errors;
    }

    public function __toString() {

        $parts = ['[' . strval($this->status_code) . '] ' . $this->doc_str];

        if ($this->hint) {
            array_push($parts, 'Hint: ' . $this->hint);
        }

        if ($this->arg_errors) {
            array_push(
                $parts,
                'Argument errors:' . PHP_EOL . '- ' . join(
                    PHP_EOL . '- ',
                    array_map(
                        function ($key, $value) {
                            return $key . ': ' . join(' ', $value);
                        },
                        array_keys($this->arg_errors),
                        $this->arg_errors
                    )
                )
            );
        }

        return join(PHP_EOL . '---' . PHP_EOL, $parts);
    }

    public static function get_class_by_status_code(
        $error_type,
        $default=NULL
    ) {
        $class_map = [
            400 => InvalidRequest::class,
            401 => Unauthorized::class,
            403 => Forbidden::class,
            405 => Forbidden::class,
            404 => NotFound::class,
            429 => RateLimitExceeded::class
        ];

        if (array_key_exists($error_type, $class_map)) {
            return $class_map[$error_type];
        }

        return $default ? $default : APIException::class;
    }
}
