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
        $lang = getLang();
        return $langlist->$lang[1];
    }

    public function getLanguageList(): string
    {
        $langlist = $this->getI18n()->langlist;
        $data = '';
        foreach ($langlist as $str) {
            $data .= "<option value=\"$str[0]\">$str[1]</option>";
        }
        return $data;
    }


    function getresxUserName()
    {
        $conf = $this->getConfig();
        return $conf->resx->username;
    }
    function getresxPassword()
    {
        $conf = $this->getConfig();
        return $conf->resx->password;
    }
}