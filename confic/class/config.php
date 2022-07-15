<?php
class Config
{
    private function getConfig()
    {
        return json_decode(
            file_get_contents("confic/config.json")
        );
    }

    public function getI18n()
    {
        return json_decode(
            file_get_contents("confic/i18n.json")
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

    public function getLanguage()
    {
        return $this->getConfig()->language;
    }

    public function getIconUrl()
    {
        return $this->getConfig()->icon_url;
    }

    public function getSiteTitle()
    {
        return $this->getConfig()->sitetitle;
    }

    public function getNowLanguage(): string
    {
        $langlist = $this->getI18n()->langlist;
        $lang = $this->getLanguage();
        return $langlist->$lang;
    }

    public function getLanguageList(): string
    {
        $langlist = $this->getI18n()->langlist;
        $data = '';
        foreach ($langlist as $str) {
            $data .= "<option>$str</option>";
        }
        return $data;
    }

    public function resx(): void
    {
        function getUserName()
        {
            $conf = getConfig();
            return $conf->resx->username;
        }

        function getPassword()
        {
            $conf = getConfig();
            return $conf->resx->password;
        }

        function getConfig()
        {
            return json_decode(
                file_get_contents("confic/config.json")
            );
        }
    }
}