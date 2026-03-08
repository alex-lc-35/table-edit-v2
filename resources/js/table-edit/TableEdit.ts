// js/table-edit/TableEdit.ts

export class TableEdit {
    private name: string;
    private rows: any[];
    private keyColumn: string;
    private data: any[];
    private columns: any[];

    constructor(data: { success: boolean, message: string, name: string, rows: any[], keyColumn: string, options: { worksheets: any[] } }) {
        this.name = data.name;  // Récupérer le nom du tableau
        this.rows = data.rows;  // Récupérer les lignes du tableau
        this.keyColumn = data.keyColumn;  // Récupérer la clé primaire
        this.data = data.options.worksheets[0].data;  // Récupérer les données du tableau
        this.columns = data.options.worksheets[0].columns;  // Récupérer la configuration des colonnes
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
}
