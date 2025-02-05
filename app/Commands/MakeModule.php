<?php
namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MakeModule extends BaseCommand
{
    protected $group       = 'Custom';
    protected $name        = 'make:module';
    protected $description = 'Genera la estructura base de un módulo en CodeIgniter 4';
    protected $usage       = 'make:module [nombre]';
    protected $arguments   = ['nombre' => 'Nombre del módulo a crear'];

    public function run(array $params)
    {
        $moduleName = ucfirst($params[0] ?? '');
        if (!$moduleName) {
            CLI::error('Debes proporcionar un nombre para el módulo.');
            return;
        }

        $basePath = APPPATH . 'Modules/' . $moduleName;
        $folders = [
            "$basePath/Application/Service",
            "$basePath/Config",
            "$basePath/Domain",
            "$basePath/Infrastructure/In/Controller",
            "$basePath/Infrastructure/Out/Persistence/Model",
            "$basePath/Infrastructure/Out/Persistence/Repository"
        ];

        $files = [
            "$basePath/Application/Service/{$moduleName}Service.php" => "<?php\nnamespace Modules\\$moduleName\\Application\\Service;\n\nuse Modules\\$moduleName\\Infrastructure\\Out\\Persistence\\Repository\\{$moduleName}Repository;\n\nclass {$moduleName}Service\n{\n    protected \${$moduleName}Repository;\n\n    public function __construct({$moduleName}Repository \${$moduleName}Repository)\n    {\n        \$this->{$moduleName}Repository = \${$moduleName}Repository;\n    }\n\n    public function findAll()\n    {\n        return \$this->{$moduleName}Repository->findAll();\n    }\n\n    public function findById(\$id)\n    {\n        return \$this->{$moduleName}Repository->findById(\$id);\n    }\n\n    public function create(\$data)\n    {\n        return \$this->{$moduleName}Repository->create(\$data);\n    }\n\n    public function update(\$id, \$data)\n    {\n        return \$this->{$moduleName}Repository->update(\$id, \$data);\n    }\n\n    public function delete(\$id)\n    {\n        return \$this->{$moduleName}Repository->delete(\$id);\n    }\n}",
            "$basePath/Config/Routes.php" => "<?php\nnamespace Modules\\$moduleName\\Config;\n\nuse CodeIgniter\\Router\\RouteCollection;\n\nconst {$moduleName}_MODULE_NAMESPACE = 'Modules\\$moduleName\\Infrastructure\\In\\Controller';\n\nfunction {$moduleName}Routes(RouteCollection \$routes)\n{\n    \$routes->group(strtolower('$moduleName'), ['namespace' => {$moduleName}_MODULE_NAMESPACE], function (\$routes) {\n        \$routes->get('/', '{$moduleName}Controller::index');\n        \$routes->get('(:num)', '{$moduleName}Controller::show/\$1');\n        \$routes->post('/', '{$moduleName}Controller::store');\n        \$routes->put('(:num)', '{$moduleName}Controller::update/\$1');\n        \$routes->delete('(:num)', '{$moduleName}Controller::delete/\$1');\n    });\n}",
            "$basePath/Config/Services.php" => "<?php\nnamespace Modules\\$moduleName\\Config;\n\nuse CodeIgniter\\Config\\BaseService;\nuse Modules\\$moduleName\\Application\\Service\\{$moduleName}Service;\nuse Modules\\$moduleName\\Infrastructure\\Out\\Persistence\\Repository\\{$moduleName}Repository;\n\nclass Services extends BaseService\n{\n    public static function {$moduleName}Service()\n    {\n        if (static::hasInstance('{$moduleName}Service')) {\n            return static::getSharedInstance('{$moduleName}Service');\n        }\n\n        \${$moduleName}Repository = new {$moduleName}Repository();\n\n        return new {$moduleName}Service(\${$moduleName}Repository);\n    }\n}", 
            "$basePath/Domain/{$moduleName}.php" => "<?php\nnamespace Modules\\$moduleName\\Domain;\n\nuse CodeIgniter\\Entity\\Entity;\n\nclass {$moduleName} extends Entity\n{\n}",
            "$basePath/Infrastructure/In/Controller/{$moduleName}Controller.php" => "<?php\nnamespace Modules\\$moduleName\\Infrastructure\\In\\Controller;\n\nuse App\\Controllers\\BaseController;\nuse Modules\\$moduleName\\Config\\Services as {$moduleName}Service;\n\nclass {$moduleName}Controller extends BaseController\n{\n    protected \${$moduleName}Service;\n\n    public function __construct()\n    {\n        \$this->{$moduleName}Service = {$moduleName}Service::{$moduleName}Service();\n    }\n\n    public function index()\n    {\n        return $this->respond(\$this->{$moduleName}Service->findAll());\n    }\n\n    public function show(\$id)\n    {\n        return $this->respond(\$this->{$moduleName}Service->findById(\$id));\n    }\n\n    public function create()\n    {\n        \$data = $this->request->getPost();\n        return $this->respondCreated(\$this->{$moduleName}Service->create(\$data));\n    }\n\n    public function update(\$id)\n    {\n        \$data = $this->request->getRawInput();\n        return $this->respond(\$this->{$moduleName}Service->update(\$id, \$data));\n    }\n\n    public function delete(\$id)\n    {\n        return $this->respondDeleted(\$this->{$moduleName}Service->delete(\$id));\n    }\n}",
            "$basePath/Infrastructure/Out/Persistence/Model/{$moduleName}Model.php" => "<?php\nnamespace Modules\\$moduleName\\Infrastructure\\Out\\Persistence\\Model;\n\nuse CodeIgniter\\Model;\n\nclass {$moduleName}Model extends Model\n{\n    protected \$table = '" . strtolower($moduleName) . "';\n    protected \$primaryKey = 'id" . strtolower($moduleName) . "';\n    protected \$allowedFields = ['campos'];\n    protected \$returnType = \\Modules\\$moduleName\\Domain\\$moduleName::class;\n}",
            "$basePath/Infrastructure/Out/Persistence/Repository/{$moduleName}Repository.php" => "<?php\nnamespace Modules\\$moduleName\\Infrastructure\\Out\\Persistence\\Repository;\n\nuse Modules\\$moduleName\\Infrastructure\\Out\\Persistence\\Model\\{$moduleName}Model;\n\nclass {$moduleName}Repository\n{\n    protected \${$moduleName}Model;\n\n    public function __construct()\n    {\n        \$this->{$moduleName}Model = new {$moduleName}Model();\n    }\n\n    public function findAll()\n    {\n        return \$this->{$moduleName}Model->findAll();\n    }\n\n    public function findById(\$id)\n    {\n        return \$this->{$moduleName}Model->find(\$id);\n    }\n\n    public function create(\$data)\n    {\n        return \$this->{$moduleName}Model->insert(\$data);\n    }\n\n    public function update(\$id, \$data)\n    {\n        return \$this->{$moduleName}Model->update(\$id, \$data);\n    }\n\n    public function delete(\$id)\n    {\n        return \$this->{$moduleName}Model->delete(\$id);\n    }\n}",
        ];

        foreach ($folders as $folder) {
            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
                CLI::write("Directorio creado: $folder", 'green');
            }
        }

        foreach ($files as $file => $content) {
            if (!file_exists($file)) {
                file_put_contents($file, $content);
                CLI::write("Archivo creado: $file", 'yellow');
            }
        }

        CLI::write("Módulo $moduleName generado correctamente.", 'green');
    }
}
