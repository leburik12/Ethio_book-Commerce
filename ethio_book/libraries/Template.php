<?php
/*
 * Template Class
 * Creates a template/view object
 */
class Template
{
    // path to template
    protected $template;
    //Variables passed in 
    protected $vars = array();

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function __get($key)
    {
        return $this->vars[$key];
    }

    public function __set($key, $value)
    {
        $this->vars[$key] = $value;
    }
    /*
     * Convert Object To String
     */
    public function __toString()
    {
        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();

        include basename($this->template);
        return ob_get_clean();
    }
}
