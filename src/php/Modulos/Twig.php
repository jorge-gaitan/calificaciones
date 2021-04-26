<?php

namespace Jorge\Modulos;

use Jorge\Funciones;

/**
 * Clase principal contenedora de los métodos para manejar plantillas en formato Twig
 * @link https://twig.sensiolabs.org/doc/1.x/templates.html
 */
final class Twig {

    /**
     * 
     * @var string Ubicación del archivo de la plantilla Twig que esta ubicado en $Twig_Template_Folder por defecto es base.twig
     * @see $Twig_Template_Folder
     */
    private $Template_File;

    /**
     * 
     * @var string Carpeta base contenedora de todas las plantillas Twig. por defecto esta ubicado en la carpeta twig
     */
    private $Twig_Template_Folder;

    /**
     *
     * @var string
     */
    private $Twig_Cache_Folder;

    /**
     *
     * @var string
     */
    private $Twig_Output_Encoding = 'UTF-8';

    /**
     *
     * @var array Set de Variables manejadas y transmitidas a las plantillas Twig
     */
    private $Twig_Vars;

    /**
     *
     * @var \Twig\Loader\FilesystemLoader Componente del módulo Twig que maneja directorios de plantillas
     * @link https://twig.symfony.com/doc/1.x/api.html
     */
    private $Twig_Loader_Filesystem;

    /**
     *
     * @var \Twig\Environment Componente de módulo Twig que maneja la configuración principal.
     * @link https://twig.symfony.com/doc/1.x/api.html
     */
    private $Twig_Environment;

    /**
     * Función constructora de la clase. Establece todos los valores de configuración por defecto.
     * @param string $Twig_File
     * @param array $Twig_Folder
     * @param array $Twig_Cache
     * Es necesario crear un objeto antes de ejecutar cualquier método
     */
    public function __construct($Twig_File = 'base.twig', $Twig_Folder = [__DIR__, "..", "..", 'twig'], $Twig_Cache = [__DIR__, "..", "..", "..", 'compilation_cache']) {
        $this->Twig_Template_Folder = Funciones::parseDir($Twig_Folder);
        $this->Twig_Cache_Folder = Funciones::parseDir($Twig_Cache);
        $this->Template_File = $Twig_File;
        $this->Twig_Vars = [];

        $this->Twig_Loader_Filesystem = new \Twig\Loader\FilesystemLoader($this->Twig_Template_Folder);

        $this->setUpEnvironment();
        $this->loadExtensions();
    }

    /**
     * 
     * @return void
     */
    protected function setUpEnvironment(): void {
        $Twig_Cache = $this->Twig_Cache_Folder;
        $Twig_Loader_Filesystem = $this->Twig_Loader_Filesystem;
        $Twig_Output_Encoding = $this->Twig_Output_Encoding;
        $DebugEnable = true;

        $this->Twig_Environment = new \Twig\Environment($Twig_Loader_Filesystem, array(
            'cache' => $Twig_Cache,
            'output_encoding' => $Twig_Output_Encoding,
            'auto_reload' => $DebugEnable,
            'debug' => $DebugEnable
        ));
    }

    /**
     * Pre cargar extensiones al ambiente de Twig
     * @return void
     */
    protected function loadExtensions(): void {
        // $this->addExtension(new \Twig\Extra\Intl\IntlExtension());
        $this->addExtension(new \Twig\Extension\DebugExtension());
    }

    /**
     * Establece el archivo que será usado de plantilla en el objeto actual.
     * El Archivo tiene que estar ubicado en $Twig_Template_Folder.
     * Solo se puede cargar un archivo por objeto, si quieres cargar más de uno tiene que usar la sintaxis Twig
     * @see $Twig_Template_Folder
     * @param string $template Nombre del archivo o ubicación relativa a $Twig_Template_Folder
     */
    public function setTemplate(string $template): void {
        $this->Template_File = $template;
    }

    /**
     * Regresa el valor de $Template_File
     * @see $Template_File
     * @return string Archivo o ubicación relativa de la plantilla actual
     */
    public function getTemplate(): string {
        return $this->Template_File;
    }

    /**
     * Añade filtros del módulo Twig
     * @link https://twig.symfony.com/doc/1.x/filters/index.html
     * @link https://twig.symfony.com/doc/1.x/advanced.html
     * @param string $filter_name Nombre del filtro que sera llamado desde las plantillas Twig
     * @param string $filter_function Función PHP que sera invocada en las plantillas Twig
     */
    public function addFilter($filter_name, $filter_function): void {
        $this->Twig_Environment->addFilter(new \Twig\TwigFilter($filter_name, $filter_function));
    }

    /**
     * 
     * @param \Twig\Extension\ExtensionInterface $extension
     */
    public function addExtension(\Twig\Extension\ExtensionInterface $extension): void {
        $this->Twig_Environment->addExtension($extension);
    }

    /**
     * 
     * @param \Twig\Lexer $lexer
     */
    public function setLexer(\Twig\Lexer $lexer): void {
        $this->Twig_Environment->setLexer($lexer);
    }

    /**
     * 
     * @return \Twig\Environment
     */
    public function getEnvironment(): \Twig\Environment {
        return $this->Twig_Environment;
    }

    /**
     * Agrega variables que serán usadas posteriormente en la plantilla Twig
     * @param string $name Nombre de la variable (Pueden ser multidimensionales separadas por un punto)
     * @param string|array $value Valor de la variable puede ser un array o cualquier tipo de objeto
     */
    public function setVar(string $name, $value): void {
        Funciones::set_array_value($this->Twig_Vars, $name, $value);
    }

    /**
     * Agrega un arreglo de variables a la plantilla
     * @param array $vars
     */
    public function setVars(array $vars): void {
        foreach ($vars as $k => $v) {
            $this->setVar($k, $v);
        }
    }

    /**
     * Regresa el valor de $Twig_Vars
     * @return array
     * @see $Twig_Vars
     */
    public function getVars(): array {
        return $this->Twig_Vars;
    }

    /**
     * Regresa el valor de una variable ubicada en $Twig_Vars.
     * El nombre puede estar separado por puntos en variables multidimensionales 
     * @param string $name índice dentro de $Twig_Vars
     * @see $Twig_Vars
     */
    public function getVar(string $name) {
        return Funciones::get_array_value($this->Twig_Vars, $name);
    }

    /**
     * Compila la plantilla Twig y regresa un string listo para ser mostrado
     * @see $Twig_Environment
     * @see $Template_File
     * @see $Twig_Vars
     * @return string
     */
    public function getRender(): string {
        return $this->Twig_Environment->render($this->Template_File, $this->Twig_Vars);
    }

}