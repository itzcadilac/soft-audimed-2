<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\TwigFunction;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    protected $session;

    /**
     * @return void
     */

    protected $twig;

    private const HTTP_STATUS_OK = 200;
    private const HTTP_STATUS_CREATED = 201;
    private const HTTP_STATUS_BAD_REQUEST = 400;
    private const HTTP_STATUS_NOT_FOUND = 404;
    private const HTTP_STATUS_INTERNAL_SERVER_ERRROR = 500;

    private const STATUS_SUCCESS = "success";
    private const STATUS_ERROR = "error";

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $loader = new FilesystemLoader(APPPATH . 'Views');
        //$this->twig = new Environment($loader, ['cache' => WRITEPATH . 'cache']);

        if (ENVIRONMENT === 'production') {
            $this->twig = new Environment($loader, [
                'debug' => false,
                'cache' => false,
            ]);
        } else {
            $this->twig = new Environment($loader, [
                'debug' => true,
                'cache' => false,
            ]);
            $this->twig->addExtension(new DebugExtension());
        }

        // Create a new function for base_url.
        $this->twig->addFunction(new TwigFunction('base_url', function ($uri) {
            return base_url($uri);
        }));

        $this->twig->addFunction(new TwigFunction('icons', function ($uri) {
            return base_url("/assets/icons/{$uri}");
        }));

        //Para Url actual
        $this->twig->addFunction(new \Twig\TwigFunction('current_url', function () {
            return current_url();
        }));

        // Registrar funciones de helpers en Twig
        $this->twig->addFunction(new \Twig\TwigFunction('form_open', 'form_open'));
        $this->twig->addFunction(new \Twig\TwigFunction('form_input', 'form_input'));
        $this->twig->addFunction(new \Twig\TwigFunction('form_password', 'form_password'));
        $this->twig->addFunction(new \Twig\TwigFunction('form_submit', 'form_submit'));
        $this->twig->addFunction(new \Twig\TwigFunction('form_close', 'form_close'));

        // Funciones CSRF
        $this->twig->addFunction(new TwigFunction('csrf_token', 'csrf_token'));
        $this->twig->addFunction(new TwigFunction('csrf_hash', 'csrf_hash'));

        // E.g.: $this->session = service('session');
        //$this->session = service('session');

        $session = session();
        $modulos = $session->get('modulosUsuario');
        $nombres_user = $session->get('nombres');
        $codusuario = $session->get('idusuario');
        $currentUrl = current_url();

        //mostrar los modulos como variable global
        if (!empty($modulos)) {
            $this->twig->addGlobal('sidebar_modulos', $modulos);
        }

        //mostrar el nombre de usuario como variable global
        if (!empty($nombres_user)) {
            $this->twig->addGlobal('nombre_user', $nombres_user);
        }

        //enviar el idusuario como variable global
        if (!empty($codusuario)) {
            $this->twig->addGlobal('codusuario', $codusuario);
        }        
    }

    public function render(string $filename, array $params = [])
    {
        try {
            // Verificar si la propiedad appName está disponible
            $appConfig = config('App');
            if (!isset($appConfig->appName)) {
                throw new \Exception('appName no está configurado correctamente.');
            }

            // Agregar el nombre de la aplicación a los parámetros
            $params['appName'] = $appConfig->appName;
            // Render the template.
            return $this->twig->render($filename, $params);
        } catch (LoaderError | SyntaxError | RuntimeError | \Throwable $e) {
            if (ENVIRONMENT === 'production') {
                // Save error in file log
                log_message('error', $e->getTraceAsString());
            } else {
                // Show error in the current page
                header_remove();
                http_response_code(500);
                header('HTTP/1.1 500 Internal Server Error');
                echo '<pre>' . $e->getTraceAsString() . '</pre>';
                echo PHP_EOL;
                echo $e->getMessage();
                exit;
            }
        }
    }

    protected function respond($data, int $status = 200)
    {
        return $this->response
            ->setStatusCode($status)
            ->setJSON($data);
    }

    protected function responseOk($data, $csrfHash = null)
    {
        return $this->response(
            $this->mapData(self::STATUS_SUCCESS, "Respuesta Ok", self::HTTP_STATUS_OK, $data, $csrfHash)
        );
    }

    protected function responseCreated($message, $csrfHash = null)
    {
        return $this->response(
            $this->mapData(self::STATUS_SUCCESS, $message, self::HTTP_STATUS_CREATED, null, $csrfHash)
        );
    }
    // Respuesta a la actualización de los datos del usuario
    protected function responseUpdate($message, $data, $csrfHash = null)
    {
        return $this->response(
            $this->mapData(self::STATUS_SUCCESS, $message, self::HTTP_STATUS_CREATED, $data, $csrfHash)
        );
    }

    protected function responseBusinessError($message, $csrfHash = null)
    {
        return $this->response(
            $this->mapData(self::STATUS_ERROR, $message, self::HTTP_STATUS_BAD_REQUEST, null, $csrfHash)
        );
    }

    protected function responseError($message, $csrfHash = null)
    {
        return $this->response(
            $this->mapData(self::STATUS_ERROR, $message, self::HTTP_STATUS_INTERNAL_SERVER_ERRROR, null, $csrfHash)
        );
    }

    private function mapData($status, $message, $code, $data, $csrfHash = null)
    {
        $responseData = array("data" => [], "code" => $code);

        $responseData["data"] = [
            'status' => $status,
            'message' => $message
        ];

        if (!is_null($data)) {
            $responseData["data"]['data'] = $data;
        }

        if (!is_null($csrfHash)) {
            $responseData["data"]['csrf_hash_gen'] = $csrfHash;
        }

        return $responseData;
    }

    private function response($responseData)
    {
        return $this->response
            ->setStatusCode($responseData["code"])
            ->setJSON($responseData["data"]);
    }
}
