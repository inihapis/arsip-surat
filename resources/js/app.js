import './bootstrap';

import "toastify-js/src/toastify.css";
import Toastify from 'toastify-js';

import 'toastr/build/toastr.min.css'; // Mengimpor CSS Toastr
import toastr from 'toastr'; // Mengimpor Toastr

import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/animations/scale-subtle.css';

import $ from 'jquery'; // Pastikan ini di atas  
// import '@selectize/selectize/dist/css/selectize.custom.css';    
import selectize from '@selectize/selectize';

import 'preline';

import flatpickr from 'flatpickr';
import { Indonesian } from "flatpickr/dist/l10n/id.js"
// import 'flatpickr/dist/flatpickr.css'; 

flatpickr.localize(Indonesian); // default locale is now Indonesian

// Mengimpor Luxon  
import { DateTime, Settings } from 'luxon';  
  
Settings.defaultLocale = 'id-ID';  

window.Toastify = Toastify;
window.toastr = toastr;
window.tippy = tippy;
window.luxon = { DateTime };
window.jquery = $;
window.selectize = selectize;
window.flatpickr = flatpickr;
