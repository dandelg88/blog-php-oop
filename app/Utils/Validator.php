<?php

namespace App\Utils;

/**
 * Class Validator
 * @package App\Utils
 */
class Validator
{
    /**
     * @var array
     */
    private $raw_data = null;

    /**
     * @var array
     */
    private $validated_data = null;

    /**
     * @var array
     */
    public $errors = null;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->raw_data = $data;
    }

    /**
     * @param array $rules
     * @return null|array
     */
    public function validate(array $rules): ?array
    {
        foreach ($rules as $rule_name => $rules_array) {
            if (array_key_exists($rule_name, $this->raw_data)) {
                foreach ($rules_array as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($rule_name, $this->raw_data[$rule_name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($rule_name, $this->raw_data[$rule_name], $rule);
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        return $this->getErrors();
    }

    /**
     * @param string $name
     * @param string $value
     * @return void
     */
    private function required(string $name, string $value): void
    {
        $value = trim($value);

        if (empty($value)) {
            $this->errors[$name][] = "El input $name es requerido.";
        }
    }

    /**
     * @param string $name
     * @param string $value
     * @param string $rule
     * @return void
     */
    private function min(string $name, string $value, string $rule): void
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $min = (int) $matches[0][0];

        if (strlen($value) < $min) {
            $this->errors[$name][] = "El input $name debe contener al menos $min caracteres.";
        }
    }

    /**
     * @return null|array
     */
    private function getErrors(): ?array
    {
        return $this->errors;
    }
}
