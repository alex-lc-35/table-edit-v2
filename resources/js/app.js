import './bootstrap';
import initJspreadsheet from '@/jspreadsheet.js';
import {get, post} from '@/api.js'

window.initJspreadsheet = initJspreadsheet
window.api = {
    get: get,
    post: post
};
