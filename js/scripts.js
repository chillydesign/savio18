

(function ($, root, undefined) {

    $(function () {

        'use strict';



        ////////////////////////////////////////
        ///////  MOBILE MENU NAVIGATION  ///////
        var menu_button = document.getElementById('menu_button');
        var menu_navigation = document.getElementById('menu_navigation');
        menu_button.addEventListener('click', function(){
            menu_navigation.classList.toggle('show_menu');
        });
        window.addEventListener('keyup', function(e){
            if (e.keyCode === 27) {
                menu_navigation.classList.remove('show_menu');
            }
        });

        function hideMenu() {
            var menu_navigation = document.getElementById('menu_navigation');
            menu_navigation.classList.remove('show_menu');
        }







    });

})(jQuery, this);
