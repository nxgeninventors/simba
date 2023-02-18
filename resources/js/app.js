import $ from "jquery";
import Alpine from 'alpinejs';
import "flowbite";

import "./ui/index";
import './bootstrap';
import ControllerModules from './src/controllers';

window.Alpine = Alpine;

Alpine.start();


// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark')
}


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
