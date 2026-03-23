import './inno-bootstrap';
import { initInno, bindGlobalEvents } from './inno-init';
import './inno-validation';
import './inno-header';
import './inno-footer';
import './inno-autocomplete';
import './inno-scroll-reveal';

initInno();

$(function () {
  bindGlobalEvents();
  $('[data-bs-toggle="tooltip"]').tooltip();
});
