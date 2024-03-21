import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import '../scss/config/default/app.scss';
import '@vueform/slider/themes/default.css';
import '../scss/mermaid.min.css';
import "@vueform/multiselect/themes/default.css";
import 'leaflet/dist/leaflet.css';