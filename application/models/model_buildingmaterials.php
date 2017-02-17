<?php

class Model_Buildingmaterials extends Model
{

    public function get_data()
    {



        return array(
            array('roofing_materials','Insulation materials','supuch','derevo','metal','sayding','krepezh','beton','kladoch' ,'vodosliv'),
            // имена картинок для категорий
            array(
                array('roofing_materials'=>'Кровля','slate'=>'Шифер','ondulin'=>'Ондулин','ruberoid'=>'Рубероид','tile'=>'Черепица',
                    'sealing_tapes'=>'Ленты герметизирующие','roof_accessories'=>'Комплектующие','mastics'=>'Мастики'),
                array('insulation_materials'=>'Изоляционные материалы','styrofoam'=>'Пенопласт',
                    'heat_insulation'=>'Теплоизоляция','film'=>'Пленки','extruded_polystyrene'=>'Экструдированный пенопласт'),
                array('loose_materials'=>'Сыпучие материалы','cement'=>'Цемент','clay_aggregate'=>'Керамзит','sand'=>'Песок',
                    'lime'=>'Известь','gypsum'=>'Гипс','soot'=>'Сажа','chalk'=>'Мел'),
                array('wood_materials'=>'Древесные материалы','timber'=>'Брус','plywood'=>'Фанера','osb'=>'OSB','particleboard'=>'ДСП',
                    'fibreboard'=>'ДВП'),
                array('hardware'=>'Металлоизделия','rabitz'=>'Сетка рабица','welded_grid'=>'Сетка сварная',
                    'masons_net'=>'Сетка кладочная','galvanized_sheets'=>'Лист оцинкованный'),
                array('Siding'=>'Сайдинг','siding'=>'Сайдинг','siding_accessories'=>'Комплектующие','soffit'=>'Софит'),
                array('fasteners'=>'Крепеж','screws'=>'Саморезы','plugs'=>'Дюбеля','anchor'=>'Анкер','hardware'=>'Метизы'),
                array('concrete_products'=>'Бетонные изделия','landscape_products'=>'Ландшафтные изделия'),
                array('masonry_materials'=>'Кладочные материалы','brick'=>'Кирпич','blocks'=>'Блоки'),
                array('Drain'=>'Водосточная система','rainwater_system'=>'Водосточная система')
            ),
        );
    }

}