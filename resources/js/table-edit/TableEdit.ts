// js/table-edit/TableEdit.ts

// @ts-ignore
import jspreadsheet from 'jspreadsheet-ce';
// import ApiService from './ApiService'

export class TableEdit {
    private readonly name: string;
    private readonly rows: any[];
    private readonly keyColumn: string;
    private readonly data: any[];
    private readonly columns: any[];

    constructor(data: { success: boolean, message: string, name: string, rows: any[], keyColumn: string, options: { worksheets: any[] } }) {
        this.name = data.name;
        this.rows = data.rows;
        this.keyColumn = data.keyColumn;
        this.data = data.options.worksheets[0].data;
        this.columns = data.options.worksheets[0].columns;
    }

    // Méthode pour récupérer le nom du tableau
    getName() {
        return this.name;
    }

    // Méthode pour récupérer les lignes du tableau
    getRows() {
        return this.rows;
    }

    // Méthode pour récupérer la clé primaire
    getKeyColumn() {
        return this.keyColumn;
    }

    // Méthode pour récupérer les données du tableau
    getData() {
        return this.data;
    }

    // Méthode pour récupérer la configuration des colonnes
    getColumns() {
        return this.columns;
    }

    // Méthode pour initialiser jspreadsheet dans l'élément HTML
    initJspreadsheet() {
        const spreadsheetElement = document.getElementById('spreadsheet');
        if (spreadsheetElement) {
            return jspreadsheet(spreadsheetElement, {
                worksheets: [{
                    data: this.data,
                    columns: this.columns
                }],
                // Événement sur les changements
                onchange: (instance, cell, col, row, value) => {
                    console.log(`Cellule modifiée : Ligne ${row}, Colonne ${col}, Nouvelle valeur : ${value}`);
                    this.handleChange(cell, col, row, value);
                }
            });
        } else {
            console.error('Élément #spreadsheet non trouvé');
        }
    }

    // Méthode personnalisée pour gérer les changements de cellule
    handleChange(cell: any, col: number, row: number, value: any) {
        console.log(
            {
                col: col,
                row: row,
                value: value,
                // cell: cell
            }
        );

        const data = {
            "columnName" : "stock",
            "value" : "200",
            "row":  {
                "id": 2,
                "name": "GGG",
                "price": 455,
                "stock": 2,
                "image": "https://via.placeholder.com/640x480.png/006655?text=food+et",
                "inter": 300,
                "unit": "BUNCH",
                "limited": true
            }
        }

        this.data[row][col] = value;
    }
}
