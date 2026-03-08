// js/table-edit/index.ts

import {ApiService} from "./ApiService";
import {TableEdit} from "./TableEdit";
// @ts-ignore
import jspreadsheet from 'jspreadsheet-ce';

export default async function (name: string) {
    const api = new ApiService('http://localhost:8002/api');
    const data = await api.get(name);
    const tableEdit = new TableEdit(data);
    initJspreadsheet([{
            data: tableEdit.getData(),
            columns: tableEdit.getColumns()
        }]
    )
    return tableEdit;
}

function initJspreadsheet(worksheets) {
    const spreadsheetElement = document.getElementById('spreadsheet');

    if (spreadsheetElement) {
        jspreadsheet(document.getElementById('spreadsheet'), {
            worksheets: worksheets
        });
    } else {
        console.error('Élément #spreadsheet non trouvé');
    }

}
