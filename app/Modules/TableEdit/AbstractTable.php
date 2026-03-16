<?php

namespace App\Modules\TableEdit;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

abstract class AbstractTable
{
    /**
     * Nom du tableau (identifiant logique).
     */
    abstract public function tableName(): string;

    /**
     * Définition des colonnes (array ou Collection de Column).
     */
    abstract public function columns(): array|Collection;

    /**
     * Données à afficher (array ou Collection).
     */
    abstract public function data(): array|Collection;

    /**
     * Clé primaire par défaut pour les opérations d'édition.
     */
    abstract public function keyColumn(): string;


    /**
     * Assemble le rendu complet du tableau (prêt à envoyer au front).
     */
    public function render(): array
    {
        return TableEditService::make($this->tableName(), class_basename(static::class))
            ->setColumns($this->columns())
            ->setData($this->data())
            ->setKeyColumn($this->keyColumn())
            ->generate();
    }

    public function edit(Request $request): array
    {
        TableEditService::make($this->tableName(), class_basename(static::class))
            ->setColumns($this->columns())
            ->edit($request);

        return ['success' => true, 'message' => 'mise a jour effectuee'];
    }
}
