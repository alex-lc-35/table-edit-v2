// resources/js/modules/spreadsheetInit.js
import jspreadsheet from 'jspreadsheet-ce';

export default function initJspreadsheet() {
    window.onload = function () {
        const spreadsheetElement = document.getElementById('spreadsheet');

        if (spreadsheetElement) {
            jspreadsheet(document.getElementById('spreadsheet'), {
                worksheets: [{
                    data: [
                        ['Mazda', 2001, 2000],
                        ['Peugeot', 2010, 5000],
                        ['Honda Fit', 2009, 3000],
                        ['Honda CRV', 2010, 6000],
                    ],
                    columns: [
                        {title: 'Model', width: '300px'},
                        {title: 'Year', width: '80px'},
                        {title: 'Price', width: '100px'},
                    ]
                }]
            });
        } else {
            console.error('Élément #spreadsheet non trouvé');
        }
    };
}
