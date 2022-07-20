<?php
class Render
{
    public function renderFileVariables($data): bool|array|string
    {
        $data = $this->replace("Title", (new Config)->getSiteTitle(), $data);
        $data = $this->replace("Language", getLang(), $data);
        $data = $this->replace("IconUrl", (new Config)->getIconUrl(), $data);
        $data = $this->replace("WSTitle", (new Config)->getSiteName(), $data);
        $data = $this->replace("NowLanguage", (new Config)->getNowLanguage(), $data);
        $data = $this->replace("LanguageList", (new Config)->getLanguageList(), $data);
        if (isset($_COOKIE['REF_TOKEN']) && $_COOKIE['REF_TOKEN'] === hash("haval192,5", hash("sha224", hash("sha256", md5((new Config)->getresxPassword()))))) {
            $lmb = "<button class=\"lmbutton\" onclick=\"window.location='?manager'\">{#-Manager-#}</button>";
        } else {
            $lmb = "<button class=\"lmbutton\" onclick=\"window.location='?login'\">{#-Login-#}</button>";
        }
        $data = $this->replace("LMButton", $lmb, $data);
        $data = $this->replace_i18n($data);
        $data = $this->replace("FData", '', $data);
        return $data;
    }

    private function replace($s, $t, $f): array|string
    {
        while (strpos($f, "{#[$s]#}")) $f = str_replace("{#[$s]#}", $t, $f);
        return $f;
    }

    private function replace_i18n($f)
    {
        $i18ndata = (new Config)->getI18n();
        $lang = getLang();
        foreach ($i18ndata->i18n->$lang as $item) {
            while (strpos($f, "{#-$item[0]-#}")) $f = str_replace("{#-$item[0]-#}", $item[1], $f);
        }
        return $f;
    }

    public function renderManager($data)
    {
        $data = $this->renderMBlock($data, "Theme", (new Config)->getTheme());
        $info = "System: " . php_uname() . "<br />"
        . "Runtime: " . php_sapi_name() . "<br />"
        . "PHP Version: " . PHP_VERSION;
        $data = $this->renderMBlock($data, "Info", $info);
        return $data;
    }

    private function renderMBlock($data, $block, $nblock)
    {
        while (strpos($data, "{#*$block*#}")) $data = str_replace("{#*$block*#}", $nblock, $data);
        return $data;
    }
}
