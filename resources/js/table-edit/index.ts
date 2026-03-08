// js/table-edit/index.ts

import {ApiService} from "./ApiService";
import {TableEdit} from "./TableEdit";

export default async function (name: string) {
    const api = new ApiService('http://localhost:8002/api');
    const data = await api.get(name);
    const tableEdit = new TableEdit(data);

    // Initialiser jspreadsheet via la méthode de l'instance TableEdit
    tableEdit.initJspreadsheet();

    return tableEdit;
}
