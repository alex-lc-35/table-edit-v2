import './bootstrap';
import 'jspreadsheet/dist/jspreadsheet.css';
import { greet } from '@/myModule.js';

// Expose la fonction greet globalement via window
window.greet = greet;
