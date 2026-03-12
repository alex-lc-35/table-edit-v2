<?php

namespace App\Providers;

use App\Modules\TableEdit\AbstractTable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TableEditServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        Route::bind('tableEditClass', function ($value) {

            $class = "App\\Modules\\TableEdit\\Tables\\{$value}";

            // Si la classe n'existe pas
            if (!class_exists($class)) {
                Log::error('[table-edit] "Classe non trouvée : {$class}"');

                return response()->json([
                    'error' => 'Table non trouvée. Veuillez vérifier l\'identifiant de la table.',
                ], 404);
            }

            if (!is_subclass_of($class, AbstractTable::class)) {
                Log::error("[table-edit] La classe {$class} n'est pas une sous-classe de AbstractTable.");

                return response()->json([
                    'error' => 'Erreur de configuration pour cette table.',
                ], 400);
            }

            Log::info("[table-edit] Chargement de : {$value}");

            return app($class);
        });
    }
}
