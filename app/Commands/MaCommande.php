<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MaCommande extends BaseCommand
{
    protected $group       = 'Test';
    protected $name        = 'app:macommande';
    protected $description = 'Ceci est ma commande.';

    public function run(array $params)
    {
        $value = $params[0] + $params[1];
        CLI::write('Voici le résultat:'.CLI::color($value, 'yellow'));
        return 0;
    }
}