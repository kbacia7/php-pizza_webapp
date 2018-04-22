<?php

class ConfigLoader
{
    private $config = null;
    private function LoadConfig()
    {
        $configData = yaml_parse_file(RequirePath::ConfigPath());
        $this->config = $configData;
    }

    public function GetConfig()
    {
        if ($this->config == null) {
            $this->LoadConfig();
        }
        return $this->config;
    }
}
