// js/table-edit/TableEdit.ts

// @ts-ignore
import jspreadsheet from 'jspreadsheet-ce';
import {ApiService} from './ApiService';

export class TableEdit {
    private readonly name: string;
    private readonly className: string;
    private readonly rows: any;
    private readonly keyColumn: string;
    private readonly data: any[];
    private readonly columns: any[];
    private apiService: ApiService;

    constructor(data: {
        success: boolean,
        data: {
            name: string,
            className: string,
            rows: any[],
            keyColumn: string,
            options: { worksheets: any[] }
        },
        error: any
    }) {
        console.log('constructor', data);
        const {name, className, rows, keyColumn, options} = data.data;
        const worksheet = options.worksheets[0];

        this.name = name;
        this.className = className;
        this.rows = rows;
        this.keyColumn = keyColumn;
        this.data = worksheet.data;
        this.columns = worksheet.columns;
        this.apiService = new ApiService('http://localhost:8002/api');
    }

    initJspreadsheet() {
        const spreadsheetElement = document.getElementById('spreadsheet');
        if (spreadsheetElement) {
            jspreadsheet(spreadsheetElement, {
                worksheets: [{
                    data: this.data,
                    columns: this.columns
                }],
                // Événement sur les changements
                onchange: (instance: any, cell: any, col: any, row: any, value: any) => {
                    console.log(`Cellule modifiée : Ligne ${row}, Colonne ${col}, Nouvelle valeur : ${value}`);
                    this.handleChange(instance, cell, col, row, value);
                }
            });
        } else {
            console.error('Élément #spreadsheet non trouvé');
        }
    }

    // @ts-ignore
    async handleChange(instance: any, cell: any, col: number, row: number, value: any) {

        const id: any = instance.getValueFromCoords(0, row)
        const dataCol = this.columns[col]
        const dataRow = this.rows.find(item => item.id === id);

        console.log(
            {
                col: dataCol.name,
                value: value,
                dataRow: dataRow,
                row: row,
                id: id,
                cell: cell
            }
        );

        const data = {
            "columnName": dataCol.name,
            "value": value,
            "row": dataRow
        }

        await this.apiService.post(this.className, data)

        console.log("yep a jour")

        this.data[row][col] = value;
    }
}
