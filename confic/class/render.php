<?php
class Render
{
    public function renderFileVariables($data): bool|array|string
    {
        $data = $this->replace("Title", (new Config)->getSiteName(), $data);
        $data = $this->replace("Language", (new Config)->getLanguage(), $data);
        $data = $this->replace("IconUrl", (new Config)->getIconUrl(), $data);
        $data = $this->replace("FData", '', $data);
        return $data;
    }

    private function replace($s, $t, $f): array|string
    {
        while (strpos($f, "{#[$s]#}")) $f = str_replace("{#[$s]#}", $t, $f);
        return $f;
    }
}
