import './bootstrap';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

toastr.options.closeButton = true;
toastr.options.progressBar = true;

window.toastr = toastr;
