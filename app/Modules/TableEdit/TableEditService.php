<?php

namespace App\Modules\TableEdit;

use App\Modules\TableEdit\Models\AbstractColumn;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class TableEditService
{
    protected string $tableName;
    protected string $className;
    protected string $keyColumn;
    protected Collection $columns;
    protected Collection $data;

    public function __construct(string $tableName, string $className = '')
    {
        $this->className = $className;
        $this->tableName = $tableName;
        $this->keyColumn = 'id';
        $this->columns = collect();
        $this->data = collect();
    }

    public function setColumns(array|Collection $columns): self
    {
        $this->columns = $columns instanceof Collection ? $columns : collect($columns);
        return $this;
    }

    public function setData(array|Collection $data): self
    {
        $this->data = $data instanceof Collection ? $data : collect($data);
        return $this;
    }

    public function setKeyColumn(string $keyColumn): self
    {
        $this->keyColumn = $keyColumn;
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function edit(Request $request): void
    {
        /** todo : vérifier la request, formrequest ?  */

        $columnName = $request->get('columnName');
        $row = $request->get('row');
        $value = $request->get('value');

        /** @var AbstractColumn $column */
        $column = $this->columns->first(fn($item) => $item->getName() === $columnName);

        if (!$column) {
            throw new \Exception("Cette colonne n'existe pas", 403);
        }

        /**
         * Vérification des droits
         */
        if (!$column->getEditable()) {
            throw new \Exception("Vous n'êtes pas authorisé à éditer cette colonne", 403);
        }

        /**
         * Vérification intégrité value
         */
        $rules = [$columnName => $column->getRules()];
        $data = [$columnName => $value];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $msg = 'Erreur de validation : ' . $validator->errors()->first($columnName);
            throw new \Exception($msg, 400);
        }

        /**
         * Enregistrement
         */
        try {
            $update = \DB::table($this->tableName)
                ->where($this->keyColumn, $row[$this->keyColumn])
                ->update([$columnName => $value]);
        } catch (\Throwable $th) {
            throw new \Exception("Erreur en base de donnée", 400);
        }

        if (!$update) {
            throw new \Exception("Erreur lors de la mise à jour", 400);
        }
    }

    public static function make(string $tableName, string $className): self
    {
        return new self($tableName, $className);
    }

    public function generate(): array
    {
        /** Vérification donnés */
        if ($this->data->isEmpty()) {
            throw new \Exception("Aucune donnée", 400);
        }

        /** Vérification des colonnes */
        $firstRow = $this->data->first();
        $colNames = $this->columns->map(fn($col) => $col->getName())->toArray();
        $unexpected = array_diff($colNames, array_keys($firstRow));

        if (!empty($unexpected)) {
            $list = implode(', ', $unexpected);
            $msg = "Clé(s) absente(s) dans les données : {$list}";
            throw new \Exception($msg, 400);
        }

        return [
            'name' => $this->tableName,
            'className' => $this->className,
            'rows' => $this->data->toArray(),
            'keyColumn' => $this->keyColumn,
            'options' => [
                'worksheets' => [
                    [
                        'data' => $this->data->toArray(),
                        'columns' => $this->columns->map->toArray()->all(),
                    ],
                ],
            ],
        ];
    }
}
