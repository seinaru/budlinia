<?php

class Model_Decorationmaterials extends Model
{

    public function get_data()
    {

        return array(
            array('smesi','laki','kleya',/*'gipsokarton','vagonka',*/'germetiki','potolok','steklosetka'),

            array(
                array('building_mixture?none'=>'Строительные смеси','building_mixture?Primers'=>'Грунтовка','building_mixture?Sealers'=>'Шпатлевка',
                    'building_mixture?Plaster'=>'Штукатурка',/*'building_mixture? flooring'=>'Полы',*/
                    'building_mixture?waterproofing'=>'Гидроизоляция','building_mixture?Grouts'=>'Затирки'/*,
                    /*'building_mixture?  water-repellent'=>'Гидрофобизатор','building_mixture? mixtures_for_brickwork'=>'Смеси для кладки',
                    'building_mixture? decorative_plaster'=>'Штукатурка декортивная','building_mixture? putty_for_wood'=>'Шпатлевка для дерева',
                    'building_mixture? softener'=>'Пластификатор','building_mixture? antifreeze_additive'=>'Противоморозная добавка'*/),
                array('paints_and_varnishes?none'=>'Лакокрасочная продукция','paints_and_varnishes?Paints'=>'Краски интерьерные',
                    /*'paints_and_varnishes?  facade_paints'=>'Краски фасадные',*/'paints_and_varnishes?enamel'=>'Эмали',
                    /*'paints_and_varnishes?  aerosols'=>'Аэрозоли',*/'paints_and_varnishes?Dyes'=>'Красители',
                    /*'solvents'=>'Растворители',*/'paints_and_varnishes?Restorative_products'=>'Смывка',
                    'paints_and_varnishes?antiseptic'=>'Антисептик',
                    /*'paints_and_varnishes?  Lucky'=>'Лаки','paints_and_varnishes?  Azure_for_tree'=>'Лазурь для дерева'*/),
                array('clay?none'=>'Клея','clay?Mounting_adhesive'=>'Монтажный клей','clay?Contact_adhesive'=>'Контактный клей',

                    'clay?wallpaper_paste'=>'Клей для обоев','clay?Clay_others'=>'Клея другие'),
                /*array('Molded_laminated'=>'Гипсокартон','gypsum_plasterboard'=>'Гипсокартон',
                    'profile'=>'Профиль','fasteners'=>'Крепеж','lighthouse'=>'Маяк','angles'=>'Углы'),*/
                /*array('Molded_laminated'=>'Вагонка','pvc_molded'=>'Вагонка ПВХ','molded_mdf'=>'Вагонка МДФ',
                    'pvc_profile'=>'Профиль ПВХ','profile_mdf'=>'Профиль МДФ','fasteners'=>'Крепеж'),*/
                array('sealants_foam?none'=>'Герметики, пены'),
                array('ceilings?none'=>'Потолки'),
                array('fiberglass?none'=>'Стеклосетка','fiberglass?Fiberglass_for_interior_works'=>'Стеклосетка для внутренних работ',
                    'fiberglass?Duct_tape_scotch_tape'=>'Изолента, скотч'),

            ),
        );
    }

}
/*





*/




