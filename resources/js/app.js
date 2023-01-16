import $ from "jquery";
import Alpine from 'alpinejs';
import "flowbite";

import './bootstrap';
import ControllerModules from './src/controllers';

window.Alpine = Alpine;

Alpine.start();


$(document).ready(function () {
    console.log(ControllerModules);
    $(".data-ctrl").each(function () {
        var ctrl = $(this).data("ctrl");
        console.log(ctrl);
        if (
            typeof ctrl != "undefined" &&
            ctrl != null &&
            typeof ControllerModules[ctrl] != "undefined"
        ) {
            ControllerModules[ctrl]().init();
        }
    });
});
