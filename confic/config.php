<?php
class Config
{
    private function getConfig()
    {
        return json_decode(
            file_get_contents("confic/config.json")
        );
    }

    public function getTheme()
    {
        return $this->getConfig()->theme;
    }

    public function getSiteName()
    {
        return $this->getConfig()->sitename;
    }
}