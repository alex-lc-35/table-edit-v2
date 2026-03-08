// app.js
import './bootstrap';
import initJspreadsheet from '@/jspreadsheet.js';
import {get, post} from '@/api.js'
import initTableEdit from '@/tableEdit.js';

window.initJspreadsheet = initJspreadsheet
window.api = {
    get: get,
    post: post
};

window.initTableEdit = initTableEdit;  // Exposer initTableEdit à window
