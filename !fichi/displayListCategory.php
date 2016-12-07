<?php

    class displayListCategory {
        public $img, $array;
        function plist ($array) {
            $this -> array = $array;
            ?><div class="list_category"><ul><?php
                foreach ($array as $key => $value){
                    echo '<li><a href="/.$key.">'.$value.'</a></li>';
                }
                ?></ul></div><?php
        }

        function full_plist ($img, $array) {
            for ($i =0;$i < 10; $i++) {
                echo'<div class="img_category"><img src="/img/buildingmaterials/'.$images[$i].'.jpg" height="60px" width="60px"></div>';
                plist ($buldMat[$i]);
            }
        }
    }