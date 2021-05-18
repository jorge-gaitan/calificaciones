<?php

namespace Jorge\Modulos;



final class Cookies
{

    /**
     *
     * @var type 
     */
    protected $cookie_data;

    /**
     *
     * @var type 
     */
    protected $cookie_meta;

    /**
     * 
     * @param string $name
     */
    public function __construct($name = 'bulker')
    {

        $name = ($name) ?: 'bulker';

        $this->cookie_meta = array(
            "name" => $name,
            "SameSite" => "Strict", // TODO Implementar
            "expire" => (time() + (86400 * 30)), // 30 Días
            "content" => array()
        );

        $this->cookie_data = $this->createMyCookie();
    }

    /**
     * 
     * @return type
     */
    private function createMyCookie()
    {
        if (!filter_input(INPUT_COOKIE, $this->cookie_meta['name'])) {
            return $this->setMyCookie($this->cookie_meta['content']);
        } else {
            return filter_input(INPUT_COOKIE, $this->cookie_meta['name']);
        }
    }

    /**
     * 
     * @param type $string
     * @return type
     */
    private function setMyCookie($string)
    {
        $string = serialize($string);
        \setcookie($this->cookie_meta['name'], $string, $this->cookie_meta['expire'], "/", "", true, true);
        $this->cookie_data = $string;
        return $string;
    }

    /**
     * 
     * @return string
     */
    public function getMyCookie()
    {
        return $this->cookie_data;
    }

    /**
     * 
     * @param string $sec
     * @return string
     */
    public function getCookie($sec)
    {
        $cookie = unserialize($this->getMyCookie());
        return (isset($cookie[$sec]) ? $cookie[$sec] : NULL);
    }

    /**
     * 
     * @param type $sec
     * @param type $param
     */
    public function setCookie($sec, $param)
    {
        $cookie = unserialize($this->getMyCookie());
        $cookie[$sec] = $param;
        $this->setMyCookie($cookie);
    }

    /**
     * 
     * @param type $sec
     */
    public function delCookie($sec)
    {
        $cookie = unserialize($this->getMyCookie());
        if (isset($cookie[$sec])) {
            unset($cookie[$sec]);
            $this->setMyCookie($cookie);
        }
    }
}
