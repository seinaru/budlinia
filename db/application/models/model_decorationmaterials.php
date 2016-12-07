<?php

class Model_Decorationmaterials extends Model
{

    public function get_data()
    {

        return array(
            array('smesi','laki','kleya','gipsokarton','vagonka','germetiki','potolok','steklosetka'),

            array(
                array('building_materials_category'=>'Строительные смеси','primer'=>'Грунтовка','putty'=>'Шпатлевка',
                    'plaster'=>'Штукатурка','flooring'=>'Полы','waterproofing'=>'Гидроизоляция','grouts'=>'Затирки',
                    'water-repellent'=>'Гидрофобизатор','mixtures_for_brickwork'=>'Смеси для кладки',
                    'decorative_plaster'=>'Штукатурка декортивная','putty_for_wood'=>'Шпатлевка для дерева',
                    'softener'=>'Пластификатор','antifreeze_additive'=>'Противоморозная добавка'),
                array('paints_and_varnishes'=>'Лакокрасочная продукция','paints'=>'Краски интерьерные',
                    'facade_paints'=>'Краски фасадные','enamels'=>'Эмали','aerosols'=>'Аэрозоли',
                    'dyes'=>'Красители','solvents'=>'Растворители','wash'=>'Смывка','antiseptic'=>'Антисептик',
                    'Lucky'=>'Лаки','Azure_for_tree'=>'Лазурь для дерева'),
                array('clay'=>'Клея','clay_tile'=>'Клей для плитки','glue_for_drywall'=>'Клей для гипсокартона',
                    'adhesive_for_insulation'=>'Клей для теплоизоляции','adhesive_cork'=>'Клей для пробки',
                    'pva_glue'=>'Клей ПВА','glue_for_wallpaper'=>'Клей для обоев','clay_others'=>'Клея другие'),
                array('gypsum_plasterboard_category'=>'Гипсокартон','gypsum_plasterboard'=>'Гипсокартон',
                    'profile'=>'Профиль','fasteners'=>'Крепеж','lighthouse'=>'Маяк','angles'=>'Углы'),
                array('molded'=>'Вагонка','pvc_molded'=>'Вагонка ПВХ','molded_mdf'=>'Вагонка МДФ',
                    'pvc_profile'=>'Профиль ПВХ','profile_mdf'=>'Профиль МДФ','fasteners'=>'Крепеж'),
                array('sealants_foam'=>'Герметики, пены','Foam_mounting'=>'Пены монтажные','sealant'=>'Герметик'),
                array('ceilings_category'=>'Потолки','ceilings'=>'Потолки',
                    'components_for_ceilings'=>'Комплектующие для потолка','skirting_ceiling'=>'Плинтус потолочный'),
                array('fiberglass'=>'Стеклосетка','fiberglass_for_interior_works'=>'Стеклосетка для внутренних работ',
                    'fiberglass_facade'=>'Стеклосетка фасадная'),

            ),
        );
    }

}