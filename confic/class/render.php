<?php
class Render
{
    public function renderFileVariables($data): bool|array|string
    {
        $data = $this->replace("Title", (new Config)->getSiteTitle(), $data);
        $data = $this->replace("Language", (new Config)->getLanguage(), $data);
        $data = $this->replace("IconUrl", (new Config)->getIconUrl(), $data);
        $data = $this->replace("WSTitle", (new Config)->getSiteName(), $data);
        $data = $this->replace("NowLanguage", (new Config)->getNowLanguage(), $data);
        $data = $this->replace("LanguageList", (new Config)->getLanguageList(), $data);
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
        $lang = (new Config)->getLanguage();
        if ($i18ndata->i18n->$lang != null) {
            foreach ($i18ndata->i18n->$lang as $item) {
                while (strpos($f, "{#-$item[0]-#}")) $f = str_replace("{#-$item[0]-#}", $item[1], $f);
            }
        } else {
            foreach ($i18ndata->i18n->en as $item) {
                while (strpos($f, "{#-$item[0]-#}")) $f = str_replace("{#-$item[0]-#}", $item[1], $f);
            }
        }
        return $f;
    }
}
