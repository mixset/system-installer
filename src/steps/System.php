<?php

class System extends Step
{
    /**
     * Fields to save
     *
     * @var array
    */
    private $fields = [
        'language',
        'debug_mode',
        'encoding',
    ];

    public function save(array $data)
    {
        $this->config->createArray('system');

        $data['debug_mode'] = $this->getDebugMode($data['debug_mode']);
        $data['encoding'] = $this->getEncoding($data);

        foreach ($this->fields as $value) {
            $this->config->setConfig($value, $data[$value]);
        }
    }

    private function getEncoding($data)
    {
        return !empty($data['encoding_other'])
            ? $data['encoding_other']
            : $data['encoding_basic'];
    }

    private function getDebugMode($debug_mode)
    {
        return var_export($debug_mode === 0, 1);
    }
}
