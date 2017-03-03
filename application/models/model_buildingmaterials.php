<?php

class Model_Buildingmaterials extends Model
{

    public function get_data()
    {



        return array(
            array('roofing_materials','Insulation materials','supuch','derevo','metal','sayding',/*'krepezh','beton','kladoch' ,*/'vodosliv'),
            // имена картинок для категорий
            array(
                array('roofing_materials?none'=>'Кровля',/*'roofing_materials? '=>'Шифер',*/
                    'roofing_materials?Onduline'=>'Ондулин','roofing_materials?Ruberoid'=>'Рубероид',
                    /*'roofing_materials? tile'=>'Черепица',
                    'roofing_materials? sealing_tapes'=>'Ленты герметизирующие','roofing_materials? roof_accessories'=>'Комплектующие',*/
                    'roofing_materials?Mastic'=>'Мастики'),
                array('insulation_materials?none'=>'Изоляционные материалы','insulation_materials?Styrofoam'=>'Пенопласт',
                    'insulation_materials?heat_insulation'=>'Теплоизоляция',/*'film'=>'Пленки',
                    'extruded_polystyrene'=>'Экструдированный пенопласт'*/),
                array('loose_materials?none'=>'Сыпучие материалы','loose_materials?Cement'=>'Цемент',
                    'loose_materials?expanded_clay_aggregate'=>'Керамзит',/*'sand'=>'Песок',
                    'lime'=>'Известь','gypsum'=>'Гипс',*/'loose_materials?Soot'=>'Сажа'/*,'chalk'=>'Мел'*/),
                array('wood_materials?none'=>'Древесные материалы'/*,'timber'=>'Брус','plywood'=>'Фанера','osb'=>'OSB','particleboard'=>'ДСП',
                    'fibreboard'=>'ДВП'*/),
                array('hardware?none'=>'Металлоизделия','hardware?Rabitz'=>'Сетка рабица','hardware?welded_grid'=>'Сетка сварная',
                    'hardware?Masons_net'=>'Сетка кладочная','hardware?galvanized_sheets'=>'Лист оцинкованный'),
                array('Siding?none'=>'Сайдинг',/*'siding'=>'Сайдинг','siding_accessories'=>'Комплектующие','soffit'=>'Софит'*/),
                /*array('fasteners'=>'Крепеж','screws'=>'Саморезы','plugs'=>'Дюбеля','anchor'=>'Анкер','hardware'=>'Метизы'),
                array('concrete_products'=>'Бетонные изделия','landscape_products'=>'Ландшафтные изделия'),
                array('masonry_materials'=>'Кладочные материалы','brick'=>'Кирпич','blocks'=>'Блоки'),*/
                array('Drain?none'=>'Водосточная система'/*,'rainwater_system'=>'Водосточная система'*/)
            ),
        );
    }

}





